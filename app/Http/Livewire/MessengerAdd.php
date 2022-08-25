<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\MessengerUsers;
use Flash;

class MessengerAdd extends Component
{
    use WithPagination, MessengerUsers;

    protected $paginationTheme = 'bootstrap';

    private function getUsersExceptAuthUser(): object
    {
        return User::where('id', '!=', Auth::user()->id)->get();
    }

    private function getNotAddedUsers(object $users, object $addUsers): object
    {
        foreach ($users as $user) {
            $addUsers = $addUsers->where('id', '!=', $user->id);
        }

        return $addUsers;
    }

    private function ConvertAddUsersCollectionToQuery(object $addUsers)
    {
        return $addUsers->toQuery()->paginate(5);
    }

    public function render()
    {
        $users = $this->getUsers();

        $this->getLastMessage($users);

        return view('livewire.messenger.add')
            ->extends('layouts.app')
            ->section('content')
            ->with([
                'users' => $users,
                'addUsers' => $this->ConvertAddUsersCollectionToQuery(
                    $this->getNotAddedUsers($users, $this->getUsersExceptAuthUser())
                )
            ]);
    }
}