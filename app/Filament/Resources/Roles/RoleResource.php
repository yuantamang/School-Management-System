<?php

namespace App\Filament\Resources\Roles;

use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\Pages\ViewRole;
use App\Filament\Resources\Roles\Schemas\RoleForm;
use App\Filament\Resources\Roles\Schemas\RoleInfolist;
use App\Filament\Resources\Roles\Tables\RolesTable;
use App\Models\Role;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleResource extends Resource
{
    protected static ?string $model = ModelsRole::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canViewAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()?->hasRole('super-admin') ?? null;
    }

    public static function canCreateAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->hasRole('super-admin');
    }

    public static function canEditAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->hasRole('super-admin');
    }

    public static function canDeleteAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->hasRole('super-admin');
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
        return Filament::auth()->check() && Filament::auth()->user()->hasRole('super-admin');
    }

    public static function form(Schema $schema): Schema
    {
        return RoleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolesTable::configure($table);
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
