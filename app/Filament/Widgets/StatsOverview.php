<?php

namespace App\Filament\Widgets;
use DB;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $count = DB::table('articles')->count();

        return [
            Stat::make('Institut kesimida', number_format($count))
                ->description($count . ' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];

    }
}
