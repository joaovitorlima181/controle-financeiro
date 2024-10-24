@props([
    'href' => '#',
    'icon' => '',
    'title' => '',
])

<li>
    <a href="{{ $href }}" class="ms-1 flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
        <x-sidebar.icon icon="{{ $icon }}" />
        <span class="ms-1">{{ $title }}</span>
    </a>
</li>
