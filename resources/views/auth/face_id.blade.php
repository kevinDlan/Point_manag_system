@extends('layouts.app')    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Face ID Authenticate') }}</div>
                <div class="card-body" id="videoContent">
                    @if(session('img_path'))
                     <img src="{{asset('img/students_pictures/'.session('img_path'))}}" style="display: none;" />
                    @endif
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
<script>
    // const imgURL = $('#userImgURL').attr('src');
    // alert(imgURL);
    // @if (session('img_path'))
    //     Swal.fire(
    //         'Question!',
    //         'You clicked the button!',
    //         'warning'
    //      )
    // @endif
</script>
@endpush