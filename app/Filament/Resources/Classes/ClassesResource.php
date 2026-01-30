<?php

namespace App\Filament\Resources\Classes;

use App\Filament\Resources\Classes\Pages\CreateClasses;
use App\Filament\Resources\Classes\Pages\EditClasses;
use App\Filament\Resources\Classes\Pages\ListClasses;
use App\Filament\Resources\Classes\Pages\ViewClasses;
use App\Filament\Resources\Classes\Schemas\ClassesForm;
use App\Filament\Resources\Classes\Schemas\ClassesInfolist;
use App\Filament\Resources\Classes\Tables\ClassesTable;
use App\Models\Classes;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ClassesResource extends Resource
{
    protected static ?string $model = Classes::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canViewAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()?->can('view classes') ?? null;
    }

    public static function canEditAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('update classes');
    }

    public static function canCreateAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('create classes');
    }

    public static function canDeleteAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('delete classes');
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
        return Filament::auth()->check() && Filament::auth()->user()->can('view classes');
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
        return ClassesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassesTable::configure($table);
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
            'index' => ListClasses::route('/'),
            'create' => CreateClasses::route('/create'),
            'view' => ViewClasses::route('/{record}'),
            'edit' => EditClasses::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
