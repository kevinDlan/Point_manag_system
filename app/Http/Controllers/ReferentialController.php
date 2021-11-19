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

    public function index()
    {
        return view('referential.index');
    }

    public function create(Request $request)
    {
  
      $validated = $request->validate([
            'ref_name' => 'required|string',
      ]);

      $ref = new Referential();
      $ref->label = $request->ref_name;
      $ref->save();
      return redirect('create_ref')->with('message', 'Réferentiel ajouter avec succès !');

    }
}
