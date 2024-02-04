<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public ?Collection $conversation;
    public string $newMessage = '';

    public function mount()
    {
        $this->conversation = Message::all();
        $this->newMessage = '';
    }

    public function render()
    {
        return view('livewire.chat');
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
