@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-4 mb-3">
             <input class="form-control" value="{{date('Y-m-d')}}" type="date" name="user_selected_date" id="selected_date">
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
                         <th>Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($presence_lists as $presence_list)
                        <tr>
                           <td>{{__('day.'.date('l',strtotime($presence_list->dayDate)))}}</td>
                           <td>{{date('d-m-Y',strtotime($presence_list->dayDate))}}</td>
                           <td>{{$presence_list->lastName}} {{$presence_list->firstName}}</td>
                           <td>{{date('H:i',strtotime($presence_list->morningSignIn))}}</td>
                           @if($presence_list->eveningSignIn == null)
                               <td>Encore en salle</td>
                                <td>
                                    {{-- <i class="bi bi-toggle-off"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="fillCurrentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                        <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                                    </svg>
                                </td>
                           @else
                               <td>{{date('H:i',strtotime($presence_list->eveningSignIn))}}</td>
                                <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#6610f2" class="bi bi-toggle-on" viewBox="0 0 16 16">
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
@push('script')
    <script type='text/javascript'>
       moment.locale('fr');
       console.log(moment('2021-11-20 21:37:26').format('hh:mm'));
       const getSearchData =  async(date)=>
       {
         const resp = await fetch("{{env('BASE_URL')}}search_data_by_date/"+date);
         const data = resp.json();
         return data;
       }

       var temp = ''
       $('#selected_date').on('change', e => 
       {
           let date = e.target.value;
        //    alert(date);
           getSearchData(date)
           .then((data) => {
             if(data.length > 0)
             {
               $('#table').children('tbody').empty();
               data.map( d =>{
                //    <tr><td>d.</td></tr>
                //    temp += ``; 
               })
             }else
             {
                $('#table').children('tbody').empty();
                temp = "<tr><td colspan='6' style='text-align:center'>Aucune donnée Trouvé</td></tr>";
                $('#table').children('tbody').append(temp);
             }
           })
           .catch( (err) => {
            console.log(err);
           })
       })
    </script>
@endpush