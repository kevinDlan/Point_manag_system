<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Training;

class StudentController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        # code...

        $trainings = Training::all(['id','label']);
        return view('student.index')->with(['trainings'=>$trainings]);
    }
}
