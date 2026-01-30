<?php

namespace App\Filament\Resources\Classes\Pages;

use App\Filament\Resources\Classes\ClassesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClasses extends EditRecord
{
    protected static string $resource = ClassesResource::class;

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
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
