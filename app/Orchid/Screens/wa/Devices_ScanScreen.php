<?php

namespace App\Orchid\Screens\wa;

use App\Models\Device;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Support\Facades\Http;

class Devices_ScanScreen extends Screen
{
    public $device, $waqr;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Device $device): iterable
    {
        // add session
        $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['sessionId' => $device->name]);
        $res = json_decode($response->getBody());
        // dd($res->qr);

        // +"error": "Session already exists"
        if (isset($res->error) && $res->error == "Session already exists") {
            $hapus = Http::delete(env('URL_WA_SERVER').'/sessions/'.$device->name);
            sleep(1);
            //ulang qr
            $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['sessionId' => $device->name]);
            $res = json_decode($response->getBody()); // dd($res);
        }

        $image = $res->qr;
        $reloadpage = 'setTimeout(function(){window.location.reload(1);}, 20000);';

        return [
            'device' => $device,
            'waqr' => $image,
            'script_js' => $reloadpage
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Scan QR Code';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('partials.scan')
        ];
    }
}
