<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Flash;
use DB;

trait MessengerUsers 
{
    private function getAuthUserId()
    {
        $auth_user_id = Auth::user()->id;
        return $auth_user_id;
    }

    private function getUnreadIds()
    {
        $auth_user_id = $this->getAuthUserId();
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
        $auth_user_id = $this->getAuthUserId();
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