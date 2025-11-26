<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Models\TargetIndicator;
use App\Models\User;
use Auth;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Carbon\Carbon;
use App\Models\PriorityTask;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;
        $years = date('n') >= 9 ? (string) $currentYear . "-" . (string) ($currentYear + 1) : (string) ($currentYear - 1) . "-" . (string) $currentYear;
        $columns = [
            // 1. User Name
            TextColumn::make('name')
                ->label('Foydalanuvchi')
                ->searchable()
                ->sortable(),

            // 2. PriorityTasks
            TextColumn::make('targetIndicators')
                ->label('Target Indikatorlar')
                ->formatStateUsing(fn($record) => $record->targetIndicators()->where('status', true)->pluck('name')->implode(', '))
                ->wrap(),
            TextColumn::make('articles_count')
                ->label('Maqolalar soni ' . $lastYear)
                ->getStateUsing(function ($record) use ($lastYear) {
                    $query = $record->articles()->whereYear('created_at', $lastYear);
                    return $query->count();
                }),
            TextColumn::make('articles_count_current_year')
                ->label('Maqolalar soni ' . $currentYear)
                ->getStateUsing(function ($record) use ($currentYear) {
                    $query = $record->articles()->whereYear('created_at', $currentYear);
                    return $query->count();
                }),
            // bu yerga 2024-2025 label bo'lishi kerk va uni 4 tadan ustuni bo'lishi kerak yani choraklar shu choraklaarda nechta maqola yozilganligi korsatilishi kerak
            TextColumn::make('articles_count_current_year_q1')
                ->label("{$years} - 1-chorak")
                ->getStateUsing(function ($record) use ($years) {
                    $query = $record->articles()->where('quarter', 1)
                        ->whereHas('task', fn($q) => $q->where('year', $years));
                    return $query->count();
                }),
            TextColumn::make('articles_count_current_year_q2')
                ->label($years . ' - 2-chorak')
                ->getStateUsing(function ($record) use ($years) {
                    $query = $record->articles()->where('quarter', 2)
                        ->whereHas('task', fn($q) => $q->where('year', $years));
                    return $query->count();
                }),
            TextColumn::make('articles_count_current_year_q3')
                ->label($years . ' - 3-chorak')
                ->getStateUsing(function ($record) use ($years) {
                    $query = $record->articles()->where('quarter', 3)
                        ->whereHas('task', fn($q) => $q->where('year', $years));
                    return $query->count();
                }),
            TextColumn::make('articles_count_current_year_q4')
                ->label($years . ' - 4-chorak')
                ->getStateUsing(function ($record) use ($years) {
                    $query = $record->articles()->where('quarter', 4)
                        ->whereHas('task', fn($q) => $q->where('year', $years));
                    return $query->count();
                }),
        ];
        return $table->modifyQueryUsing(
            fn($query) =>
            $query->where('email', '!=', 'admin@gmail.com')
        )->columns($columns);
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
            'index' => ListUsers::route('/'),
            // 'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            // 'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
