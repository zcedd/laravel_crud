<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\student;
use App\Models\studentGrades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class teacherLoginController extends Controller
{
    public function Login(){
        return view('teacherLogin');
    }

    public function teacherLogin(Request $request){
        $validated = $request -> validate([
            'Email'=>'required|email',
            'Password'=>'required',
        ]);

        $teacher = teacher::where('email', '=', $request->Email)->first();
        if($teacher){
            if(hash::check($request->Password, $teacher->password)){
                $request->session()->put('teacher_id', $teacher->id);

                $data = studentGrades::where('teacher_id', '=', Session::get('teacher_id'))->with('student', 'teacher')->get();
                return view('teacherDashboard', compact('data'));
            }else{
                return back()->with('failed', 'Password don\'t match.');
            }
        }else{
            return back()->with('failed', 'This email is not register.');
        }
    }

    public function Registration(){
        return view('teacherRegistration');
    }

    public function Register(Request $request){
        $validated = $request -> validate([
            'Name'=>'required',
            'Email'=>'required|email|unique:teachers',
            'Password'=>'required|min:5',
            'confirmPassword'=>'required|min:5'
        ]);
        
        $teacher = new teacher();
        $teacher->name = $request->Name;
        $teacher->email = $request->Email;
        $teacher->password = hash::make($request->Password);
        $result = $teacher->save();

        if($result){
            $student_name = student::all();
            foreach($student_name as $student){
                $teacher_name = teacher::where('email', '=', $request->Email)->first();
                $Grade = new studentGrades();
                $Grade->teacher_id = $teacher_name->id;
                $Grade->student_id = $student->id;
                $result2 = $Grade->save();

            }
            return back()->with('success', 'You have succesfully register.');
        }else{
            return back()->with('failed', 'Something went wrong.');
        }
    }

    public function Dashboard(){
        $data = array();
        if(Session::has('teacher_id')){
            $data = teacher::where('id', '=', Session::get('teacher_id'));
            return view('teacherDashboard')->with(compact('data'));
        }else{
            return view('teacherLogin');
        }
    }

    public function Logout(){
        if(Session::has('teacher_id')){
            Session::pull('teacher_id');
            return redirect('/Teacher/Login');
        }
    }
}
