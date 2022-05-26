<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessengerIndex extends Component
{
    use \App\Traits\MessengerUsers;

    public function render()
    {
        $users = $this->getUsers();

        return view('livewire.messenger.index')
            ->extends('layouts.app')
            ->section('content')
            ->with('users', $users);
    }
}
