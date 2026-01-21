<?php

namespace App\Filament\Resources\Subjects\Schemas;

use App\Models\Subject;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SubjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('school_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Subject $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
