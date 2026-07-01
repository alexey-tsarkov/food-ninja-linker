<?php

namespace App\Filament\Resources\LinkResource\Widgets;

use App\Filament\Resources\LinkResource\Pages\ListLinks;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LinkOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListLinks::class;
    }

    #[\Override]
    protected function getStats(): array
    {
        return [
            Stat::make('Total Links', $this->getPageTableQuery()->count()),
            Stat::make('Total Clicks', $this->getPageTableQuery()->sum('total_clicks')),
        ];
    }
}
