<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public ?Collection $conversation;

    public string $newMessage = 'x';

    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->conversation = Message::all();
        $this->newMessage = 'y';
    }

    public function render()
    {
        return view('livewire.chat')->layout('layouts.chat');
    }

    public function sendMessage()
    {
        $newMessage = Message::create([
            'conversation_id' => 1,
            'user_id' => Auth::id(),
            'message' => $this->newMessage,
        ]);
        $this->newMessage = '';
        $this->conversation[] = $newMessage;
    }
}
