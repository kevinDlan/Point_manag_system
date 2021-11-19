@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de Bord')}}</div>
                <div class="card-body">
                   <a href="{{route('create-partner-form')}}">Ajouter un partenaire</a><br>
                   <a href="{{route('create-train-ref')}}">Création de référentiel</a><br>
                   <a href="{{route('training')}}">Créer une formation</a><br>
                   <a href="{{route('create-student-form')}}">Enregistrer un Apprenant</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
