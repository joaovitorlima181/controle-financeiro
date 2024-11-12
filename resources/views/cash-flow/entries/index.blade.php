<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Entradas de Caixa') }}
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

        @error('amount')
            <x-toast id="amount-invalid" type="error" message="{{ $message }}" />
        @enderror

        @error('date')
            <x-toast id="date-invalid" type="error" message="{{ $message }}" />
        @enderror

        @error('entryType')
            <x-toast id="type-invalid" type="error" message="{{ $message }}" />
        @enderror


        <div class="mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-wrap flex-row-reverse">
                <button type="button" data-modal-target="create-entry" data-modal-toggle="create-entry"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Nova Entrada de Caixa
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
                                        Entrada
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Entrada
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Editar/Deletar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($entries) > 0)
                                    @foreach ($entries as $entry)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $entry->title }}
                                            </th>
                                            <td class="px-6 py-4">
                                                R${{ $entry->amount }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $entry->entry_type_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ date('d/m/Y', strtotime($entry->entry_date)); }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <button type="button"
                                                    class="text-white font-medium rounded-lg text-sm text-center me-2 mb-2"
                                                    data-modal-target="edit-entry-modal-{{ $entry->id }}"
                                                    data-modal-toggle="edit-entry-modal-{{ $entry->id }}">
                                                    <i class="material-icons">
                                                        edit
                                                    </i>
                                                </button>
                                                <button type="button"
                                                    class="text-white font-medium rounded-lg text-sm text-center me-2 mb-2"
                                                    data-modal-target="delete-entry-modal-{{ $entry->id }}"
                                                    data-modal-toggle="delete-entry-modal-{{ $entry->id }}">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                        @include('cash-flow.entries.delete', ['id' => $entry->id])
                                        @include('cash-flow.entries.edit', ['id' => $entry->id])
                                    @endforeach
                                @else
                                @endif

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

            @include('cash-flow.entries.create')

        </div>
    </div>

</x-app-layout>
