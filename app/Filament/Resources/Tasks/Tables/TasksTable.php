<?php

namespace App\Filament\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            TextColumn::make('targetIndicator.name')
                ->label('Target Indicator')
                ->searchable(),

            TextColumn::make('user.name')
                ->label('Foydalanuvchi')
                ->searchable(),

            TextColumn::make('created_at')
                ->label('Yaratilgan vaqt')
                ->dateTime()
                ->sortable(),

            TextColumn::make('updated_at')
                ->label('Yangilangan vaqt')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
