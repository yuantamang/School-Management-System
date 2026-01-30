<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\Pages\CreateStudent;
use App\Filament\Resources\Students\Pages\EditStudent;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Pages\ViewStudent;
use App\Filament\Resources\Students\Schemas\StudentForm;
use App\Filament\Resources\Students\Schemas\StudentInfolist;
use App\Filament\Resources\Students\Tables\StudentsTable;
use App\Models\Student;
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

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canViewAny(): bool
    {
        return Filament::auth()->check()
            && Filament::auth()->user()?->can('view students') ?? null;
    }

    public static function canEditAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('create students');
    }

    public static function canDeleteAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('delete students');
    }

    public static function canCreateAny(): bool
    {
        return Filament::auth()->check() && Filament::auth()->user()->can('create students');
    }

    public static function canView(Model $record): bool
    {
        return auth('web')->user()->can('view classes');
    }

    public static function canEdit(Model $record): bool
    {
        return auth('web')->user()->can('update classes');
    }

    public static function canDelete(Model $record): bool
    {
        return auth('web')->user()->can('delete classes');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->check()
            && Filament::auth()->user()->can('view students');
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
        return StudentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StudentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
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
            'index' => ListStudents::route('/'),
            'create' => CreateStudent::route('/create'),
            'view' => ViewStudent::route('/{record}'),
            'edit' => EditStudent::route('/{record}/edit'),
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
