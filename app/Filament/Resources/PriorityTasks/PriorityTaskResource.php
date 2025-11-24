<?php

namespace App\Filament\Resources\PriorityTasks;

use App\Filament\Resources\PriorityTasks\Pages\CreatePriorityTask;
use App\Filament\Resources\PriorityTasks\Pages\EditPriorityTask;
use App\Filament\Resources\PriorityTasks\Pages\ListPriorityTasks;
use App\Filament\Resources\PriorityTasks\Pages\ViewPriorityTask;
use App\Filament\Resources\PriorityTasks\Schemas\PriorityTaskForm;
use App\Filament\Resources\PriorityTasks\Schemas\PriorityTaskInfolist;
use App\Filament\Resources\PriorityTasks\Tables\PriorityTasksTable;
use App\Models\PriorityTask;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PriorityTaskResource extends Resource
{
    protected static ?string $navigationLabel = 'Ustuvor vazifa';
    protected static ?string $model = PriorityTask::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PriorityTaskForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PriorityTaskInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PriorityTasksTable::configure($table);
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
            'index' => ListPriorityTasks::route('/'),
            'create' => CreatePriorityTask::route('/create'),
            'view' => ViewPriorityTask::route('/{record}'),
            'edit' => EditPriorityTask::route('/{record}/edit'),
        ];
    }
}
