<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Candidate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $bestcandidates= Candidate::having('bestcandidate', '=', "YES")->get();
        view()->share('bestcandidates', $bestcandidates);

        $candidates_scheduled = Candidate::whereNotNull('interview_date')->where('interview_date', "!=", "")->get();
        $candidates_scheduled_count = count($candidates_scheduled);
        view()->share('candidates_scheduled_count', $candidates_scheduled_count);
    }
}
