<?php

namespace App\Filament\Resources\PriorityTasks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ToggleColumn;

class PriorityTaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 'name' is required for all priority tasks
                TextInput::make('name')
                    ->required(),
                // 'description' is optional and can be left empty
                TextInput::make('description')
                    ->nullable(),
                Toggle::make('status')
                    ->label('Faolmi?')
                    // ->boolean()
                    ->default(true),
            ]);
    }
}
