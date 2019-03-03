@extends('layout')
@section('title','Product Page')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('pertial.left-sidebar')
				</div>
				<div class="col-sm-9 padding-right">
					@include('pertial.flash')
					@include('pertial.product-detail')
					
					@include('pertial.review-tab')
					
					@include('pertial.recommended-item')
				</div>
			</div>
		</div>
	</section>
@endsection