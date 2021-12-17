@extends('layouts.app')
@section('title')
 Liste des Formations
@endsection
@section('content')
  <div class="container">
      <h1 class="text-center font-weight-bold">Liste des Formations</h1>
      <div class="row justify-content-center">
          <div class="table-responsive ml-5">
              <table id="table" class="table table-bordered">
                  <thead style="background-color: #6610f2">
                      <tr style="color: white">
                          <th>Référentiel Formation</th>
                          <th>Bailleur</th>
                          <th>Intitulé Formation</th>
                          <th>Date Début</th>
                          <th>Date Fin</th>
                          <th>Etat</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($trainings as $train)
                        <tr>
                            <td class="text-center">{{App\Models\Referential::find($train->id_referential)->label}}</td>
                            <td class="text-center">{{App\Models\Partner::find($train->id_partner)->name}}</td>
                            <td>{{$train->label}}</td>
                            <td>{{date('d-m-Y',strtotime($train->beginDate))}}</td>
                            <td>{{date('d-m-Y',strtotime($train->endDate))}}</td>
                            <td>
                                @if(date('Y-m-d') < date('Y-m-d',strtotime($train->endDate)))
                                   @if(date('Y-m-d')< date('Y-m-d', strtotime($train->beginDate)))
                                      <span class="badge badge-warning">Pas encore Débutée</span>
                                   @else
                                      <span class="badge badge-info">En cours</span>
                                   @endif
                                @else
                                 <span class="badge badge-danger">Terminée</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <i style="color:green; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier" class="bi bi-pencil-square"></i>
                                <i style="color:red; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" class="bi bi-trash ml-3"></i>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection