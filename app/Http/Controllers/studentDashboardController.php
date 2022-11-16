<?php

namespace App\Http\Controllers;
use App\Models\studentGrades;

use Illuminate\Http\Request;

class studentDashboardController extends Controller
{
    public function Dashboard(){
        $data = studentGrades::where('student_id','=', Session::get('student_id'));
        return $data;
    }
}
