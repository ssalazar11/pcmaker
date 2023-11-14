<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PDFGeneratorInterface;
use App\Services\DomPDFGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PDFGeneratorInterface::class, DomPDFGenerator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
