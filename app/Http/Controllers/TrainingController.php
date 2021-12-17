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

    /************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
        return view('training.list', ['trainings' => $trainings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refs = Referential::all(['id', 'label']);
        $partners = Partner::all(['id', 'name']);
        return view('training.index', ['refs' => $refs, 'partners' => $partners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'partner_id' => 'required|integer|exists:partners,id',
                'referential_id' => 'required|integer|exists:referentials,id',
                'train_label' => 'required|required|string',
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(training $training)
    {
        //
    }
}
