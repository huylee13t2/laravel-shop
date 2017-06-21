@include('layouts.header')

	{{-- content --}}
	<div class="contentContainer">
		<div class="container">
			@yield('content')
			
		</div>
	</div>

	{{-- script --}}
	@yield('script')
	{{-- end script --}}

@include('layouts.footer')

