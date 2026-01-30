<?php

namespace App\Filament\Resources\Sections\Schemas;

use App\Models\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('classes.name')
                    ->label("Class"),
                TextEntry::make('name'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Section $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
