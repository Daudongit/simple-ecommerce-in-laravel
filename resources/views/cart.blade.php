@extends('layout')
@section('title','Cart Page')
@section('content')
	@include('pertial.cart-item')
	@include('pertial.do-action')
	@include('pertial.save-for-later-table')
@endsection