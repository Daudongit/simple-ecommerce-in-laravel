@extends('layout')
@section('title','Shop Page')
@section('content')
	<section id="advertisement">
		<div class="container">
			<img src="/assets/images/banner/advertisement.jpg" alt="" />
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('pertial.left-sidebar')
				</div>
				<div class="col-sm-9 padding-right">
					@include('pertial.feature-item')
					{{$products->render()}}
				</div>
			</div>
		</div>
	</section>
@endsection