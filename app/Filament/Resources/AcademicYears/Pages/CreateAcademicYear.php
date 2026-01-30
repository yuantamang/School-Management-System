<?php

namespace App\Filament\Resources\AcademicYears\Pages;

use App\Filament\Resources\AcademicYears\AcademicYearResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAcademicYear extends CreateRecord
{
    protected static string $resource = AcademicYearResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth('web')->user();

        if ($user && ! $user->hasRole('super-admin')) {
            $data['school_id'] = $user->school_id;
        }

        return $data;
    }
}
