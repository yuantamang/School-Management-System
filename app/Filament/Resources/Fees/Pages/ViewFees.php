<?php

namespace App\Filament\Resources\Fees\Pages;

use App\Filament\Resources\Fees\FeesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFees extends ViewRecord
{
    protected static string $resource = FeesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
