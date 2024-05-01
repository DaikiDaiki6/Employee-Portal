<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Documentrequest;
use App\Policies\DocumentRequestPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Documentrequest' => 'App\Models\DocumentRequestPolicy' 
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
