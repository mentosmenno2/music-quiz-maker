<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Guards\AccessTokenGuard;
use App\Providers\User\AccessTokenToUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

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

		Auth::extend('access_token', function ($app, $name, array $config) {
			// automatically build the DI, put it as reference
			$userProvider = app(AccessTokenToUserProvider::class);
			$request = app('request');

			return new AccessTokenGuard($userProvider, $request, $config);
		});

		// Implicitly grant "admin" role all permissions
		// This works in the app by using gate-related functions like auth()->user->can() and @can()
		Gate::before(function ($user, $ability) {
			return $user->hasRole('admin') ? true : null;
		});
	}
}
