<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('target_indicator_id')
                    ->required()
                    ->relationship('targetIndicator', 'name'),
                Select::make('quarter')
                    ->options([1 => '1', '2', '3', '4'])
                    ->name('Chorak')
                    ->required(),
                Select::make('year')
                    ->options(function () {
                        $currentYear = date('Y');
                        $currentYear = (int)$currentYear -1;
                        $years = [];
                        for ($i = $currentYear; $i <= $currentYear + 1; $i++) {
                            $years[$i] = (string)$i."-".$i+1;
                        }
                        return $years;
                    })
                    ->name('Yil')
                    ->required(),
                // Select::make('user_id')
                //     ->nullable()
                //     ->relationship('user', 'name')
                //     ->searchable()
                //     ->default(null),
                TextArea::make('description')
                    ->nullable(),
            ]);
    }
}
