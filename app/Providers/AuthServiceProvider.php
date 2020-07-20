<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
        $this->registerPolicies();
        Gate::define('isAdmin',function($user){
            return $user->role_id === 1;
        });

        Gate::define('isGroup_admin',function($user){
            return $user->role_id === 2;
        });
        Gate::define('isJustUser',function($user){
            return $user->role_id === 3;
        });
        Gate::define('isOstan',function($user){
            return $user->region_point->region_center->county_id === 9;
        });
        Gate::define('isAbhar',function($user){
            return $user->region_point->region_center->county_id === 2;
        });
        Gate::define('isBimaGVagir',function($user){
            return $user->group->id === 4;
        });
        Gate::define('isRiasat',function($user){
            return $user->group->id === 2;
        });
        Gate::define('isRiasat',function($user){
            return $user->group->id === 2;
        });
        Gate::define('isGostaresh',function($user){
            return $user->group->id === 3;
        });
        Gate::define('isEnvironment',function($user){
            return $user->group->id === 5;
        });
        Gate::define('isBehvarz',function($user){
            return $user->group->id === 6;
        });


    }
}
