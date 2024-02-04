<div class="w-full">
    <div class="w-[700px] mx-auto min-h-screen">
        <div class="min-h-[500px]">
            @foreach ($conversation as $message)
                <div>{{ $message->message }}</div>
            @endforeach
        </div>
        <div class="relative align-bottom">
            <label for="new-message">New message:</label>
            <textarea id="new-message" class="w-full" wire:model="newMessage"></textarea>
            <button class="float-right" wire:click="sendMessage">Send</button>
        </div>
    </div>
</div>
