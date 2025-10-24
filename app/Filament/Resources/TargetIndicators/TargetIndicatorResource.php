<?php

namespace App\Filament\Resources\TargetIndicators;

use App\Filament\Resources\TargetIndicators\Pages\CreateTargetIndicator;
use App\Filament\Resources\TargetIndicators\Pages\EditTargetIndicator;
use App\Filament\Resources\TargetIndicators\Pages\ListTargetIndicators;
use App\Filament\Resources\TargetIndicators\Schemas\TargetIndicatorForm;
use App\Filament\Resources\TargetIndicators\Tables\TargetIndicatorsTable;
use App\Models\TargetIndicator;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TargetIndicatorResource extends Resource
{
    protected static ?string $model = TargetIndicator::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TargetIndicatorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TargetIndicatorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTargetIndicators::route('/'),
            'create' => CreateTargetIndicator::route('/create'),
            'edit' => EditTargetIndicator::route('/{record}/edit'),
        ];
    }
}
