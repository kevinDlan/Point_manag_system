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
                <div class="card-header">{{ __('Inscription d\'un Apprenant')}}</div>
                <div class="card-body">
                   <form method="POST" action="{{ route('save-training') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="training_id" class="col-md-4 col-form-label text-md-right">{{ __('Formation à Suivre') }}</label>
                            <div class="col-md-6">
                                <select id="training_id" class="form-control @error('training_id') is-invalid @enderror" name="training_id" value="{{ old('training_id') }}" required>
                                    <option selected disabled>---Formation---</option>
                                    @foreach ($trainings as $training)
                                    <option value="{{$training->id}}">{{$training->label}}</option>
                                  @endforeach
                                </select>
                                @error('training_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_day" class="col-md-4 col-form-label text-md-right">{{ __('Date de Naissance')}}</label>
                            <div class="col-md-6">
                                <input id="birth_day" type="date" class="form-control @error('birth_day') is-invalid @enderror" name="birth_day" value="{{ old('birth_day') }}">
                                @error('birth_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_day" class="col-md-4 col-form-label text-md-right">{{ __('Sexe')}}</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexe" id="sexe_homme">
                                    <label class="form-check-label" for="sexe_homme">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexe" id="sexe_femme">
                                        <label class="form-check-label" for="sexe_femme">
                                            Femme
                                        </label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="referential_id" class="col-md-4 col-form-label text-md-right">{{ __('Référentiel de la formation') }}</label>
                            <div class="col-md-6">
                                <select id="training_id" class="form-control @error('training_id') is-invalid @enderror" name="training_id" value="{{ old('training_id') }}" required>
                                    <option selected disabled>Veuillez choisir un référentiel</option>
                                    @foreach ($refs as $ref)
                                    <option value="{{$ref->id}}">{{$ref->label}}</option>
                                  @endforeach
                                </select>
                                @error('re')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
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
                            <label for="education_level" class="col-md-4 col-form-label text-md-right">{{ __('Niveau d\'étude') }}</label>
                            <div class="col-md-6">
                                <select id="education_level" class="form-control @error('education_level') is-invalid @enderror" name="education_level" value="{{ old('education_level') }}" required>
                                    <option selected disabled>---Niveau d'étude de l'apprenant---</option>
                                    <option value="Bepc">Bepc</option>
                                    <option value="Bac">Bac</option>
                                    <option value="Bac +2">Bac+2</option>
                                    <option value="Licence">Licence</option>
                                    <option value="Master">Master</option>
                                    <option value="autre">Autres</option>
                                </select>
                                @error('education_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="referential_id" class="col-md-4 col-form-label text-md-right">{{ __('Domaine d\'étude') }}</label>
                            <div class="col-md-6">
                                <select id="training_id" class="form-control @error('training_id') is-invalid @enderror" name="training_id" value="{{ old('training_id') }}" required>
                                    <option selected disabled>Veuillez choisir un référentiel</option>
                                    @foreach ($refs as $ref)
                                    <option value="{{$ref->id}}">{{$ref->label}}</option>
                                  @endforeach
                                </select>
                                @error('re')
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