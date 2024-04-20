<div>
    <div
        id="chat"
        class="bg-gray-200 overflow-y-scroll"
        style="max-height: calc(100vh - 225px)"
        x-on:new-message.window="setTimeout(() => { let chat = document.getElementById('chat'); chat.scrollTo(0, chat.scrollHeight) }, 100)"
        x-effect="chat.scrollTo(0, chat.scrollHeight)"
    >
        <div class="px-2 flex flex-col" wire:poll="checkMessages">
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
                    {!! str_replace("\n", "<br>", $message->message) !!}
                </x-app.message>
            @endforeach
        </div>
    </div>
    <div class="absolute bottom-0 w-full mt-20 sm:px-2 lg:px-0">
        <textarea id="new-message" class="w-full" wire:model="newMessage" wire:keydown.enter="sendMessage($event.shiftKey)"></textarea>
        <button class="float-right bg-blue-300 px-4 py-1 rounded" wire:click="sendMessage">Send</button>
    </div>
</div>
