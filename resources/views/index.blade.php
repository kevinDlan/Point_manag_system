@extends('layouts.app')
@section('title')
  Bienvenu
@endsection
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img width="450px" height="450px" src="{{asset('img/bg.svg')}}" alt="bg">
        </div>
        <div class="col-md-6">
            <img width="450px" height="450px" src="{{asset('img/bg_1.svg')}}" alt="bg1">
        </div>
    </div>
</div>
@endsection
