<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Flash;
use Response;
use DB;

class MessengerController extends AppBaseController
{
    private $userRepository;
    private $messageRepository;
    private $auth_user_id;

    public function __construct(CustomerRepository $userRepo, MessageRepository $messageRepo)
    {
        $this->userRepository = $userRepo;
        $this->messageRepository = $messageRepo;
        $this->middleware(function ($request, $next) {
            $this->auth_user_id = Auth::user()->id;
            
            return $next($request);
        });
    }

    private function getUsers() 
    {
        $users = DB::select("SELECT users.id, users.name, users.email, MAX(messages.created_at) FROM users 
                             JOIN messages ON (users.id = messages.user_from
                             OR users.id = messages.user_to)
                             WHERE users.id != '$this->auth_user_id'
                             AND (messages.user_from = '$this->auth_user_id' 
                             OR messages.user_to = '$this->auth_user_id')
                             GROUP BY users.id, users.name, users.email
                             ORDER BY MAX(messages.created_at) DESC");

        $unread_ids = DB::select("SELECT user_from AS sender_id, 
                                     COUNT(user_from) AS messages_count 
                                 FROM messages
                                 WHERE user_to = '$this->auth_user_id'
                                 AND unread = true
                                 GROUP BY user_from");
        
        $users = collect($users);
        $unread_ids = collect($unread_ids);

        $users = $users->map(function($user) use ($unread_ids) {
            $user_unread = $unread_ids->where('sender_id', $user->id)->first();

            $user->unread = $user_unread ? $user_unread->messages_count : 0;

            return $user;
        });

        if (empty($users)) {
            Flash::error('Users have not been found.');

            return redirect(route('messenger.index'));
        }

        return $users;
    }

    public function index() 
    {
        $users = $this->getUsers();

        return view('messenger.index')
            ->with('users', $users);
    }

    public function create()
    {        
        $users = $this->getUsers();

        $table_users = $this->userRepository
            ->all()
            ->where('id', '!=', $this->auth_user_id);

        if ((empty($table_users))) {
            Flash::error('Available users have not been found.');

            return redirect(route('messenger.index'));
        }

        return view('messenger.create')
            ->with('users', $users)
            ->with('table_users', $table_users);
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User has not been found.');

            return redirect(route('messenger.index'));
        }

        Message::where('user_from', $id)
            ->where('user_to', $this->auth_user_id)
            ->update(['unread' => false]);

        $users = $this->getUsers();

        $user_to_messages = $this->messageRepository
            ->all()
            ->where('user_from', $id)
            ->where('user_to', $this->auth_user_id);
        $user_from_messages = $this->messageRepository
            ->all()
            ->where('user_from', $this->auth_user_id)
            ->where('user_to', $id);
        $messages = $user_from_messages
            ->merge($user_to_messages)
            ->sortBy('created_at');

        return view('messenger.show')
            ->with('user', $user)
            ->with('users', $users)
            ->with('messages', $messages);
    }

    public function store(CreateMessageRequest $request)
    {        
        $message = $this->messageRepository->create([
            'subject' => '#',
            'message_text' => $request->get('message_text'),
            'user_from' => $this->auth_user_id,
            'user_to' => $request->user_from_id,
            'created_at' => now()
        ]);

        if (empty($message)) {
            Flash::error('Message has not been sent.');

            return redirect(route('messenger.show', $request->user_from_id));
        }

        Flash::success('Message has been successfully sent.');

        return redirect(route('messenger.show', $request->user_from_id));
    }
}
