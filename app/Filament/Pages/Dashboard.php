<?php

namespace App\Filament\Pages;

use App\Filament\Resources\LinkResource\Widgets\LinkOverview;

class Dashboard extends \Filament\Pages\Dashboard
{
    #[\Override]
    public function getWidgets(): array
    {
        return [
            ...parent::getWidgets(),
            LinkOverview::class,
        ];
    }
}
