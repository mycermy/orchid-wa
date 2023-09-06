<?php

namespace App\Orchid\Layouts\wa;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class Devices_FieldLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('device.name')->title('Name')
                ->type('text')->horizontal(),
            Input::make('device.number')->title('Phone Number')
                ->type('text')->horizontal(),
            Input::make('device.description')->title('Description')
                ->type('text')->horizontal(),
        ];
    }
}
