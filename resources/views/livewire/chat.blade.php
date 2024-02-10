<div class="w-full">
    <div class="w-[700px] mx-auto min-h-screen">
        <div class="min-h-[500px] flex flex-col">
            @php
            $date = null;
            @endphp
            @foreach ($conversation as $message)
                @php
                [$msgDate, $msgTime] = explode(' ', $message->created_at);
                @endphp
                @if ($msgDate != $date)
                    <div class="text-center my-3 py-2 border-b border-t">{{ date('l, F j, Y ', strtotime($msgDate)) }}</div>
                    @php
                    $date = $msgDate;
                    @endphp
                @endif
                <x-app.message sender="{{ $message->sender->name }}" date="{{ $message->created_at }}" mine="{{ $message->sender->id == $user->id }}">
                    {{ $message->message }}
                </x-app.message>
            @endforeach
        </div>
        <div class="relative align-bottom">
            <label for="new-message">New message:</label>
            <textarea id="new-message" class="w-full" wire:model="newMessage"></textarea>
            <button class="float-right" wire:click="sendMessage">Send</button>
        </div>
    </div>
</div>
