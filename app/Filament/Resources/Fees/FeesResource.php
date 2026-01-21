<?php

namespace App\Filament\Resources\Fees;

use App\Filament\Resources\Fees\Pages\CreateFees;
use App\Filament\Resources\Fees\Pages\EditFees;
use App\Filament\Resources\Fees\Pages\ListFees;
use App\Filament\Resources\Fees\Pages\ViewFees;
use App\Filament\Resources\Fees\Schemas\FeesForm;
use App\Filament\Resources\Fees\Schemas\FeesInfolist;
use App\Filament\Resources\Fees\Tables\FeesTable;
use App\Models\Fees;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeesResource extends Resource
{
    protected static ?string $model = Fees::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FeesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFees::route('/'),
            'create' => CreateFees::route('/create'),
            'view' => ViewFees::route('/{record}'),
            'edit' => EditFees::route('/{record}/edit'),
        ];
    }
}
