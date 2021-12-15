<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerifController extends Controller
{
    //

    public function index(){
        return view('auth.face_id_verification');
    }


    public function verifEmail(Request $request)
    {
      $request->validate([
        'email'=>'required|exists:users,email'
       ]);
       
       $userCredential = User::where('email',$request->email)->first();

       if($userCredential->type == 'student')
       {
          session(['email'=>$request->email,'img_path'=>$userCredential->img_name]);
          return view('auth.face_id');
       }else
       {
          $email = $request->email;
         //  return view('auth.login',['email'=>$email]);
          return redirect('login')->with(['email'=>$email]);
       }
    }
}
