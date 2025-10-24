<?php

namespace App\Filament\Resources\TargetIndicators\Pages;

use App\Filament\Resources\TargetIndicators\TargetIndicatorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTargetIndicators extends ListRecords
{
    protected static string $resource = TargetIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
