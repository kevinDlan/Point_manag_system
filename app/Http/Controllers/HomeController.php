<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function presenceList()
    {
       $presence_lists = DB::select('SELECT firstName,lastName,dayDate,morningSignIn,eveningSignIn 
                                     FROM students,registers,users WHERE registers.id_student=users.id 
                                     AND users.email=students.email');
       $trains = Training::all(['id', 'label']);
       return view('admin.student_presence_list',['presence_lists'=>$presence_lists,'trains'=>$trains]);
    }

    public function search($date)
    {
        // dd($date);
        $presence_lists = DB::select('SELECT firstName,lastName,dayDate,morningSignIn,eveningSignIn 
                                     FROM students,registers,users WHERE registers.id_student=users.id 
                                     AND users.email=students.email
                                     AND dayDAte = :dat',['dat'=>$date]);
        return json_encode($presence_lists);
    }
}
