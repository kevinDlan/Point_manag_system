@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center font-weight-bold">Liste des Apprenants</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mb-1">
                   <select class="form-control" name="training" id="training">
                       <option selected disabled>--Veuillez choisir une formation--</option>
                     @foreach ($trains as $train )
                        <option value="{{$train->id}}">{{$train->label}}</option>  
                     @endforeach
                   </select>
                </div>
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
                            {{-- <th>Action</th> --}}
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
@push('script')
    <script>
    const getStudentListByTraining =  async(train_id)=>
       {
         const resp = await fetch("{{env('BASE_URL')}}search_student_by_train/"+train_id);
         const data = resp.json();
         return data;
       }
        var template = '';
        $('#training').on('change', (e)=>
        {
           getStudentListByTraining(e.target.value)
           .then( data => 
           {
              if(data.length > 0)
              {
                template = '';
                $('#table').children('tbody').empty();
                data.map( dt => 
                {
                  template +=`
                  <tr>
                    <td class="fw-bold">${dt.lastName} ${dt.firstName}</td>
                    <td>${dt.birthday}</td>
                    <td>${dt.sex == 'M' ? 'Homme': 'Femme'}</td>
                    <td>${dt.educationLevel}</td>
                    <td>${dt.email}</td>
                    <td>${dt.label}</td>
                    <td>${dt.tel}</td>
                    <td>${dt.parentContact}</td>
                </tr>`;
                });
                $('#table').children('tbody').append(template);
              }else
              {
                template = '';
                $('#table').children('tbody').empty();
                template = "<tr><td colspan='8' style='text-align:center;font-weight:bold;color:red;'>Aucun Apprenant inscrit a cette formation !</td></tr>";
                $('#table').children('tbody').append(template);
              }
           })
           .catch(error => {
               console.log(error);
           })
        })
    </script>
@endpush