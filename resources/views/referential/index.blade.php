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
                <div class="card-header">{{ __('Creation de Réferentiel de formation')}}</div>
                <div class="card-body">
                   <form method="POST" action="{{ route('save-referential') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="ref_name" class="col-md-4 col-form-label text-md-right">{{ __('Libellé du reférentiel') }}</label>

                            <div class="col-md-6">
                                <input id="ref_name" type="ref_name" class="form-control @error('ref_name') is-invalid @enderror" name="ref_name" value="{{ old('ref_name') }}" required>

                                @error('ref_name')
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