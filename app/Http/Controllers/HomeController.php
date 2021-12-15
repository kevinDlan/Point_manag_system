<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Register;
use App\Models\Student;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $date = date('Y-m-d');
       $presence_lists = DB::select('SELECT firstName,lastName,dayDate,morningSignIn,eveningSignIn 
                                     FROM students,registers WHERE registers.id_student=students.id 
                                     AND dayDate =:dat',['dat'=>$date]);
       $trains = Training::all(['id', 'label']);
       return view('admin.student_presence_list',['presence_lists'=>$presence_lists,'trains'=>$trains]);
    }

    public function search($date)
    {
        // dd($date);
        $presence_lists = DB::select('SELECT firstName,lastName,dayDate,morningSignIn,eveningSignIn 
                                     FROM students,registers WHERE registers.id_student=students.id 
                                     AND dayDate = :dat',['dat'=>$date]);
        return json_encode($presence_lists);
    }

    public function studentList()
    {
        if(Auth::user()->type === 'instructor')
        {
            $trainID = Instructor::where('email',Auth::user()->email)->first();
            $students = DB::select('SELECT firstName,UCASE(lastName) as lastName,birthday,sex,educationLevel,
                                       email,tel,parentContact,label FROM 
                                       students,trainings WHERE students.id_training = trainings.id
                                       AND trainings.id =:id
                                       ',['id'=> $trainID->id_training]);
            $train = Training::find($trainID->id_training);
            return view('admin.student_list', ['students' => $students, 'train' => $train]);
        }else{
            $students = DB::select('SELECT firstName,UCASE(lastName) as lastName,birthday,sex,educationLevel,
                                       email,tel,parentContact,label FROM 
                                       students,trainings WHERE students.id_training = trainings.id');
            $trains = Training::all();
            return view('admin.student_list', ['students' => $students, 'trains' => $trains]);
        }

    }

    public function getStudentByTraining($id)
    {
        $students = DB::select('SELECT firstName,UCASE(lastName) as lastName,birthday,sex,educationLevel,
                                       email,tel,parentContact,label FROM 
                                       students,trainings WHERE students.id_training = :id AND students.id_training = trainings.id',['id'=>$id]);
        return json_encode($students);
    }

    public function bilan()
    {
        $id = 1;
        $train = Training::find($id);
        $totalworkdaymin = $this->getWorkingDays($train->beginDate,$train->endDate)*9;
        $subtotalworkdaymin = $this->getWorkingDays($train->beginDate,date('Y-m-d'))*9;
        $students = DB::select('SELECT id_student,
                                 SUM((HOUR(eveningSignIn)*60+MINUTE(eveningSignIn))-(HOUR(morningSignIn)*60+MINUTE(morningSignIn)))
                                 as passtimemin FROM registers WHERE eveningSignIn != :clause 
                                 AND id_student IN (SELECT id FROM students WHERE id_training ='.$id.') 
                                 GROUP BY id_student
                               ',['clause'=>'']);
        return view('admin.bilan',['train'=>$train, 'totalworkdaymin'=> $totalworkdaymin, 'subtotalworkdaymin'=> $subtotalworkdaymin,'students'=>$students]);
    }


    public function getWorkingDays($startDate, $endDate)
    {
        $begin = strtotime($startDate);
        $end   = strtotime($endDate);
        if ($begin > $end) 
        {
            echo "startdate is in the future! <br />";
            return 0;
        }else
        {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) 
            {
                $no_days++; // no of days in the given interval
                $what_day = date("N", $begin);
                if ($what_day > 5) 
                { // 6 and 7 are weekend days
                    $weekends++;
                };
                $begin += 86400; // +1 day
            };
            $working_days = $no_days - $weekends;

            return $working_days;
        }
    }


}
