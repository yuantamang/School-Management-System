<?php

namespace App\Filament\Resources\Permissions;

use App\Filament\Resources\Permissions\Pages\CreatePermission;
use App\Filament\Resources\Permissions\Pages\EditPermission;
use App\Filament\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Resources\Permissions\Pages\ViewPermission;
use App\Filament\Resources\Permissions\Schemas\PermissionForm;
use App\Filament\Resources\Permissions\Schemas\PermissionInfolist;
use App\Filament\Resources\Permissions\Tables\PermissionsTable;
use App\Models\Permission;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionResource extends Resource
{
    protected static ?string $model = ModelsPermission::class;

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
        return PermissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PermissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermissionsTable::configure($table);
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
            'index' => ListPermissions::route('/'),
            'create' => CreatePermission::route('/create'),
            'view' => ViewPermission::route('/{record}'),
            'edit' => EditPermission::route('/{record}/edit'),
        ];
    }
}
