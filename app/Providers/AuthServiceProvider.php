<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view',function ($user){

                return ($user->Type=="ADMIN")
                ? Response::allow()
                : Response::deny('Không có quyền truy cập');;
        });
        Gate::define('fix',function (){
            return true;
        });
        Gate::define('delete',function ($user,$id){
            
            return $user->Type!="ADMIN";
        });
    }
}
