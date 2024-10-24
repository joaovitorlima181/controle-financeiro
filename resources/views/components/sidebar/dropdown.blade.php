@props([
    'dropdownId' => '',
    'dropdownTitle' => '',
    'icon' => '',
])

<li>
    <button type="button"
        class="ms-1 flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="{{ $dropdownId }}" data-collapse-toggle="{{ $dropdownId }}">
        <x-sidebar.icon icon="{{ $icon }}" />
        <span class="flex-1 ms-6 text-left rtl:text-right whitespace-nowrap">{{ $dropdownTitle }}</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <ul id="{{ $dropdownId }}" class="hidden py-2 space-y-2">
        {{ $slot }}
    </ul>
</li>
