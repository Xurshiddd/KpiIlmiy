<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class BlogPostsChart extends ChartWidget
{
    protected ?string $heading = 'Professsor o\'qituvchilar bo\'yicha maqolalar soni';
    // protected function getTableColumnSpan(): string|int
    // {
    //     return 'full';
    // }

    // public function getColumnSpan(): string
    // {
    //     return 'full';
    // }
    protected function getData(): array
    {
        $users = User::withCount('articles')->get();
        return [
            'datasets' => [
                [
                    'label' => 'Professor o\'qituvchi kesimida',
                    'data' => $users->pluck('articles_count')->toArray(),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $users->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
