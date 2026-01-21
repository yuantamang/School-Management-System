<?php

namespace App\Filament\Resources\Schools\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SchoolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('address')
                    ->default(null),
                Select::make('type')
                    ->options(['school' => 'School', 'college' => 'College'])
                    ->default('school')
                    ->required(),
            ]);
    }
}
