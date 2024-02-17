<div>
    <div class="bg-gray-200 overflow-y-scroll" style="max-height: calc(100vh - 190px)">
        <div class="px-2 flex flex-col">
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
    </div>
    <div class="absolute bottom-0 sm:w-full lg:w-[700px] mt-20 sm:px-2 lg:px-0">
        <label for="new-message">New message:</label>
        <textarea id="new-message" class="w-full" wire:model="newMessage"></textarea>
        <button class="float-right" wire:click="sendMessage">Send</button>
    </div>
</div>
