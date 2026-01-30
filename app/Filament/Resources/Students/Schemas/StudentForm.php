<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query){
                            $user = auth('web')->user();

                            if (!$user->hasRole('super-admin')) {
                                $query->where('school_id',$user->school_id);
                            }
                        }
                    )
                    ->required(),
                Select::make('section_id')
                    ->relationship(
                            name: 'section',
                            titleAttribute: 'name',
                            modifyQueryUsing: function ($query) {
                            $user = auth('web')->user();

                            if (!$user->hasRole('super-admin')) {
                                $query->whereHas('classes', function ($q) use ($user) {
                                    $q->where('school_id',$user->school_id);
                                });
                            }
                        }
                    )
                    ->required(),

                TextInput::make('registration_number')
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('caste')
                    ->default(null),
                TextInput::make('gender')
                    ->required(),
                TextInput::make('admission_no')
                    ->required(),
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
