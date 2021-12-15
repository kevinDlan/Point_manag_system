@extends('layouts.app')
@section('title')
 Bilan presence
@endsection
@section('content')
<div class="container">
    <h3 class="text-center font-weight-bold mb-3">Bilan des Présences</h3>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row mb-1">
                <div class="col-md-3">
                  <input class="form-control" value="{{$train->beginDate}}" type="date" readonly>
                </div>
                <div class="col-md-3">
                  <input class="form-control" value="{{$train->endDate}}" type="date" name="endate" id="endate">
                </div>  
            </div>
            <div class="table table-responsive">
                <table id="table" class="table table-bordered">
                    <thead style="background-color: #6610f2">
                        <tr style="color: white">
                         <th>Nom et Prénom</th>
                         <th>Total Heure présence</th>
                         <th>Total Heure Absence</th>
                         <th>Pourcentage Heure Présence</th>
                         <th>Pourcentage Heure Absence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                             <tr>
                                 <td>
                                     {{App\Models\Student::find($student->id_student)->lastName}} {{App\Models\Student::find($student->id_student)->firstName}}
                                 </td>
                                 <td>{{$student->passtimemin/60}}</td>
                                 <td>{{($subtotalworkdaymin*60 - $student->passtimemin)/60}} </td>
                                 <td class="text-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" 
                                                 role="progressbar" style="width:{{round(($student->passtimemin*100) /($subtotalworkdaymin*60),2)}}%" 
                                                 aria-valuenow="{{round(($student->passtimemin*100) /($subtotalworkdaymin*60),2)}}" aria-valuemin="0" aria-valuemax="100">
                                                {{round(($student->passtimemin*100) /($subtotalworkdaymin*60),2)}} %
                                            </div>
                                        </div>
                                    </td>
                                 <td class="text-center">
                                     <div class="progress">
                                            <div class="progress-bar bg-danger" 
                                                 role="progressbar" style="width:{{round((($subtotalworkdaymin*60 - $student->passtimemin)*100)/($subtotalworkdaymin*60),2)}}%" 
                                                 aria-valuenow="{{round((($subtotalworkdaymin*60 - $student->passtimemin)*100)/($subtotalworkdaymin*60),2)}}" aria-valuemin="0" aria-valuemax="100">
                                                {{round((($subtotalworkdaymin*60 - $student->passtimemin)*100)/($subtotalworkdaymin*60),2)}} %
                                            </div>
                                        </div>
                                    </td>
                             </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection