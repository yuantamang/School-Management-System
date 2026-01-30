<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canViewAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()?->can('view users') ?? null;
    }

    public static function canEditAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('update users');
    }

    public static function canCreateAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('create users');
    }

    public static function canDeleteAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('delete users');
    }

    public static function canView(Model $record): bool
    {
        return ! $record->hasRole('super-admin');
    }

    public static function canEdit(Model $record): bool
    {
        return ! $record->hasRole('super-admin');
    }

    public static function canDelete(Model $record): bool
    {
        return ! $record->hasRole('super-admin');
    }


    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('view users');
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth('web')->user();

        $query = parent::getEloquentQuery()
            ->whereDoesntHave('roles', fn($q) => $q->where('name', 'super-admin'));

        if ($user && ! $user->hasRole('super-admin')) {
            $query->where('school_id', $user->school_id);
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
