<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')

		@yield('top_javascripts')
	</head>
	
	<body>
	
		<div class="wrap">
		
			@include('partials._nav')	
			
			<div class="container">
				@include('partials._messages')

				@yield('content')
				
			</div>

		</div>

		@include('partials._footer')
		
		
		@include('partials._javascript')
	
		@yield('javascripts')


	</body>
</html>