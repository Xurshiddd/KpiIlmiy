<?php

namespace App\Filament\Resources\Users\Schemas;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('employee_id_number')
                    ->label('Hemis Id')
                    ->placeholder('-'),
                TextEntry::make('type')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                ImageEntry::make('avatar')
                    ->label('Rasm')
                    ->getStateUsing(fn ($record) =>
                        $record->avatar
                            ? asset('storage/' . $record->avatar)
                            : asset('default.jpg')),
                RepeatableEntry::make('infos')
                ->label('Bo‘limlar')
                ->schema([
                    TextEntry::make('department_name')
                        ->label('Bo‘lim nomi')
                        ->columnSpanFull(),
                    TextEntry::make('staffPosition')
                        ->label('Lavozim')
                        ->placeholder('-'),
                    TextEntry::make('employmentForm')
                        ->label('Ish turi')
                        ->placeholder('-'),
                    TextEntry::make('employmentStaff')
                        ->label('Shtat')
                        ->placeholder('-'),
                    TextEntry::make('employeeStatus')
                        ->label('Holat')
                        ->placeholder('-'),
                ])
                ->columns(2),
            ]);
    }
}
