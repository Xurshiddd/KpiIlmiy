<?php

namespace App\Filament\Resources\Merges\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\TargetIndicator;
use App\Models\User;

class MergeForm
{
    public static function createForm(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('target_indicator_id')
                ->label('Ko‘rsatkich')
                ->options(TargetIndicator::pluck('name', 'id'))
                ->searchable()
                ->required(),

            Select::make('user_ids')
                ->label('Foydalanuvchilar')
                ->options(
                    User::where('email', '!=', 'admin@gmail.com')->pluck('name', 'id')
                )
                ->multiple()
                ->searchable()
                ->required(),
        ]);
    }

    // EDIT form
    public static function editForm(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('target_indicator_id')
                ->label('Ko‘rsatkich')
                ->options(TargetIndicator::pluck('name', 'id'))
                ->searchable()
                ->required(),

            Select::make('user_id')
                ->label('Foydalanuvchi')
                ->options(
                    User::where('email', '!=', 'admin@gmail.com')->pluck('name', 'id')
                )
                ->searchable()
                ->required(),
        ]);
    }
}
