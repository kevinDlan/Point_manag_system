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
                <div class="card-header">{{ __('Ajout de Formateur')}}</div>
                <div class="card-body">
                   <form method="POST" action="{{ route('save-instructor') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="training_id" class="col-md-4 col-form-label text-md-right">{{ __('Formation') }}</label>
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
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
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
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sexe')}}</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="M" name="sex" id="sexe_homme">
                                    <label class="form-check-label" for="sexe_homme">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" value="F" name="sex" id="sexe_femme">
                                        <label class="form-check-label" for="sexe_femme">
                                            Femme
                                        </label>
                                </div>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="education_level" class="col-md-4 col-form-label text-md-right">{{ __('Niveau d\'étude') }}</label>
                            <div class="col-md-6">
                                <select id="education_level" class="form-control @error('education_level') is-invalid @enderror" name="education_level" value="{{ old('education_level') }}" required>
                                    <option selected disabled>---Niveau d'étude de l'apprenant---</option>
                                    <option value="Bepc">Bepc</option>
                                    <option value="Bac">Bac</option>
                                    <option value="Bts">Bts</option>
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
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="study_domain" class="col-md-4 col-form-label text-md-right">{{ __('Domaine d\'étude') }}</label>
                            <div class="col-md-6">
                                <select id="study_domain" class="form-control @error('study_domain') is-invalid @enderror" name="study_domain" value="{{ old('study_domain') }}" required>
                                    <option selected disabled>---Domaine d'étude---</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Mathématique">Mathématique</option>
                                    <option value="Littérature">Littérature</option>
                                </select>
                                @error('study_domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" placeholder="kevinkone19@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" placeholder="Abidjan-Riviera2-Anono" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Numéro Télephone') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-text">+225</div>
                                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" value="{{old('tel')}}" name="tel" required>
                                </div>
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="parent_tel" class="col-md-4 col-form-label text-md-right">{{ __('Télephone du parent') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-text">+225</div>
                                    <input id="parent_tel" type="tel" class="form-control @error('parent_tel') is-invalid  @enderror" name="parent_tel" required value="{{old('parent_tel')}}">
                                </div>
                                @error('parent_tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
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
    <script type='text/javascript'>
        @if(session('create_success'))
            Swal.fire(
                `{{{session('create_success')}}}`,
                '',
                'success');
        @endif 
    </script>
@endpush