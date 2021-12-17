<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $partners = Partner::all();
    return view('partner.list',['partners'=>$partners]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('partner.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'partner_name' => 'required|unique:partners,name',
      'activity_domain' => 'required|string',
      'address' => 'required|string',
      'tel' => 'required|min:8|max:14'
    ]);

    $partner = new Partner();
    $partner->name = $request->partner_name;
    $partner->activity_domain = $request->activity_domain;
    $partner->address = $request->address;
    $partner->contact = $request->tel;
    $partner->save();
    return redirect('add_partner')->with('message', 'Partenaire ajouter avec succès !');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\partner  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function show(partner $partner)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\partner  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function edit(partner $partner)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\partner  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, partner $partner)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\partner  $routers_ip
   * @return \Illuminate\Http\Response
   */
  public function destroy(partner $partner)
  {
    //
  }
}
