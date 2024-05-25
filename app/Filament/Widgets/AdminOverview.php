<?php

namespace App\Filament\Widgets;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::All()->count())
            ->description('All users from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
        Stat::make('Clients', '2')
            ->description('All clients from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
        Stat::make('Reservations', '3')
            ->description('All reservations from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        
        ];
    }
}
