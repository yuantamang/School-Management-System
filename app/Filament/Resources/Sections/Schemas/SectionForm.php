<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->relationship(
                        name: 'classes',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query) {
                            $user = auth('web')->user();
                            if (!$user->hasRole('super-admin')) {
                                $query->where('school_id',$user->school_id);
                            }
                        }
                    )
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
