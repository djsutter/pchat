<div class="w-full">
    <div class="sm:w-full lg:w-[700px] mx-auto bg-white">
        <div class="h-screen bg-gray-200 overflow-y-scroll mb-20">
            <div class="lg:min-h-[500px] px-2 mb-20 flex flex-col">
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
        <div class="absolute bottom-0 sm:w-full lg:w-[700px] mt-20">
            <div class="px-2">
                <label for="new-message">New message:</label>
                <textarea id="new-message" class="w-full" wire:model="newMessage"></textarea>
                <button class="float-right" wire:click="sendMessage">Send</button>
            </div>
        </div>
    </div>
</div>
