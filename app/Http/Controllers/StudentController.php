<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Training;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreateMail;


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


    public function create(Request $request)
    {
        $validated = $request->validate([
            'training_id' => 'required|integer|exists:trainings,id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_day'=> 'required|date',
            'sex' => 'required',
            'education_level' => 'required|string',
            'study_domain'=>'required|string',
            // 'email'=>'required|email|unique:users,email',
            // 'email' => 'required|email|unique:students,email',
            'address'=>'required|string',
            'tel'=>'required|max:10',
            'parent_tel'=>'required|max:10'
        ]);

        $student = new Student();
        $student->id_training = $request->training_id;
        $student->firstName = $request->first_name;
        $student->lastName = $request->last_name;
        $student->birthday = $request->birth_day;
        $student->sex = $request->sex;
        $student->educationLevel = $request->education_level;
        $student->branchOfStudy = $request->study_domain;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->tel = $request->tel;
        $student->parentContact = $request->parent_tel;
        // $student->save();

        // Create student account
        // User::create([
        //     'name' => $request->last_name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->tel),
        //     'type' => 'student'
        // ]);
        
        // Send mail to user
        Mail::to($request->email)->send(new AccountCreateMail());

        // Redirect after
        return redirect('create_student')->with('message', 'L\'apprenant à été ajouter avec succès et mail envoyer !');

    }

    public function passwordSet()
    {
        return view('student.password_set');
    }

    public function modif_password(Request $request)
    {
       $request->validate([
           'email'=>'required|exists:users,email',
           'old_password' => 'required|min:8',
           'new_password' => 'required|min:8',
           'image' => 'required|image|mimes:png,jpg,jpeg',
       ]);

       $id = Auth::id();
       $file = $request->file('image');
       $fileName = $id.'.'.$file->getClientOriginalExtension();
      //$destPath = public_path(). '/img/students_pictures';
       
       $user = User::find($id);
       $user->img_name = $fileName;
       $user->password = Hash::make($request->new_password);
       $user->save();

        //Move file
        // $file->move($destPath, $fileName);
        $file->store(public_path() . '/img/students_pictures');

        return redirect('home')->with('password_success', 'Mot de passe modifier avec succès !');
    }

    public function registerList()
    {
       $registers = Register::where('id_student',Auth::id())
                                   ->orderBy('dayDate','desc')
                                   ->get();
       return view('student.register_list')->with(['registers'=>$registers]);
    }
}
