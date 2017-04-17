<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')

		@yield('top_javascripts')
	</head>
	
	<body>
	
		@include('partials._nav')	
		
		<div class="container">
			@include('partials._messages')

			@yield('content')
			
			@include('partials._footer')
		</div>
		
		
		@include('partials._javascript')
	
		@yield('javascripts')
	
	</body>
</html>