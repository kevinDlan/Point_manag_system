<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        return view('partner.index');
    }

    public function create(Request $request)
    {
      $validated = $request->validate([
            'partner_name'=>'required|unique:partners,name',
            'activity_domain'=>'required|string',
            'address'=>'required|string',
            'tel'=>'required|min:8|max:14'
      ]);

      $partner = new Partner();
      $partner->name = $request->partner_name;
      $partner->activity_domain = $request->activity_domain;
      $partner->address = $request->address;
      $partner->contact = $request->tel;
      $partner->save();
      return redirect('add_partner')->with('message', 'Partenaire ajouter avec succès !');
    }
}
