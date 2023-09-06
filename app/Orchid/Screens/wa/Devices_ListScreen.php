<?php

namespace App\Orchid\Screens\wa;

use App\Models\Device;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Toast;
use App\Orchid\Layouts\wa\Devices_ListLayout;

class Devices_ListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'model' => Device::filters()->defaultSort('name','asc')->paginate(),
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.whatsapp.index',
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'WhatsApp Devices Listing';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->route('platform.whatsapp.devices.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Devices_ListLayout::class,
        ];
    }

    public function remove(Request $request): void
    {
        Device::findOrFail($request->get('id'))->delete();

        Toast::info(__('User was removed'));
    }
}
