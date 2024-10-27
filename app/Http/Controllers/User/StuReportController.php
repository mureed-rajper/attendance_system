<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\Profile;
use App\Models\Report;
class StuReportController extends Controller
{
    //
     // show report for absent students
     public function absentreport($id){
        
        $profile = Profile::where('user_id',Auth::user()->id)->get();
        // fetch all attendance
        $attendance = Attendance::where('user_id',$id)->get();
        // report for absent students
        $reports = Report::where('students','absent')->get();
        // general report for all students
        $genreport = Report::where('students','general report')->get();
        // return $genreport;
        return view('usereport.report', ['attendance' => $attendance, 'reports' => $reports, 'profile' => $profile, 'genreport' => $genreport]);
    }
    
    
}
