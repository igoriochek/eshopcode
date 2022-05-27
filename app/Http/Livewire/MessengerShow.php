<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use Flash;

class MessengerShow extends Component
{
    use \App\Traits\MessengerUsers;

    public $user;
    public $messages;
    public $message_text;

    protected function getMessages()
    {
        $id = $this->user->id;
        $auth_user_id = $this->getAuthUserId();
        
        Message::where('user_from', $id)
            ->where('user_to', $auth_user_id)
            ->update(['unread' => false]);

        $user_to_messages = Message::where('user_from', $id)->where('user_to', $auth_user_id)->get();
        $user_from_messages = Message::where('user_from', $auth_user_id)->where('user_to', $id)->get();

        $messages = $user_from_messages
            ->merge($user_to_messages)
            ->sortBy('created_at');

        return $messages;
    }

    public function updateMessages()
    {
        $this->messages = $this->getMessages();
    }

    public function mount($id)
    {
        $this->user = User::find($id);

        if (empty($this->user)) {
            Flash::error('No user found.');

            return redirect(route('livewire.messenger.index'));
        }

        $this->messages = $this->getMessages();
    }

    public function render()
    {
        $users = $this->getUsers();

        return view('livewire.messenger.show')
            ->extends('layouts.app')
            ->section('content')
            ->with('users', $users);
    }

    public function sendMessage($user_to_id)
    {   
        $message = Message::create([
            'subject' => '#',
            'message_text' => $this->message_text,
            'user_from' => Auth::user()->id,
            'user_to' => $user_to_id,
            'created_at' => now()
        ]);

        if (empty($message)) {
            Flash::error('Message has not been sent.');
            return redirect(route('livewire.messenger.index'));
        }

        return redirect(route('livewire.messenger.show', $user_to_id));
    }
}
