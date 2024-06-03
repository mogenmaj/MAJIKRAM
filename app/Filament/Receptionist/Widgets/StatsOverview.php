<?php

namespace App\Filament\Receptionist\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Chambres', '40')
            ->description('All chambres from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),

        Stat::make('Clients', '30')
            ->description('All clients from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
        Stat::make('Réservations', '20')
            ->description('All réservations from the database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
