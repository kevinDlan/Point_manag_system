@extends('layouts.app')
@section('title')
 Liste des Référentiels
@endsection
@section('content')
  <div class="container">
      <h1 class="text-center font-weight-bold">Liste des Référentiels</h1>
      <div class="row justify-content-center">
          <div class="table-responsive ml-5">
              <table id="table" class="table table-bordered">
                  <thead style="background-color: #6610f2">
                      <tr style="color: white">
                          <th class="text-center">Libellé du Réferentiel</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($referentials as $referential)
                        <tr>
                            <td class="text-center">{{$referential->label}}</td>
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