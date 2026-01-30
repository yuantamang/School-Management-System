<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->relationship('classes','name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
