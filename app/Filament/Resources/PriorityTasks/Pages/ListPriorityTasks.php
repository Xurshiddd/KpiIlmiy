<?php

namespace App\Filament\Resources\PriorityTasks\Pages;

use App\Filament\Resources\PriorityTasks\PriorityTaskResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPriorityTasks extends ListRecords
{
    protected static string $resource = PriorityTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
