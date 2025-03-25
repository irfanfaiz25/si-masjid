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
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-4 w-64 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($zakat as $item)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ ($zakat->currentPage() - 1) * $zakat->perPage() + $loop->iteration }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ $item->penerima->nama }}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{ $item->penerima->alamat }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @formatJumlah($item->jumlah)
                        </td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <button wire:click='handleEdit({{ $item->id }})'
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-gray-50 text-sm rounded-md shadow-md cursor-pointer">
                                <i class="fas fa-pencil text-sm"></i>
                                Edit
                            </button>
                            <button wire:click='handleOpenConfirmationModal({{ $item->id }})'
                                class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-gray-50 text-sm rounded-md shadow-md cursor-pointer">
                                <i class="fas fa-trash text-sm"></i>
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal --}}
    <div x-show="$wire.showModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/75" aria-hidden="true" wire:click='handleCloseModal'></div>

        <!-- Modal Container -->
        <div class="relative flex min-h-screen items-center justify-center px-4 pt-4 pb-20 text-center">
            <!-- Modal Content -->

            <div x-show="$wire.showModal" x-transition.scale.origin.center
                class="inline-block align-middle bg-white dark:bg-bg-dark-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-2xl sm:w-full">
                <!-- Modal Header -->
                <div class="bg-white dark:bg-bg-dark-primary px-6 pt-6 pb-4 relative">
                    <button type="button" wire:click='handleCloseModal'
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 cursor-pointer">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-text-dark-primary">
                        {{ $isEditMode ? 'Edit Data Penerima Zakat' : 'Tambah Data Penerima Zakat' }}
                    </h3>
                </div>

                <!-- Modal Body -->
                <form wire:submit.prevent='save'>
                    <div class="px-6 py-4 font-normal text-sm">
                        <div class="w-full mb-2">

                            @if ($selectedPenerima)
                                <div class="w-full h-fit flex space-x-2 items-center p-3 bg-emerald-700 rounded-md">
                                    <div class="w-[80%]">
                                        <p class="text-xs text-gray-200 font-normal">
                                            Nama
                                        </p>
                                        <p class="text-base text-gray-50 font-semibold capitalize">
                                            {{ $selectedPenerima['nama'] }}
                                        </p>
                                        <p class="text-sm text-gray-100 font-semibold uppercase">
                                            {{ $selectedPenerima['alamat'] }}
                                        </p>
                                    </div>
                                    <div class="w-[20%] flex justify-end">
                                        <button type="button" wire:click='deselectPenerima'
                                            class="px-5 py-2 text-sm font-medium bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md cursor-pointer">
                                            Ubah
                                        </button>
                                    </div>
                                </div>
                            @else
                                <label for="searchPenerima" class="text-sm text-gray-900 font-semibold">
                                    Nama
                                </label>
                                <div class="relative w-full">
                                    <input id="searchPenerima" wire:model.live.debounce.300ms='searchPenerima'
                                        x-on:keydown.arrow-down.prevent="$el.nextElementSibling.firstElementChild?.focus()"
                                        class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                        placeholder="Cari nama penerima" />

                                    @if ($searchPenerima)
                                        <ul
                                            class="w-full absolute top-13 h-fit max-h-40 bg-gray-100 border border-gray-300 rounded-md overflow-y-auto">
                                            @forelse ($penerima as $item)
                                                <li class="p-3 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none cursor-pointer"
                                                    tabindex="0"
                                                    x-on:keydown.arrow-down.prevent="$el.nextElementSibling?.focus()"
                                                    x-on:keydown.arrow-up.prevent="$el.previousElementSibling?.focus()"
                                                    x-on:keydown.enter.prevent="$wire.selectPenerima({{ $item['id'] }})"
                                                    wire:click='selectPenerima({{ $item['id'] }})'>
                                                    <p class="text-sm text-gray-800 capitalize">
                                                        {{ $item['nama'] }}
                                                    </p>
                                                    <p class="text-xs text-gray-500 uppercase">
                                                        {{ $item['alamat'] }}
                                                    </p>
                                                </li>
                                            @empty
                                                <li
                                                    class="p-3 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none cursor-pointer">
                                                    <p class="text-sm text-gray-800">
                                                        Nama tidak ditemukan. <a href="{{ route('penerima.index') }}"
                                                            class="text-blue-500 hover:text-blue-600 hover:underline">Buat
                                                            baru</a>
                                                    </p>
                                                </li>
                                            @endforelse
                                        </ul>
                                    @endif

                                </div>
                            @endif

                        </div>
                        <div class="w-full flex items-center space-x-3 mb-2">
                            <div class="w-1/2">
                                <label for="jumlah" class="text-sm text-gray-900 font-semibold">
                                    Jumlah
                                </label>
                                <input type="text" id="jumlah" wire:model='jumlah'
                                    class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                                @error('jumlah')
                                    <p class="mt-1 text-xs text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="tahun" class="text-sm text-gray-900 font-semibold">
                                    Tahun
                                </label>
                                <input type="text" id="tahun" wire:model='tahun'
                                    class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow read-only:bg-gray-200"
                                    readonly>
                                @error('tahun')
                                    <p class="mt-1 text-xs text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end space-x-2 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" wire:click='handleCloseModal'
                            class="py-2 px-5 text-sm font-medium text-gray-900 dark:text-gray-50 border border-gray-500 hover:bg-gray-500 hover:text-gray-50 rounded-md transition duration-300 cursor-pointer">Batal</button>
                        <button type="submit"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 border border-emerald-700 px-6 py-2 text-sm text-center rounded-md transition duration-300 cursor-pointer">
                            {{ $isEditMode ? 'Simpan' : 'Tambah' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- modal delete confirmation --}}
    <div x-show="$wire.showDeleteConfirmationModal" x-transition.opacity class="relative z-50"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-transition.scale.origin.center>
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white dark:bg-bg-dark-primary text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white dark:bg-bg-dark-primary px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold text-main-text dark:text-dark-main-text"
                                    id="modal-title">Hapus Data
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-300">Apakah anda yakin akan
                                        menghapus data penerima zakat atas nama <span
                                            class="font-semibold capitalize">{{ $deleteData['penerima']['nama'] ?? '' }}</span>?
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Data akan di hapus secara
                                        permanen. Tindakan ini tidak dapat di batalkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button wire:click='delete' type="button"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">Delete</button>
                        <button type="button" wire:click='handleCloseConfirmationModal'
                            class="py-2 px-5 text-sm font-medium text-gray-900 dark:text-gray-50 border border-gray-500 hover:bg-gray-500 hover:text-gray-50 rounded-md transition duration-300 cursor-pointer">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal delete confirmation --}}
</div>
