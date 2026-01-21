<?php

namespace App\Filament\Resources\Fees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('due_date')
                    ->required(),
                Select::make('status')
                    ->options(['paid' => 'Paid', 'unpaid' => 'Unpaid'])
                    ->required(),
            ]);
    }
}
