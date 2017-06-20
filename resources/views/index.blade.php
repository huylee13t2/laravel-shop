@include('layouts.header')

	{{-- content --}}
	<div class="contentContainer">
		<div class="container">
			{{-- login --}}
			@yield('login')
			
			<div class="row">
				{{-- left-bar --}}
				@include('layouts.left_bar')

				<div class="main col-md-10">
					<div class="content">
						{{-- content --}}
						@yield('content')
						{{-- end content --}}
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- script --}}
	@yield('script')
	{{-- end script --}}

@include('layouts.footer')

