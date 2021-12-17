@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
               </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Ajout de Nouveau Partenaire')}}</div>
                <div class="card-body">
                   <form method="POST" action="{{ route('partners.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="partner_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom du Partenaire') }}</label>

                            <div class="col-md-6">
                                <input id="partner_name" required type="text" class="form-control @error('partner_name') is-invalid @enderror" name="partner_name" value="{{ old('partner_name') }}" autofocus>

                                @error('partner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="activity_domain" class="col-md-4 col-form-label text-md-right">{{ __('Domaine d\'activité') }}</label>
                            <div class="col-md-6">
                                <input id="activity_domain" required type="text" class="form-control @error('activity_domain') is-invalid @enderror" name="activity_domain" value="{{ old('activity_domain') }}">

                                @error('activity_domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
                            <div class="col-md-6">
                                <input id="address" required type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>
                            <div class="col-md-6">
                                <input id="tel" required type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
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
