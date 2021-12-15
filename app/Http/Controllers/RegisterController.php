<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        return view('register.index');
    }

    public function create(Request $request)
    {
        $response = Http::get('ipinfo.io/'.$request->ip_address.'?token='.env('IP_TOKEN'));
        $data = $response->json();
        
        // dd($data);
        // die();
        // $ip = $data['ip'] 160.155.137.215;

        $request->request->add(['region' => $data['region']]);
        $request->request->add(['country' => $data['country']]);

        // $country = $data['country'];
        $validated = $request->validate(
            [
              'email'=>'required|email|exists:users,email',
              'email' => 'required|email|exists:students,email',
              'ip_address'=>'required|ip|exists:routers_ips,public_address',
              'region' => 'string|exists:routers_ips,region',
              'country' => 'string|exists:routers_ips,country'
           ]);

        // Check if user is auth
        if(Auth::id() != null)
        {
           $studentId = Student::select('id')->where('email', $request->email)->first();
           $register = Register::select('id','id_student','dayDate','morningSignIn','eveningSignIn')
                               ->where('id_student',$studentId->id)
                               ->where('dayDate',date('Y-m-d'))
                               ->first();
            if($register === null)
            {
                // Create new day appointment
                $newRegister = new Register();
                $newRegister->id_student = $studentId->id;
                $newRegister->dayDate = date('Y-m-d');
                $newRegister->morningSignIn = date('Y-m-d H:i:s');
                $newRegister->save();
                return redirect('home')->with('morning_success','Pointage du matin effectuer avec succès !');
            }elseif($register->morningSignIn !==null && $register->eveningSignIn !== null)
            {
                return redirect('home')->with('dayRegisterOver','Vous avez déjà pointer 2 fois au cour de cette journnée !');

            }else
            {
               $updateRegister = Register::find($register->id);
               $updateRegister->eveningSignIn = date('Y-m-d H:i:s');
               $updateRegister->save();

               return redirect('home')->with('enening_success','Pointage du soir effectuer avec succès !');
            }
        }else{
            $studentId = Student::select('id')->where('email',$request->email)->first();
            $notAuthregister = Register::select('id_student', 'dayDate', 'morningSignIn', 'eveningSignIn')
                                ->where('id_student', $studentId->id)
                                ->where('dayDate', date('Y-m-d'))
                                ->first();
            if ($notAuthregister === null) 
            {
                // Create new day appointment
                $newNotAuthRegister = new Register();
                $newNotAuthRegister->id_student = $studentId->id;
                $newNotAuthRegister->dayDate = date('Y-m-d');
                $newNotAuthRegister->morningSignIn = date('Y-m-d H:i:s');
                $newNotAuthRegister->save();
                return redirect('/register_')->with('morning_success', 'Pointage du matin effectuer avec succès !');
            } elseif ($notAuthregister->morningSignIn !== null && $notAuthregister->eveningSignIn !== null)
            {
                return redirect('/register_')->with('dayRegisterOver', 'Vous avez déjà pointer 2 fois au cour de cette journnée !');
            } else
            {
                Register::where('id_student',$notAuthregister->id_student)
                        ->where('dayDate',date('Y-m-d'))
                        ->update(['eveningSignIn' => date('Y-m-d H:i:s')]);
                return redirect('/register_')->with('enening_success', 'Pointage du soir effectuer avec succès !');
            }
            
        }

        
    
    }

    public function faceId()
    {
        return view('face_id.index');
    }

}
