<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('target_indicator_id')
                    ->required()
                    ->numeric(),
                Select::make('quarter')
                    ->options([1 => '1', '2', '3', '4'])
                    ->name('Chorak')
                    ->required(),
                TextInput::make('user_id')
                    ->nullable()
                    ->default(null),
            ]);
    }
}
