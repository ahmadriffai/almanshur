<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * lelev 3
         * 
         */

        Gate::define('bendahara-putri', function($user){
            return $user->hasRole(['bendahara-putri']);
        });
        Gate::define('bendahara-putra', function($user){
            return $user->hasRole(['bendahara-putra']);
        });
        Gate::define('edit-users', function($user){
            return $user->hasRole(['admin']);
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        /**
         * 
         * level 2
         */
        
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });
        
        Gate::define('manage-tagihan', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-menu', function($user){
            return $user->hasAnyRoles(['admin','pengurus','santri','bendahara-putra','bendahara-putri']);
        });

        Gate::define('manage-santri', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-kelas-kamar', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        /**
         * 
         * level 1
         * 
         */
        Gate::define('manage-admin', function($user){
            return $user->hasRole('admin');
        });
        
        Gate::define('manage-pengurus', function($user){
            return $user->hasAnyRoles(['pengurus','bendahara-putra','bendahara-putri']);
        });

        Gate::define('manage-bendahara', function($user){
            return $user->hasAnyRoles(['bendahara-putra','bendahara-putri']);
        });

        Gate::define('manage-santri', function($user){
            return $user->hasRole('santri');
        });

      
        Gate::define('manage-user', function($user){
            return $user->hasRole('user');
        });



    }
}
