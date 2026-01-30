<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth('web')->user();

        if ($user && ! $user->hasRole('super-admin')) {
            $data['school_id'] = $user->school_id;
        }

        return $data;
    }
}
