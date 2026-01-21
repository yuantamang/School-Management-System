<?php

namespace App\Filament\Resources\Parents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('school_id')
                    ->required()
                    ->numeric(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
