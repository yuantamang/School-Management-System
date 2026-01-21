<?php

namespace App\Filament\Resources\Marks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MarkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('exam_id')
                    ->required()
                    ->numeric(),
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('subject_id')
                    ->required()
                    ->numeric(),
                TextInput::make('marks')
                    ->required()
                    ->numeric(),
            ]);
    }
}
