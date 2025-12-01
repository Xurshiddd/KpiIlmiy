<?php

namespace App\Filament\Resources\Merges\Pages;

use App\Filament\Resources\Merges\MergeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMerge extends EditRecord
{
    protected static string $resource = MergeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    
}
