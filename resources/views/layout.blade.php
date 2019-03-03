<!DOCTYPE html>
<html lang="en">
	@include('pertial.head')
	<body>
		@include('pertial.header')
		
		@yield('content')
		
		@include('pertial.footer')

		@include('pertial.foot')
	</body>
</html>