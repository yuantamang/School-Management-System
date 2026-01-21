<?php

namespace App\Filament\Resources\Parents\Pages;

use App\Filament\Resources\Parents\ParentsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewParents extends ViewRecord
{
    protected static string $resource = ParentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
