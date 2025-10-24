<?php

namespace App\Filament\Resources\TargetIndicators\Pages;

use App\Filament\Resources\TargetIndicators\TargetIndicatorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTargetIndicator extends EditRecord
{
    protected static string $resource = TargetIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
