<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Models\Student;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('section.name')
                    ->label('Section'),
                TextEntry::make('registration_number'),
                TextEntry::make('dob')
                    ->date(),
                TextEntry::make('caste')
                    ->placeholder('-'),
                TextEntry::make('gender'),
                TextEntry::make('admission_no'),
                TextEntry::make('address'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Student $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
