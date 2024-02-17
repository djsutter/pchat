@props(['sender', 'date', 'mine'])

<div class="w-full">
    <div class="min-w-[30%] max-w-[90%] my-1 {{ $mine ? 'float-right' : 'float-left' }}">
        <div class="border rounded-lg p-2 {{ $mine ? 'bg-sky-100' : 'bg-white' }}">
            {{ $slot }}
        </div>
        <div class="text-xs {{ $mine ? 'text-right' : '' }}">
            {{ date('H:i a', strtotime($date)) }}
        </div>
    </div>
</div>
