<?php

namespace App\Filament\Resources\PriorityTasks\Tables;

use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PriorityTasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Vazifa nomi')->sortable()->searchable(),
                TextColumn::make('description')->label('Tavsifi')->sortable()->searchable(),
                ToggleColumn::make('status')->label('Faolmi?')->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
