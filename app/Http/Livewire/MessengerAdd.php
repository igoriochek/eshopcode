<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Flash;

class MessengerAdd extends Component
{
    use \App\Traits\MessengerUsers;

    private function getTableUsers()
    {
        $table_users = User::where('id', '!=', Auth::user()->id)->get();

        if ((empty($table_users))) {
            Flash::error('Available users have not been found.');

            return redirect(route('livewire.messenger.index'));
        }

        return $table_users;
    }

    public function render()
    {
        $users = $this->getUsers();
        $table_users = $this->getTableUsers();

        return view('livewire.messenger.add')
            ->extends('layouts.app')
            ->section('content')
            ->with(['users' => $users, 'table_users' => $table_users]);
    }
}
