<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\SendDailyTaskSummary;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command(SendDailyTaskSummary::class)->dailyAt('09:00')->withoutOverlapping();

Schedule::command('telescope:prune --hours=48')->daily();
