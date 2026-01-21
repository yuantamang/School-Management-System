<?php

namespace App\Filament\Resources\Parents\Schemas;

use App\Models\Parents;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ParentsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('school_id')
                    ->numeric(),
                TextEntry::make('phone'),
                TextEntry::make('address'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Parents $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
