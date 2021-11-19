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
                <div class="card-header">{{ __('Creation de formation')}}</div>
                <div class="card-body">
                   <form method="POST" action="{{ route('save-training') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="partner_id" class="col-md-4 col-form-label text-md-right">{{ __('Nom du Partenaire en charge de la formation') }}</label>
                            <div class="col-md-6">
                                <select id="partner_id" class="form-control @error('partner_id') is-invalid @enderror" name="partner_id" value="{{ old('partner_id') }}" required>
                                    <option selected disabled>Veuillez choisir un partenaire</option>
                                    @foreach ($partners as $partner)
                                    <option value="{{$partner->id}}">{{$partner->name}}</option>
                                  @endforeach
                                </select>
                                @error('partner_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="referential_id" class="col-md-4 col-form-label text-md-right">{{ __('Référentiel de la formation') }}</label>
                            <div class="col-md-6">
                                <select id="referential_id" class="form-control @error('referential_id') is-invalid @enderror" name="referential_id" value="{{ old('referential_id') }}" required>
                                    <option selected disabled>Veuillez choisir un référentiel</option>
                                    @foreach ($refs as $ref)
                                    <option value="{{$ref->id}}">{{$ref->label}}</option>
                                  @endforeach
                                </select>
                                @error('referential_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="train_label" class="col-md-4 col-form-label text-md-right">{{ __('Label de la formation') }}</label>
                            <div class="col-md-6">
                                <input id="train_label" type="text" class="form-control @error('train_label') is-invalid @enderror" name="train_label" value="{{ old('train_label') }}">

                                @error('train_label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="begin_date" class="col-md-4 col-form-label text-md-right">{{ __('Date de début de la formation') }}</label>
                            <div class="col-md-6">
                                <input id="begin_date" type="date" class="form-control @error('begin_date') is-invalid @enderror" name="begin_date" required>
                                @error('begin_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin de la formation') }}</label>
                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer') }}
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