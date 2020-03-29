<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AccessToken;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	protected function authenticated(Request $request, $user)
	{
		/**
		 * Set api tokens
		 * @see https://medium.com/@sirajul.anik/laravel-api-authenticate-user-with-custom-driver-different-table-using-auth-middleware-fa2cabec2d61
		 */
		if ($user instanceof \App\Models\User) {
			$this->deleteExpiredAccessTokens($user);
			$this->createAccessToken($user);
		}
	}

	private function createAccessToken($user)
	{
		$token = new AccessToken();
		$token->user_id = $user->id;
		$token->access_token = Str::random(60);
		$token->expire_date = Carbon::now()->addDays(7);
		$token->save();
	}

	private function deleteExpiredAccessTokens($user)
	{
		$deletedRows = AccessToken::where('user_id', '=', $user->id)
			->where('expire_date', '<', Carbon::now())
			->delete();
	}
}
