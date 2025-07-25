<?php

use App\Models\Patients;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function (): void {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    Patients::where('status', true)->update(['status' => false]);
})->daily();

