<?php

namespace App\Filament\Resources\ExamResults\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExamResultInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_id')
                    ->numeric(),
                TextEntry::make('exam_id')
                    ->numeric(),
                TextEntry::make('total_marks')
                    ->numeric(),
                TextEntry::make('percentage')
                    ->numeric(),
                TextEntry::make('grade'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('remarks')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
