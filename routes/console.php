<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('visit:store', function () {
    $this->call(\App\src\visit\console\comands\StoreVisit::class);
});

Artisan::command('visit:store', function () {
    $this->call(\App\Console\Commands\MakeModule::class);
});
