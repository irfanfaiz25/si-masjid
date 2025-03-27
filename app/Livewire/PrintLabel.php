<?php

namespace App\Livewire;

use Livewire\Component;
use Picqer\Barcode\BarcodeGeneratorPNG;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PrintLabel extends Component
{
    public $name;
    public $address;
    public $barcodeImage;
    public $qrCodeImage;

    public function mount($id = null)
    {
        // if ($id) {
        //     $data = YourModel::find($id);
        //     $this->name = $data->name;
        //     $this->address = $data->address;
        //     $this->generateBarcode($this->name);
        // }
        $this->generateQrCode('Ahmad Muzakki');
    }

    public function preparePrint()
    {
        $this->generateQrCode('Ahmad Muzakki');
        $this->dispatch('print-label');
    }

    private function generateBarcode($text)
    {
        $generator = new BarcodeGeneratorPNG();
        $this->barcodeImage = base64_encode($generator->getBarcode($text, $generator::TYPE_CODE_128));
    }

    private function generateQrCode($text)
    {
        // Use svg format which doesn't require Imagick
        $this->qrCodeImage = base64_encode(QrCode::format('svg')
            ->size(150)
            ->margin(1)
            ->generate($text));
    }

    public function render()
    {
        return view('livewire.print-label');
    }
}
