@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de Bord')}}</div>
                <div class="card-body">
                    @if(Auth::user()->type === 'admin')
                   <a href="{{route('create-partner-form')}}">Ajouter un partenaire</a><br>
                   <a href="{{route('create-train-ref')}}">Création de référentiel</a><br>
                   <a href="{{route('training')}}">Créer une formation</a><br>
                   <a href="{{route('create-student-form')}}">Enregistrer un Apprenant</a>
                   @elseif (Auth::user()->type === 'student')
                   <a href="{{route('register-view')}}">Pointer ma présence</a><br>
                   <a href="{{route('create-partner-form')}}">Recap de mes présences</a><br>
                   <a href="{{route('password-set-form')}}">Modifier mon de passe</a><br>
                   @else
                   {{-- something --}}
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    @if(session('password_success'))
        Swal.fire(
            `{{{session('password_success')}}}`,
            '',
            'success');
    @endif
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
</script>
 
@endsection