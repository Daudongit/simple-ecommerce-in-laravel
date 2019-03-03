@extends('layout')
@section('title','404 Page')
@section('content')
    <div class="container text-center">
        <div class="logo-404">
            <a href="/"><img src="/assets/images/banner/logo.png" alt="" /></a>
        </div>
        <div class="content-404">
            <img src="/assets/images/404/404.png" class="img-responsive img-resize" alt=""/>
            <h3><b>OPPS!</b> We Couldn’t Find this Page</h3>
            <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
            <h4>
                <a href="/" class="btn btn-primary">Bring me back Home</a>
            </h4>
        </div>
    </div>
@endsection