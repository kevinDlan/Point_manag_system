@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pointage de présence')}}</div>
                <div class="card-body">
                    <form action="{{route('register_save')}}" method="POST">
                        @csrf
                        @auth
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required readonly>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-Mail') }}</label>
                            <div class="col-md-6">
                                <input placeholder="Entrer votre adresse mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endauth
                        <div class="form-group row">
                            <label for="ip_address" class="col-md-4 col-form-label text-md-right">{{ __('Adresse IP') }}</label>
                            <div class="col-md-6">
                                <input id="ip_address" type="text" class="form-control @error('ip_address') is-invalid @enderror" name="ip_address" required readonly>
                                @error('ip_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="submit" type="submit" class="btn btn-primary">
                                    {{ __('Pointer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
  <script type="text/javascript">
        // Getting ip address
        const getIP = async () => 
        {
            const ip = await fetch('https://ip.seeip.org/jsonip');
            return ip.json();
        } 

        getIP()
        .then( ip => 
        {
            // console.log(ip.ip)
            $("#ip_address").val(ip['ip']);
        })
        .catch( error => 
        {
            console.log(error);
        })
//Show session for different alert message
    @error('region')
       Swal.fire(
            'Adresse IP?',
            'Êtes vous connecté sur le bon routeur?',
            'question'
        )
    @enderror

    @error('ip_address')
            'Adresse IP?',
            'Êtes vous connecté sur le bon routeur?',
            'question'
    @enderror

    @error('country')
            'Adresse IP?',
            'Êtes vous connecté sur le bon routeur?',
            'question'
    @enderror

    @if(session('enening_success'))
        Swal.fire(
            `{{{session('enening_success')}}}`,
            '',
            'success');
    @endif
    @if(session('morning_success'))
        Swal.fire(
            `{{{session('morning_success')}}}`,
            '',
            'success');
    @endif
    @if(session('dayRegisterOver'))
        Swal.fire(
            `{{{session('dayRegisterOver')}}}`,
            '',
            'info');
    @endif

    // const getPosition = (position)=>{
    //    console.log(position)
    // }
    // const getError = (error)=>{
    //     console.log(error)
    // }
    // navigator.geolocation.getCurrentPosition(getPosition,getError);
  </script>
@endpush