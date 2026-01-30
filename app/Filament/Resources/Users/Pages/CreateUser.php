<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth('web')->user();

        if ($user && ! $user->hasRole('super-admin')) {
            $data['school_id'] = $user->school_id;
        }

        return $data;
    }
}
