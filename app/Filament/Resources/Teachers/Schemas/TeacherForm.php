<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('school_id')
                    ->required()
                    ->numeric(),
                TextInput::make('registration_number')
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('qualification')
                    ->required(),
                DatePicker::make('date_of_joining')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
