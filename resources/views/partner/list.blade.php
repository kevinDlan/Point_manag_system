@extends('layouts.app')
@section('title')
 Liste des partenaires
@endsection
@section('content')
  <div class="container">
      <h1 class="text-center font-weight-bold">Liste des Partenaires</h1>
      <div class="row justify-content-center">
          <div class="table-responsive">
              <table id="table" class="table table-bordered">
                  <thead style="background-color: #6610f2">
                      <tr style="color: white">
                          <th>Logo</th>
                          <th>Nom Partenaire</th>
                          <th>Domaine d'activité</th>
                          <th>Adresse</th>
                          <th>Contact</th>
                          <td>Action</td>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($partners as $partner)
                        <tr>
                            <td></td>
                            <td>{{$partner->name}}</td>
                            <td>{{$partner->activity_domain}}</td>
                            <td>{{$partner->address}}</td>
                            <td>{{$partner->contact}}</td>
                            <td class="text-center">
                                <i data-bs-target="#{{$partner->id}}" style="color:green; cursor: pointer;" data-bs-toggle="tooltip modal" data-bs-placement="top" title="Modifier" class="bi bi-pencil-square"></i>
                                <i style="color:red; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" class="bi bi-trash ml-3"></i>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
              @foreach ($partners as $partner)
                 <!-- Modal -->
                    <div class="modal fade" id="{{$partner->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{$partner->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{$partner->id}}">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        </div>
                    </div>
                    </div>
              @endforeach
          </div>
      </div>
  </div>
@endsection