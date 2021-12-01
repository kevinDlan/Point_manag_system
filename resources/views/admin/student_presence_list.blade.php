@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4 mb-3">
                  <input class="form-control" value="{{date('Y-m-d')}}" type="date" name="user_selected_date" id="selected_date">
                </div>
                <div class="col-md-6 mb-4">
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
                         <th>Jours</th>
                         <th>Date</th>
                         <th>Nom et Prénom</th>
                         <th>Heure Arrivée</th>
                         <th>Heure Départ</th>
                         <th>Temps passé en salle</th>
                         <th>Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                  @if(count($presence_lists) == 0)
                    <tr><td colspan='7' style='text-align:center;font-weight:bold;'>Aucun Arrivé pour le moment</td></tr>
                  @else
                   @foreach ($presence_lists as $presence_list)
                        @php
                          $goodTime = new DateTime('08:30');
                          $gt = $goodTime->format('H:i');
                          $arrivedTime = new DateTime($presence_list->morningSignIn);
                          $at = $arrivedTime->format('H:i');

                          if($presence_list->eveningSignIn !== null)
                          {
                            $start_date = new DateTime($presence_list->morningSignIn);
                            $end_date = new DateTime($presence_list->eveningSignIn);
                            $diff = $start_date->diff($end_date);
                            $pass = $diff->format("%H:%I:%S");
                          }else 
                          {
                             $pass = 'Indéterminé';
                          }
                        @endphp
                        <tr>
                           <td>{{__('day.'.date('l',strtotime($presence_list->dayDate)))}}</td>
                           <td>{{date('d-m-Y',strtotime($presence_list->dayDate))}}</td>
                           <td>{{$presence_list->lastName}} {{$presence_list->firstName}}</td>
                           <td>{{date('H:i',strtotime($presence_list->morningSignIn))}}</td>
                           @if($presence_list->eveningSignIn == null)
                               <td>Encore en salle</td>
                               <td>{{$pass}}</td>
                                <td>
                                    {{-- <i class="bi bi-toggle-off"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="fillCurrentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                        <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                                    </svg>
                                </td>
                           @else
                            <td>{{date('H:i',strtotime($presence_list->eveningSignIn))}}</td>
                               <td>{{$pass}}</td>
                                <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#6610f2" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                </svg>
                            </td>
                           @endif
                        </tr>
                    @endforeach
                  @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script type='text/javascript'>
       const getSearchData =  async(date)=>
       {
         const resp = await fetch("{{env('BASE_URL')}}search_data_by_date/"+date);
         const data = resp.json();
         return data;
       }

    //  Train select
    $('#training').on('change', e=>
    {
        let train = e.target.value;
        let date = $('#selected_date').val();
        get
    })
       var temp = ''
       var weekdays = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
       $('#selected_date').on('change', e => 
       {
           getSearchData(e.target.value)
           .then((data) => {
             if(data.length > 0)
             {
               temp = '';
               $('#table').children('tbody').empty();
               data.map( d =>{
                   let day = new Date(d.dayDate);
                   let arriveTime = new Date(d.morningSignIn) ;
                   let leaveTime = new Date(d.eveningSignIn);
                   let dd = new Date(d.dayDate)
                   temp += `<tr>
                                <td>${weekdays[day.getDay()-1]}</td>
                                <td>${dd.getDate()}-${dd.getMonth()}-${dd.getFullYear()}</td>
                                <td>${d.lastName} ${d.firstName}</td>
                                <td>${arriveTime.getHours()}:${arriveTime.getMinutes()}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`; 
               });
               $('#table').children('tbody').append(temp);
             }else
             {
                temp ='';
                $('#table').children('tbody').empty();
                temp = "<tr><td colspan='7' style='text-align:center;font-weight:bold;color:red;'>Aucune donnée Trouvée</td></tr>";
                $('#table').children('tbody').append(temp);
             }
           })
           .catch( (err) => {
            console.log(err);
           })
       })
    </script>
@endpush