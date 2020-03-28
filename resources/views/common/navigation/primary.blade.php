<nav aria-label="{{ __('Primary navigation') }}">
	<ul>
		@guest
			<li>
				<a href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
			@if (Route::has('register'))
				<li>
					<a href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
			@endif
		@else
			<li>
				<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
			</li>
		@endguest
	</ul>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
</nav>
