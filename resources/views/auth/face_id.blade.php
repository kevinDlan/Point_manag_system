@extends('layouts.app')    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Face ID Authenticate') }}</div>
                <div class="card-body" id="videoContent">
                    <img id="user" src="{{asset('img/you.jpg')}}" style="display: none;" />
                    <video id="video" width="300" height="300" autoplay muted></video>
                    <canvas id='canvas' height="300" width="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script defer src="{{asset('js/faceID/face-api.min.js')}}"></script>
{{-- <script defer src="{{asset('js/faceID/main.js')}}"></script> --}}
<script defer src="{{asset('js/faceID/image-matcher.js')}}"></script>
@endpush