@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center font-weight-bold">Liste de mes présences</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead style="background-color: #6610f2">
                        <tr style="color: white">
                         <th>Jours</th>
                         <th>Date</th>
                         <th>Heure Arrivée</th>
                         <th>Heure Départ</th>
                         <th>Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($registers as $register)
                        <tr>
                           <td>{{__('day.'.date('l',strtotime($register->dayDate)))}}</td>
                           <td>{{date('d-m-Y',strtotime($register->dayDate))}}</td>
                           <td>{{date('H:i',strtotime($register->morningSignIn))}}</td>
                           <td>{{date('H:i',strtotime($register->eveningSignIn))}}</td>
                           @if($register->eveningSignIn == null)
                                <td>
                                    {{-- <i class="bi bi-toggle-off"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#dc3545" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                        <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                                    </svg>
                                </td>
                           @else
                                <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#198754" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                </svg>
                            </td>
                           @endif
                       </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection