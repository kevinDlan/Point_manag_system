@extends('layouts.app')
@section('title')
Accueil
@endsection
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
                   <a href="{{route('create-student-form')}}">Enregistrer un Apprenant</a><br>
                   <a href="{{route('create-instructor-form')}}">Ajouter un formateur</a><br>
                   <a href="{{route('presence-liste')}}">Liste de présence</a><br>
                   <a href="{{route('bilan')}}">Bilan (Présence-Abscence)</a><br>
                   <a href="{{route('student-list')}}">Liste des Apprenants</a><br>
                   <a href="{{route('instructor-list')}}">Liste des Formateurs</a><br>
                   @elseif(Auth::user()->type === 'instructor')
                   <a href="{{route('student-list')}}">Liste des Apprenants</a><br>
                   <a href="{{route('instructor-list')}}">Liste des Formateurs</a><br>
                   <a href="{{route('presence-liste')}}">Liste de présence</a><br>
                   {{-- <a href="{{route('add-ipaddress')}}">Enregistrer nouvel adresse IP</a><br> --}}
                   @elseif (Auth::user()->type === 'student')
                   <a href="{{route('register-view')}}">Pointer ma présence</a><br>
                   <a href="{{route('register-list')}}">Recap de mes présences</a><br>
                   <a href="{{route('password-set-form')}}">Modifier mon de passe</a><br>
                   @else
                   {{-- something --}}
                   @endif
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->type === 'student')
       <div class="row justify-content-center mt-3">
           <div id="map" style='height:350px;' class="col-md-8"></div>
       </div>
    @endif
</div>
@endsection
@push('script')
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

    // Map script
    // fecth data from 
        @if(Auth::user()->type === 'student')
            //    var locate = [-4.0017,5.3544]
               var locate = [-4.010581394224859,5.351321748048184]
               mapboxgl.accessToken = 'pk.eyJ1Ijoia2V2aW5rb25lIiwiYSI6ImNrdzJ4czBwNzAybmQyeW1lYWV2NTdkM2oifQ.2WHo3ir6OpxN4YFLi5U7sg';
               const map = new mapboxgl.Map({
               container: 'map', // container ID
               style: 'mapbox://styles/mapbox/dark-v10', // style URL
               center:locate, // starting position [lng, lat]
               zoom: 14 // starting zoom
              });
              const marker = new mapboxgl.Marker()
                .setLngLat(locate)
                .addTo(map);
            //   const popup = new mapboxgl.Popup()
            //     .setLngLat(locate)
            //     .setText('MTN ACADEMY')
            //     .addTo(map);
        @endif
</script>
@endpush