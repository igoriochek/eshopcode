<?php

namespace App\Traits;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Flash;
use DB;

trait MessengerUsers
{
    public function getLastMessage(object $users): void
    {
        $authUserId = Auth::user()->id;

        foreach ($users as $user) {
            $userToMessages = Message::where('user_from', $user->id)->where('user_to', $authUserId)->get();
            $userFromMessages = Message::where('user_from', $authUserId)->where('user_to', $user->id)->get();

            $user->last_message = $userFromMessages
                ->merge($userToMessages)
                ->sortByDesc('created_at')
                ->first();
        }
    }

    private function getUnreadIds()
    {
        $auth_user_id = Auth::user()->id;
        $unread_ids = DB::select("SELECT user_from AS sender_id,
                                  COUNT(user_from) AS messages_count
                                  FROM messages
                                  WHERE user_to = '$auth_user_id'
                                  AND unread = true
                                  GROUP BY user_from");
        $unread_ids = collect($unread_ids);

        return $unread_ids;
    }

    private function getUsersWithUnreadMessagesCount($users)
    {
        $unread_ids = $this->getUnreadIds();

        $users = $users->map(function($user) use ($unread_ids) {
            $user_unread = $unread_ids->where('sender_id', $user->id)->first();

            $user->unread = $user_unread ? $user_unread->messages_count : 0;

            return $user;
        });

        return $users;
    }

    public function getUsers()
    {
        $auth_user_id = Auth::user()->id;
        $users = DB::select("SELECT users.id, users.name, users.email,
                             MAX(messages.created_at) FROM users
                             JOIN messages ON (users.id = messages.user_from
                             OR users.id = messages.user_to)
                             WHERE users.id != '$auth_user_id'
                             AND (messages.user_from = '$auth_user_id'
                             OR messages.user_to = '$auth_user_id')
                             GROUP BY users.id, users.name, users.email
                             ORDER BY MAX(messages.created_at) DESC");
        $users = collect($users);
        $users = $this->getUsersWithUnreadMessagesCount($users);

        if (empty($users)) {
            Flash::error('No users found.');
            return redirect(route('livewire.messenger.index'));
        }

        return $users;
    }
}
