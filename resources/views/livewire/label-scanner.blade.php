<div class="h-fit bg-white rounded-lg shadow-lg p-4">
    <div class="w-full mt-4 block md:flex justify-between space-y-3 md:space-y-0 space-x-3 items-center">
        <div class="block md:flex space-y-2 md:space-y-0 space-x-3 items-center">
            <div class="relative w-full md:min-w-sm">
                <input wire:model.live.debounce.300ms='search'
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    placeholder="Pencarian" />
                <button
                    class="absolute top-1 right-1 flex items-center rounded bg-emerald-700 py-1.5 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow disabled:pointer-events-none disabled:opacity-70 disabled:shadow-none"
                    type="button" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
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

        <!-- QR Code Scanner Button -->
        <button id="scanQrButton" type="button"
            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md flex items-center gap-2 text-sm font-medium cursor-pointer transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
            </svg>
            Scan QR Code
        </button>
    </div>

    <!-- QR Code Scanner Modal -->
    <div id="qrScannerModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Scan QR Code</h3>
                <button id="closeQrScannerModal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mb-4">
                <div id="qrScannerContainer" class="relative bg-gray-100 rounded-lg overflow-hidden"
                    style="height: 300px;">
                    <video id="qrScanner" class="w-full h-full object-cover"></video>
                    <div id="scannerOverlay"
                        class="absolute inset-0 border-2 border-blue-500 opacity-50 pointer-events-none">
                        <div class="absolute inset-0 border-4 border-blue-500 rounded-lg"></div>
                    </div>
                </div>
            </div>
            <div id="scanResult" class="mb-4 text-center hidden">
                <p class="text-sm text-gray-600">QR Code terdeteksi:</p>
                <p id="qrCodeResult" class="font-medium"></p>
            </div>
            <div class="flex justify-center">
                <button id="startScanButton" class="px-4 py-2 bg-blue-600 text-white rounded-md mr-2">Berhenti
                    Scan</button>
                {{-- <button id="searchQrResult" class="px-4 py-2 bg-green-600 text-white rounded-md hidden"
                    wire:click="searchByQrCode">Cari Data</button> --}}
            </div>
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

    @push('scripts')
        <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Make sure all elements exist before trying to use them
                const scanQrButton = document.getElementById('scanQrButton');
                const qrScannerModal = document.getElementById('qrScannerModal');
                const closeQrScannerModal = document.getElementById('closeQrScannerModal');
                const startScanButton = document.getElementById('startScanButton');
                const scanResult = document.getElementById('scanResult');
                const qrCodeResult = document.getElementById('qrCodeResult');
                const searchQrResult = document.getElementById('searchQrResult');
                const scannerOverlay = document.getElementById('scannerOverlay');
                const qrScannerContainer = document.getElementById('qrScannerContainer');

                // Debug to check if elements are found
                console.log('QR Button found:', !!scanQrButton);
                console.log('QR Modal found:', !!qrScannerModal);

                let html5QrCode = null;
                let scanning = false;

                // Check if running on mobile
                const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator
                    .userAgent);

                // Use a simpler scanner configuration for mobile devices
                const config = isMobile ? {
                    fps: 5,
                    qrbox: {
                        width: 200,
                        height: 280
                    }
                } : {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    },
                    aspectRatio: 1.0
                };

                // Make sure the button exists before adding event listener
                if (scanQrButton) {
                    scanQrButton.addEventListener('click', function() {
                        console.log('QR button clicked');
                        qrScannerModal.classList.remove('hidden');

                        // Create scanner instance if it doesn't exist
                        if (!html5QrCode) {
                            try {
                                html5QrCode = new Html5Qrcode("qrScannerContainer");
                                console.log('QR scanner created');
                            } catch (error) {
                                console.error('Error creating QR scanner:', error);
                            }
                        }

                        // Try to start scanning
                        startScanning();
                    });
                }

                // Rest of your code remains the same
                closeQrScannerModal.addEventListener('click', function() {
                    qrScannerModal.classList.add('hidden');
                    stopScanning();
                    scanResult.classList.add('hidden');
                    searchQrResult.classList.add('hidden');
                });

                startScanButton.addEventListener('click', function() {
                    if (scanning) {
                        stopScanning();
                        startScanButton.textContent = 'Mulai Scan';
                    } else {
                        startScanning();
                        startScanButton.textContent = 'Berhenti Scan';
                    }
                });

                function startScanning() {
                    console.log('Starting scanner...');
                    if (html5QrCode && html5QrCode.isScanning) {
                        html5QrCode.stop();
                    }

                    // Try a more direct approach for mobile
                    html5QrCode.start({
                            facingMode: "environment"
                        },
                        config,
                        onScanSuccess,
                        onScanFailure
                    ).then(() => {
                        console.log('Scanner started successfully');
                        scanning = true;
                        startScanButton.textContent = 'Berhenti Scan';
                    }).catch(error => {
                        console.error("Failed to start scanner:", error);

                        // Try fallback method for mobile
                        if (isMobile) {
                            tryFallbackScanner();
                        } else {
                            showError(error);
                        }
                    });
                }

                function tryFallbackScanner() {
                    // Create a new instance with simpler settings
                    if (html5QrCode) {
                        html5QrCode.clear();
                    }

                    // Try with minimal configuration
                    const html5QrcodeScanner = new Html5QrcodeScanner(
                        "qrScannerContainer", {
                            fps: 2,
                            qrbox: 200,
                            rememberLastUsedCamera: true,
                            showTorchButtonIfSupported: true
                        },
                        false
                    );

                    html5QrcodeScanner.render((decodedText) => {
                        // Success callback
                        scanning = false;
                        html5QrcodeScanner.clear();

                        // Display result
                        qrCodeResult.textContent = decodedText;
                        scanResult.classList.remove('hidden');
                        searchQrResult.classList.remove('hidden');

                        // Store the result for Livewire component
                        @this.set('qrCodeData', decodedText);

                    }, (error) => {
                        // Error callback - just ignore continuous errors
                    });

                    scanning = true;
                    startScanButton.textContent = 'Berhenti Scan';

                    // Store scanner reference
                    html5QrCode = {
                        isScanning: true,
                        stop: function() {
                            html5QrcodeScanner.clear();
                            this.isScanning = false;
                        }
                    };
                }

                function stopScanning() {
                    if (html5QrCode && html5QrCode.isScanning) {
                        html5QrCode.stop();
                        scanning = false;
                    }
                }

                function onScanSuccess(decodedText, decodedResult) {
                    stopScanning();
                    startScanButton.textContent = 'Mulai Scan';

                    // Display result
                    qrCodeResult.textContent = decodedText;
                    scanResult.classList.remove('hidden');
                    searchQrResult.classList.remove('hidden');

                    // Store the result for Livewire component
                    @this.set('qrCodeData', decodedText);
                }

                function onScanFailure(error) {
                    // Just log errors, don't show to user for every frame
                    console.warn(`QR scan error: ${error}`);
                }

                function showError(error) {
                    let errorMessage = "Tidak dapat mengakses kamera. ";

                    if (error.toString().includes("Permission")) {
                        errorMessage += "Pastikan Anda telah memberikan izin kamera.";
                    } else if (error.toString().includes("https")) {
                        errorMessage += "Aplikasi ini mungkin perlu diakses melalui HTTPS.";
                    } else if (error.toString().includes("streaming not supported")) {
                        errorMessage +=
                            "Browser Anda tidak mendukung streaming kamera. Coba gunakan browser lain seperti Chrome atau Firefox terbaru.";
                    } else {
                        errorMessage += error.toString();
                    }

                    alert(errorMessage);
                    scanning = false;
                    startScanButton.textContent = 'Mulai Scan';
                }
            });
        </script>
    @endpush
</div>
