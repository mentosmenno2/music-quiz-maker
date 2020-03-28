<header>

	<!-- Skiplink -->
	<a href="#main-content" data-module="skiplink" class="skip-to-content">{{ __('Direct to content') }}</a>

	<div class="container">
		<a class="brand" href="{{ url('/') }}">
			{{ config('app.name', 'Laravel') }}
		</a>

		@include('common/navigation/primary')

		<div>
			@auth
				{{ Auth::user()->name }}
			@endauth
		</div>
	</div>
</header>
