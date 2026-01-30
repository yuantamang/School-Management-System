<?php

namespace App\Filament\Resources\AcademicYears;

use App\Filament\Resources\AcademicYears\Pages\CreateAcademicYear;
use App\Filament\Resources\AcademicYears\Pages\EditAcademicYear;
use App\Filament\Resources\AcademicYears\Pages\ListAcademicYears;
use App\Filament\Resources\AcademicYears\Pages\ViewAcademicYear;
use App\Filament\Resources\AcademicYears\Schemas\AcademicYearForm;
use App\Filament\Resources\AcademicYears\Schemas\AcademicYearInfolist;
use App\Filament\Resources\AcademicYears\Tables\AcademicYearsTable;
use App\Models\AcademicYear;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AcademicYearResource extends Resource
{
    protected static ?string $model = AcademicYear::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canViewAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('view academic years');
    }

    public static function canEditAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('update academic years');
    }

    public static function canCreateAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('create academic years');
    }

    public static function canDeleteAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('delete academic years');
    }

    public static function canView(Model $record): bool
    {
        return auth('web')->user()->can('view classes');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user('web')->can('update classes');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user('web')->can('delete classes');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('view academic years');
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth('web')->user();

        if (!$user->hasRole('super-admin')) {
            $query->where('school_id', $user->school_id);
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return AcademicYearForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AcademicYearInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicYearsTable::configure($table);
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
            'index' => ListAcademicYears::route('/'),
            'create' => CreateAcademicYear::route('/create'),
            'view' => ViewAcademicYear::route('/{record}'),
            'edit' => EditAcademicYear::route('/{record}/edit'),
        ];
    }
}
