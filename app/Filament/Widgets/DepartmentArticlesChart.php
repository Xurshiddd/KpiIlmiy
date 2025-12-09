<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class DepartmentArticlesChart extends ChartWidget
{
    protected ?string $heading = 'Bo\'limlar kesimida maqolalar soni';

    protected function getData(): array
    {
        $data = User::select(
                'user_infos.department_name',
                DB::raw('COUNT(articles.id) as total_articles')
            )
            ->leftJoin('user_infos', 'user_infos.user_id', '=', 'users.id')
            ->leftJoin('articles', 'articles.author_id', '=', 'users.id')
            ->groupBy('user_infos.department_name')
            ->orderBy('total_articles', 'DESC')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Maqolalar soni',
                    'data' => $data->pluck('total_articles'),
                    'backgroundColor' => '#36A2EB',
                ],
            ],
            'labels' => $data->pluck('department_name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
