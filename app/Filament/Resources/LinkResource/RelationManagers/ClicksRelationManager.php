<?php

namespace App\Filament\Resources\LinkResource\RelationManagers;

use App\Models\Click;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ClicksRelationManager extends RelationManager
{
    protected static string $relationship = 'clicks';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip_address')
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP address')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Clicked at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Whois')
                    ->icon('heroicon-m-information-circle')
                    ->url(static fn (Click $record): string => "https://who.is/whois-ip/ip-address/{$record->ip_address}", true),
            ])
            ->bulkActions([
                //
            ]);
    }
}
