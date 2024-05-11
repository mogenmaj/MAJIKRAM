<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New user',User::count())
            ->description('New users that have joined')
            ->descriptionIcon('heroicon-m-user-group')
            ->chart([1,3,5,10,20,40])
            ->color('succès')
         ];
    }
}
