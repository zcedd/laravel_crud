<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class studentLoginController extends Controller
{
    public function Login(){
        return view('studentLogin');
    }

    public function studentLogin(Request $request){
        $validated = $request -> validate([
            'Email'=>'required|email',
            'Password'=>'required',
        ]);

        $student = student::where('email', '=', $request->Email)->first();
        if($student){
            if(hash::check($request->Password, $student->password)){
                $request->session()->put('student_id', $student->id);
                return view('studentDashboard');
            }else{
                return back()->with('failed', 'Password don\'t match.');
            }
        }else{
            return back()->with('failed', 'This email is not register.');
        }
    }

    public function Registration(){
        return view('studentRegistration');
    }

    public function Register(Request $request){
        $validated = $request -> validate([
            'Name'=>'required',
            'Email'=>'required|email|unique:students',
            'Password'=>'required|min:5',
            'confirmPassword'=>'required|min:5'
        ]);
        
        $student = new student();
        $student->name = $request->Name;
        $student->email = $request->Email;
        $student->password = hash::make($request->Password);
        $result = $student->save();

        if($result){
            return back()->with('success', 'You have succesfully register.');
        }else{
            return back()->with('failed', 'Something went wrong.');
        }
    }

    public function Dashboard(){
        $data = array();
        if(Session::has('student_id')){
            $data = teacher::where('id', '=', Session::get('student_id'));
            return view('studentDashboard')->with(compact('data'));
        }else{
            return view('studentLogin');
        }
    }

    public function Logout(){
        if(Session::has('student_id')){
            Session::pull('student_id');
            return redirect('studentLogin');
        }
    }
}
