<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\teacher;
use App\Models\studentGrades;

class teacherDashboardController extends Controller
{
    public function edit(Request $request, $id){
        $affected = studentGrades::where('id', $id)
              ->update(['grade' => $request->edit]);
        if($affected){
            return redirect()->route('teacherDashboard');
        }else{
            return redirect()->route('teacherDashboard');
        }
    }

    public function delete($id){
        $affected = studentGrades::where('id', $id)
              ->update(['grade' => '']);
        if($affected){
            return redirect()->route('teacherDashboard');
        }else{
            return redirect()->route('teacherDashboard');
        }
    }
}
