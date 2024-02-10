@props(['sender', 'date', 'mine'])

<div class="w-full">
    <div class=" w-[80%] my-1 {{ $mine ? 'float-right' : '' }}">
        <div class="border rounded p-2 {{ $mine ? 'bg-sky-100' : 'bg-gray-200' }}">
            {{ $slot }}
        </div>
        <div class="text-xs {{ $mine ? 'text-right' : '' }}">
            {{ date('H:i a', strtotime($date)) }}
        </div>
    </div>
</div>
