<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void {

	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		Gate::before(function(User $user) {
			return $user->hasRole('super-admin') ? true : null;
		});

		Gate::define('userIsVerified', function(User $user) {
			return $user->hasRole('member');
		});
	}
}
