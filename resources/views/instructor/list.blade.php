@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center font-weight-bold">Liste des Formateurs</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table id="table" class="table table-bordered">
                    <thead style="background-color: #6610f2">
                        <tr style="color: white">
                            <th>Nom Prenom</th>
                            <th>Date Naissance</th>
                            <th>Sexe</th>
                            <th>Email</th>
                            <th>Formation</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($instructors as $instructor)
                        <tr>
                            <td class="fw-bold">{{$instructor->lastName}} {{$instructor->firstName}}</td>
                            <td>{{date('d-m-Y',strtotime($instructor->birthDay))}}</td>
                            <td>{{$instructor->sex == 'M' ? 'Homme' : 'Femme'}}</td>
                            <td>{{$instructor->email}}</td>
                            <td>{{$instructor->label}}</td>
                            <td>{{$instructor->tel}}</td>
                            <td>{{$instructor->address}}</td>
                            {{-- <td>
                                <div class="row ml-1">
                                    <a href=""><i class="bi bi-trash"></i></a>
                                    <a href=""><i class="bi bi-trash"></i></a>
                                    <a href=""><i class="bi bi-trash"></i></a>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection