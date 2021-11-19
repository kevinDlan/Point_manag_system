<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referential;
use App\Models\Partner;
use App\Models\Training;

class TrainingController extends Controller
{
    // construtor
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $refs = Referential::all(['id','label']);
        $partners = Partner::all(['id','name']);
        return view('training.index',['refs'=>$refs, 'partners'=>$partners]);
    }

    public function create(Request $request)
    {
      $validated = $request->validate(
          [
                'partner_id'=>'required|integer|exists:partners,id',
                'referential_id'=>'required|integer|exists:referentials,id',
                'train_label'=>'required|required|string',
                'begin_date' => 'required|date',
                'end_date' => 'required|date'
          ]
          );

          $train = new Training();

          $train->id_partner = $request->partner_id;
          $train->id_referential = $request->referential_id;
          $train->label = $request->train_label;
          $train->beginDate = $request->begin_date;
          $train->endDate = $request->end_date;

          $train->save();

          return redirect('create_traning')->with('message', 'La formation a été créée avec succès !');
    }
}
