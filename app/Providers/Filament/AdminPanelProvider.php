<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\BarChart;
use App\Filament\Widgets\DoughnutChart;
use App\Filament\Widgets\PieChart;
use App\Filament\Widgets\SalesChart;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('ams')
            ->path('ams')
            ->login()
            ->colors([
                'primary' => '#2D349A',
            ])
            ->brandName('')
            ->favicon(asset('images/plm-logo.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                SalesChart::class,
                BarChart::class,
                PieChart::class,
                DoughnutChart::class,
                StatsOverview::class, // Ensure all relevant widgets are included
            ])
            ->middleware([
                \Illuminate\Cookie\Middleware\EncryptCookies::class,
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\Session\Middleware\AuthenticateSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
                \Filament\Http\Middleware\DisableBladeIconComponents::class,
                \Filament\Http\Middleware\DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/ams/theme.css')
            ->sidebarFullyCollapsibleOnDesktop()
            ->profile(\Filament\Pages\Auth\EditProfile::class)
            ->darkMode(false)
            ->navigationItems([]);
    }
}
