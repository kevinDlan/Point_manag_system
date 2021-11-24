<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Instructor;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InstructorController extends Controller
{
    //

    public function index()
    {
        $trainings = Training::all(['id', 'label']);
        return view('instructor.index',['trainings'=>$trainings]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'training_id' => 'required|integer|exists:trainings,id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_day' => 'required|date',
            'sex' => 'required',
            'email' => 'required|email|unique:users,email',
            'email' => 'unique:instructors,email',
            'email'=>'unique:instructors,email',
            'address' => 'required|string',
            'tel' => 'required|max:10',
        ]);

        $intructor = new Instructor();

        $intructor->id_training = $request->training_id;
        $intructor->firstName = $request->first_name;
        $intructor->lastName = $request->last_name;
        $intructor->birthday = $request->birth_day;
        $intructor->sex = $request->sex;
        $intructor->email = $request->email;
        $intructor->address = $request->address;
        $intructor->tel = $request->tel;
        $intructor->save();

        // Create instructor Account
        User::create([
            'name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->tel),
            'type' => 'instructor'
        ]);

        return redirect('create_instructor')->with(['create_success'=>'Formateur Ajouté avec succès !']);
    }

    public function getInstructorList()
    {
      
    }

    public function update($id){

    }

    public function delete($id){
        
    }
}
