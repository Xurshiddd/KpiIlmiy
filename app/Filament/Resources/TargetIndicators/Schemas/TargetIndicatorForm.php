<?php

namespace App\Filament\Resources\TargetIndicators\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TargetIndicatorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('priority_task_id')
                    ->relationship('priorityTask', 'name')
                    ->required()
                    ->label('Priority Task'),
                TextInput::make('name')
                    ->required()
                    ->label('Name'),
                TextInput::make('description')
                    ->label('Description'),
                Toggle::make('status')
                    ->label('Status'),
                TextInput::make('count_name')
                    ->label('O\'lchov birligi'),
                // TextInput::make('count_value')
                //     ->integer()
                //     ->default(fn() => 1)
                //     ->hidden()
                //     ->label('Count Value'),
            ]);
    }
}
