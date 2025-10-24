<?php

namespace App\Filament\Resources\PriorityTasks\Pages;

use App\Filament\Resources\PriorityTasks\PriorityTaskResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPriorityTask extends EditRecord
{
    protected static string $resource = PriorityTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
