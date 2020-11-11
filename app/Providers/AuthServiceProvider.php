<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    const HORAS_EXPIRAR_TOKEN = 1 ;
    const DIAS_EXPIRAR_REFRESH_TOKEN = 1;

    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addHour(self::HORAS_EXPIRAR_TOKEN));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(self::DIAS_EXPIRAR_REFRESH_TOKEN));
    }
}
