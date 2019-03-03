@extends('layout')
@section('title','Landing Page')
@section('content')
	@include('pertial.slider')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('pertial.left-sidebar')
				</div>
				<div class="col-sm-9 padding-right">
					@include('pertial.feature-item')
					
					@include('pertial.category-tab')
					
					@include('pertial.recommended-item')
				</div>
			</div>
		</div>
	</section>
@endsection