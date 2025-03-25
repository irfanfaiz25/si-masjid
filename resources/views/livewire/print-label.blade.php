<div>
    <!-- Print Button -->
    <button id="printButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        wire:click="preparePrint">
        Print Label
    </button>

    <!-- Hidden div for printing -->
    <div id="printArea" class="hidden">
        @for ($i = 0; $i < 4; $i++)
            <div class="label-container">
                <div class="label-content">
                    <!-- Left side: QR Code -->
                    <div class="qr-code-container">
                        <img src="data:image/svg+xml;base64,{{ $qrCodeImage }}" alt="QR Code" class="qr-code">
                    </div>

                    <!-- Right side: Text information -->
                    <div class="text-container">
                        <div class="name-text">Ahmad Muzakki</div>
                        <div class="address-text">Tegal Rayung</div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    @push('scripts')
        <script>
            window.addEventListener('print-label', event => {
                printJS({
                    printable: 'printArea',
                    type: 'html',
                    css: '/css/print-styles.css',
                    scanStyles: true,
                    documentTitle: 'QR Label',
                    style: '@page { size: 60mm 40mm; margin: 0; }'
                });
            });
        </script>
    @endpush
</div>
