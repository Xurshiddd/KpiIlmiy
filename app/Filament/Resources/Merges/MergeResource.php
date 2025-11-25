<?php

namespace App\Filament\Resources\Merges;

use App\Filament\Resources\Merges\Pages\CreateMerge;
use App\Filament\Resources\Merges\Pages\EditMerge;
use App\Filament\Resources\Merges\Pages\ListMerges;
use App\Filament\Resources\Merges\Schemas\MergeForm;
use App\Filament\Resources\Merges\Tables\MergesTable;
use App\Models\Merge;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MergeResource extends Resource
{
    protected static ?string $navigationLabel = 'Biriktirish';
    protected static ?string $model = Merge::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MergeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MergesTable::configure($table);
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
            'index' => ListMerges::route('/'),
            'create' => CreateMerge::route('/create'),
            'edit' => EditMerge::route('/{record}/edit'),
        ];
    }
}
