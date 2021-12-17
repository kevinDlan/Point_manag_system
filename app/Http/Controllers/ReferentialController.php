<?php

namespace App\Http\Controllers;

use App\Models\Referential;
use Illuminate\Http\Request;

class ReferentialController extends Controller
{
  //constructor
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $referentials = Referential::all();
    return view('referential.list', ['referentials' => $referentials]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('referential.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    dd('Y');
    $validated = $request->validate([
      'ref_name' => 'required|string',
    ]);

    $ref = new Referential();
    $ref->label = $request->ref_name;
    $ref->save();
    return redirect('create_ref')->with('message', 'Réferentiel ajouter avec succès !');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\referential  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function show(referential $referentiel)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\referential  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function edit(referential $referentiel)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\referential  $referentiel
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, referential $referentiel)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\referential  $referentiel
   * @return \Illuminate\Http\Response
   */
  public function destroy(referential $referentiel)
  {
    //
  }
}
