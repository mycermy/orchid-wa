<?php

namespace App\Orchid\Layouts\wa;

use App\Models\Device;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class Devices_ListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'model';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name')
                ->sort()
                ->filter(Input::make()),

            TD::make('number')
                ->sort()
                ->filter(Input::make()),

            TD::make('description')
                ->sort()
                ->filter(Input::make()),

            TD::make('status')
                ->sort()
                ->filter(Input::make()),

            TD::make('Actions')
                ->alignCenter()
                ->width('100px')
                ->render(fn($target) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        // Link::make('Scan QR')
                        // ->route('platform.whatsapp.devices.scan',$target->id)
                        // ->icon('bs.pencil'),

                        Link::make('Edit')
                        ->route('platform.whatsapp.devices.edit',$target->id)
                        ->icon('bs.pencil'),

                        Button::make('Delete')
                        ->icon('bs.trash3')
                        ->method('remove',['id' => $target->id]),
                    ])
                )
        ];
    }
}
