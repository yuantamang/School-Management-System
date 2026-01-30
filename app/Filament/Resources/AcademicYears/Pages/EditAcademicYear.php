<?php

namespace App\Filament\Resources\AcademicYears\Pages;

use App\Filament\Resources\AcademicYears\AcademicYearResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademicYear extends EditRecord
{
    protected static string $resource = AcademicYearResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['school_id']);
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
