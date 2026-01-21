<?php

namespace App\Filament\Resources\ExamResults\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExamResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('exam_id')
                    ->required()
                    ->numeric(),
                TextInput::make('total_marks')
                    ->required()
                    ->numeric(),
                TextInput::make('percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('grade')
                    ->required(),
                Select::make('status')
                    ->options(['pass' => 'Pass', 'failed' => 'Failed', 'absent' => 'Absent'])
                    ->default('pass')
                    ->required(),
                Textarea::make('remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
