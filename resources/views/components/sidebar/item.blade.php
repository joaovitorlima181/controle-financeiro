@props([
    'href' => '#',
    'icon' => '',
    'title' => '',
])
<li>
     <a href="{{ $href }}" class="ms-1 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <x-sidebar.icon icon="{{ $icon }}" />
         <span class="ms-6">{{ $title }}</span>
     </a>
</li>
