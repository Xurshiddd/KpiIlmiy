<?php

namespace App\Filament\Resources\Merges\Pages;

use App\Filament\Resources\Merges\MergeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMerges extends ListRecords
{
    protected static string $resource = MergeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
