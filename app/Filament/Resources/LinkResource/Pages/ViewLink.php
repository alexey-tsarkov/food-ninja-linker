<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;

    #[\Override]
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('short_url')
                    ->label('Short URL')
                    ->color('primary')
                    ->columnSpanFull()
                    ->copyable(),
                Infolists\Components\TextEntry::make('original_url')
                    ->label('Original URL')
                    ->columnSpanFull(),
                Infolists\Components\TextEntry::make('total_clicks')
                    ->numeric(),
                Infolists\Components\TextEntry::make('created_at')
                    ->dateTime(),
            ]);
    }
}
