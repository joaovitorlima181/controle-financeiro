<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipos de Entrada') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @if (session()->has('success'))
            <x-toast id="session-success" type="success" message="{{ session()->get('success') }}" />
        @endif

        @if (session()->has('error'))
            <x-toast id="session-error" type="error" message="{{ session()->get('error') }}" />
        @endif

        @error('name')
            <x-toast id="name-invalid" type="error" message="{{ $message }}" />
        @enderror

        @error('description')
            <x-toast id="description-invalid" type="error" message="{{ $message }}" />
        @enderror
        <div class="mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-wrap flex-row-reverse">
                <button type="button" data-modal-target="add-entry-type-modal" data-modal-toggle="add-entry-type-modal"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Novo tipo de Entrada
                </button>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome da Entrada
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descrição
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($entryTypes) > 0)
                                    @foreach ($entryTypes as $entryType)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $entryType->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $entryType->description }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <button wire:click="edit({{ $entryType->id }})" type="button"
                                                    data-modal-target="delete-modal-{{ $entryType->id }}"
                                                    data-modal-toggle="delete-modal-{{ $entryType->id }}"
                                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </td>
                                            @include('settings.entry-types.delete', ['id' => $entryType->id])
                                        </tr>
                                    @endforeach
                                @else
                                @endif

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

            @include('settings.entry-types.create')

        </div>
    </div>

</x-app-layout>
