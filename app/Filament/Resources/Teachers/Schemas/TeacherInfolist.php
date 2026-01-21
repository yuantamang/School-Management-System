<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Models\Teacher;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('school_id')
                    ->numeric(),
                TextEntry::make('registration_number'),
                TextEntry::make('dob')
                    ->date(),
                TextEntry::make('qualification'),
                TextEntry::make('date_of_joining')
                    ->date(),
                TextEntry::make('phone'),
                TextEntry::make('address'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Teacher $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
