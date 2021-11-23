@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-3">
                  <input class="form-control" value="{{date('Y-m-d')}}" type="date" name="user_selected_date" id="selected_date">
                </div>
                {{-- <div class="col-md-6 mb-4">
                   <select class="form-control" name="training" id="training">
                       <option selected disabled>--Veuillez choisir une formation--</option>
                     @foreach ($trains as $train )
                        <option value="{{$train->id}}">{{$train->label}}</option>  
                     @endforeach
                   </select>
                </div> --}}
            </div>
            <div class="table table-responsive">
                <table id="table" class="table table-bordered">
                    <thead style="background-color: #6610f2">
                        <tr style="color: white">
                            <th>Nom Prenom</th>
                            <th>Date Naissance</th>
                            <th>Sexe</th>
                            <th>Niveau d'étude</th>
                            <th>Email</th>
                            <th>Formation</th>
                            <th>Téléphone</th>
                            <th>Contact Tuteur</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="fw-bold">{{$student->lastName}} {{$student->firstName}}</td>
                            <td>{{date('d-m-Y',strtotime($student->birthday))}}</td>
                            <td>{{$student->sex == 'M' ? 'Homme' : 'Femme'}}</td>
                            <td>{{$student->educationLevel}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->label}}</td>
                            <td>{{$student->tel}}</td>
                            <td>{{$student->parentContact}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection