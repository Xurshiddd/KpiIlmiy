<?php

namespace App\Filament\Resources\TargetIndicators\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TargetIndicatorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('priorityTask.name')->label('Ustuvor vazifalar')->limit(50),
                TextColumn::make('name')->label('Name')->limit(50),
                TextColumn::make('description')->label('Description')->limit(50),
                ToggleColumn::make('status')->label('Status'),
                TextColumn::make('count_name')->label('O\'lchov birligi'),
                TextColumn::make('count_value')->label('Count Value'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
