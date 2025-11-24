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
                    ->getStateUsing(fn($record) =>
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
                    ]),
                RepeatableEntry::make('articles')
                    ->label('Maqolalar')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Sarlavha')
                            ->placeholder('-'),
                        TextEntry::make('task.name')
                            ->label('Vazifa')
                            ->placeholder('-'),
                        TextEntry::make('task.year')
                            ->label('Yil')
                            ->placeholder('-'),
                        TextEntry::make('task.quarter')
                            ->label('Chorak')
                            ->placeholder('-'),
                        // Show article image (or default). Clicking the image will open the PDF if a PDF file is available.
                        ImageEntry::make('filesImg')
                            ->label('Maqola')
                            ->getStateUsing(fn($record) => match (true) {
                                \is_string($record->filesImg) && $record->filesImg !== '' => asset("storage/{$record->filesImg}"),
                                \is_object($record->filesImg) && isset($record->filesImg->path) => asset("storage/{$record->filesImg->path}"),
                                \is_object($record->filesImg) && isset($record->filesImg->url) => $record->filesImg->url,
                                default => asset('article_image.jpg'),
                            })
                            ->url(fn($record) => match (true) {
                                // common PDF fields: adjust these keys to match your model if necessary
                                \is_string($record->filesDoc) && $record->filesDoc !== '' => asset("storage/{$record->filesDoc}"),
                                \is_object($record->filesDoc) && isset($record->filesDoc->path) => asset("storage/{$record->filesDoc->path}"),
                                \is_object($record->filesDoc) && isset($record->filesDoc->url) => $record->filesDoc->url,

                                \is_string($record->file) && str_ends_with($record->file, '.pdf') => asset("storage/{$record->file}"),
                                \is_object($record->file) && isset($record->file->path) && str_ends_with($record->file->path, '.pdf') => asset("storage/{$record->file->path}"),

                                \is_object($record->files) && isset($record->files->path) && str_ends_with($record->files->path, '.pdf') => asset("storage/{$record->files->path}"),
                                default => null,
                            })
                            ->openUrlInNewTab(),
                        // maqolalar pdf patentini ko'rsatish nomi chiqsin bosganda pdf ochilsin
                        ImageEntry::make('patent')
                            ->label('Patent')
                            ->getStateUsing(fn($record) => match (true) {
                                default => asset('Patented-Stamp.png'),
                            })
                            ->url(fn($record) => match (true) {
                                \is_string($record->patent) && str_ends_with($record->patent, '.pdf') => asset("storage/{$record->patent}"),
                                \is_object($record->patent) && isset($record->patent->path) && str_ends_with($record->patent->path, '.pdf') => asset("storage/{$record->patent->path}"),
                                \is_object($record->patent) && isset($record->patent->url) && str_ends_with($record->patent->url, '.pdf') => $record->patent->url,
                                default => null,
                            })
                            ->openUrlInNewTab(),
                        TextEntry::make('content')
                            ->label('Mazmun')
                            ->placeholder('-'),
                    ])->columns(3),


            ]);
    }
}
