<div>
    <form wire:submit.prevent='save' class="w-full flex items-center">
        <div class="w-1/2 flex space-x-2 items-end justify-end">
            <div class="space-y-2 w-full">
                <label for="nama" class="text-sm text-gray-900">
                    Nama
                </label>
                <input id="nama" wire:model='nama'
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-4 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    placeholder="Masukkan nama pemberi zakat" />
                @error('nama')
                    <p class="mt-1 text-xs text-red-500 font-normal">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="button" wire:click='handleCancelEdit' wire:show='isEditMode'
                class="px-6 py-2.5 bg-gray-500 hover:bg-gray-600 border border-gray-600 rounded-md text-sm text-gray-50 font-medium cursor-pointer transition-all duration-300">
                Batal
            </button>
            <button type="submit"
                class="px-6 py-2.5 bg-emerald-700 hover:bg-emerald-800 border border-emerald-800 rounded-md text-sm text-gray-50 font-medium cursor-pointer transition-all duration-300">
                {{ $isEditMode ? 'Simpan' : 'Tambah' }}
            </button>
        </div>
    </form>

    <div class="mt-8 w-full flex justify-center items-center">
        <div class="w-1/2">
            <div class="relative">
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
    </div>


    <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4 w-24 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-4 w-96">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-4 w-32 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemberi as $item)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ ($pemberi->currentPage() - 1) * $pemberi->perPage() + $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->nama }}
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                            <button wire:click='handleEdit({{ $item->id }})'
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-gray-50 text-sm rounded-md shadow-md cursor-pointer">
                                <i class="fas fa-pencil text-sm"></i>
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        {{ $pemberi->links('vendor.livewire.tailwind') }}
    </div>

    {{-- modal --}}
    {{-- <div x-show="$wire.showModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/75" aria-hidden="true" wire:click='closeModal'></div>

        <!-- Modal Container -->
        <div class="relative flex min-h-screen items-center justify-center px-4 pt-4 pb-20 text-center">
            <!-- Modal Content -->

            <div x-show="$wire.showModal" x-transition.scale.origin.center
                class="inline-block align-middle bg-white dark:bg-bg-dark-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-2xl sm:w-full">
                <!-- Modal Header -->
                <div class="bg-white dark:bg-bg-dark-primary px-6 pt-6 pb-4 relative">
                    <button type="button" wire:click='closeModal'
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 cursor-pointer">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-text-dark-primary">
                        {{ $isEditMode ? 'Edit Data' : 'Tambah Data' }}
                    </h3>
                </div>

                <!-- Modal Body -->
                <form wire:submit.prevent='save'>
                    <div class="px-6 py-4 font-normal text-sm">
                        <div class="w-full mb-2">
                            <label for="nama" class="text-sm text-gray-900 font-semibold">
                                Nama
                            </label>
                            <input id="nama" wire:model='nama'
                                class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                placeholder="Masukkan nama pemberi zakat" />
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full mb-2">
                            <label for="jumlah" class="text-sm text-gray-900 font-semibold">
                                Jumlah
                            </label>
                            <input id="jumlah" wire:model='jumlah'
                                class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                placeholder="Masukkan nama pemberi zakat" />
                            @error('jumlah')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end space-x-2 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" wire:click='closeModal'
                            class="py-2 px-5 text-sm font-medium text-gray-900 dark:text-gray-50 border border-gray-500 hover:bg-gray-500 hover:text-gray-50 rounded-md transition duration-300 cursor-pointer">Batal</button>
                        <button type="submit"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 border border-emerald-700 px-6 py-2 text-sm text-center rounded-md transition duration-300 cursor-pointer">
                            {{ $isEditMode ? 'Simpan' : 'Tambah' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}
    {{-- end modal --}}
</div>
