@extends('layouts.main')

@section('content')
    <div class="w-full grid grid-cols-3 gap-4">
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
    </div>

    <div class="mt-8 w-full grid grid-cols-2 gap-4">
        <div class="h-fit bg-white rounded-lg shadow-lg p-4">
            <h2 class="text-lg">
                Pemberi Zakat
            </h2>
            <div class="w-full mt-4 flex justify-between items-center">
                <div class="w-1/2">
                    <div class="relative max-w-lg">
                        <input wire:model.live.debounce.300ms='search'
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            placeholder="Pencarian" />
                        <button
                            class="absolute top-1 right-1 flex items-center rounded bg-emerald-700 py-1.5 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow disabled:pointer-events-none disabled:opacity-70 disabled:shadow-none"
                            type="button" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Cari
                        </button>
                    </div>
                </div>
                <div class="w-1/2 flex justify-end items-center">
                    <button type="button" wire:click='handleOpenModal'
                        class="px-6 py-2.5 bg-emerald-700 hover:bg-emerald-800 border border-emerald-800 rounded-md text-sm text-gray-50 font-medium cursor-pointer transition-all duration-300">
                        Tambah
                    </button>
                </div>
            </div>

            <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-800 dark:text-gray-50">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-24 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-4 w-72">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-4 w-96">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-4 w-32 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($penerima as $item) --}}
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{-- {{ ($penerima->currentPage() - 1) * $penerima->perPage() + $loop->iteration }} --}}
                                1
                            </th>
                            <td class="px-6 py-4">
                                {{-- {{ $item->nama }} --}}
                                Ahmad
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $item->alamat }} --}}
                                Candi Asri
                            </td>
                            <td class="px-6 py-4 flex justify-center space-x-2">
                                <button wire:click='handleOpenConfirmationModal'
                                    class="px-3 py-2 bg-rose-500 hover:bg-rose-600 text-gray-50 text-sm rounded-md shadow-md cursor-pointer">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="h-fit bg-white rounded-lg shadow-lg p-4">
            <h2 class="text-lg">
                Penerima Zakat
            </h2>
            <div class="w-full mt-4 flex justify-between items-center">
                <div class="w-1/2">
                    <div class="relative max-w-lg">
                        <input wire:model.live.debounce.300ms='search'
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            placeholder="Pencarian" />
                        <button
                            class="absolute top-1 right-1 flex items-center rounded bg-emerald-700 py-1.5 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow disabled:pointer-events-none disabled:opacity-70 disabled:shadow-none"
                            type="button" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Cari
                        </button>
                    </div>
                </div>
                <div class="w-1/2 flex justify-end items-center">
                    <button type="button" wire:click='handleOpenModal'
                        class="px-6 py-2.5 bg-emerald-700 hover:bg-emerald-800 border border-emerald-800 rounded-md text-sm text-gray-50 font-medium cursor-pointer transition-all duration-300">
                        Tambah
                    </button>
                </div>
            </div>

            <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-800 dark:text-gray-50">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-24 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-4 w-72">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-4 w-96">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-4 w-32 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($penerima as $item) --}}
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{-- {{ ($penerima->currentPage() - 1) * $penerima->perPage() + $loop->iteration }} --}}
                                1
                            </th>
                            <td class="px-6 py-4">
                                {{-- {{ $item->nama }} --}}
                                Ahmad
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $item->alamat }} --}}
                                Candi Asri
                            </td>
                            <td class="px-6 py-4 flex justify-center space-x-2">
                                <button wire:click='handleOpenConfirmationModal'
                                    class="px-3 py-2 bg-rose-500 hover:bg-rose-600 text-gray-50 text-sm rounded-md shadow-md cursor-pointer">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
