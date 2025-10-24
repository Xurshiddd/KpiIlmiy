<?php

namespace App\Filament\Resources\PriorityTasks\Pages;

use App\Filament\Resources\PriorityTasks\PriorityTaskResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPriorityTask extends ViewRecord
{
    protected static string $resource = PriorityTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
