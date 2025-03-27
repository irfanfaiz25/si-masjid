<div class="h-fit bg-white rounded-lg shadow-lg p-4">
    <h2 class="text-lg">
        Monitoring Zakat
    </h2>
    <div class="w-full mt-4 block md:flex justify-between space-y-3 md:space-y-0 space-x-3 items-center">
        <div class="block md:flex space-y-2 md:space-y-0 space-x-3 items-center">
            <div class="relative w-full md:min-w-sm">
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
            <div class="flex items-center space-x-1 w-full">
                <button type="button" wire:click="handleChangeFilter('all')"
                    class="px-3 md:px-6 py-1.5 border border-indigo-500 hover:bg-indigo-500 rounded-full text-xs md:text-sm 
                {{ $filter === 'all' ? 'bg-indigo-500 text-white' : 'text-indigo-500 hover:text-white' }} font-medium cursor-pointer transition-all duration-300">
                    Semua
                </button>
                <button type="button" wire:click="handleChangeFilter('on_process')"
                    class="px-3 md:px-6 py-1.5 border border-amber-500 hover:bg-amber-500 rounded-full text-xs md:text-sm font-medium 
                {{ $filter === 'on_process' ? 'bg-amber-500 text-white' : 'text-amber-500 hover:text-white' }} cursor-pointer transition-all duration-300">
                    Dalam Proses
                </button>
                <button type="button" wire:click="handleChangeFilter('done')"
                    class="px-3 md:px-6 py-1.5 border border-emerald-700 hover:bg-emerald-700 rounded-full text-xs md:text-sm 
                {{ $filter === 'done' ? 'bg-emerald-700 text-white' : 'text-emerald-700 hover:text-white' }} font-medium cursor-pointer transition-all duration-300">
                    Selesai
                </button>
            </div>
        </div>

    </div>


    <div wire:poll.keep-alive.5s class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-4 w-64 text-center">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerima as $index => $item)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ (int) $index + 1 }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ $item->penerima->nama }}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{ $item->penerima->alamat }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @formatJumlah($item->jumlah) liter
                        </td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            @if ($item->status === 'done')
                                <div
                                    class="px-4 py-1.5 bg-emerald-600 text-white rounded-full flex items-center gap-1 text-xs">
                                    Selesai
                                </div>
                            @else
                                <div
                                    class="px-4 py-1.5 bg-amber-500 text-white rounded-full flex items-center gap-1.5 text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> Dalam Proses
                                </div>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
