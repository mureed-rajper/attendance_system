<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Report;
use App\Models\Attendance;
use App\Models\Grade;

class GradeController extends Controller
{
     ////admin upgrading
     public function adminupgrad(){ 
        // show user profile image
        $profile = Profile::where('user_id',Auth::user()->id)->get();
        
        return view('admindashboard.upgrades.upgrad', ['profile' =>$profile]);
    }
 
    // give grades to student' attendance
     public function grades(Request $request){

        $grade = $request->grade;
        $days = $request->days;
        $existing = Grade::where('grades', '=', $grade)->where('days', '=', $days)->first();

        if(!$existing){
            $grad = Grade::create([
                'grades' => $grade,
                'days' => $days,
            ]);

            if($grad){
                return redirect()->route('allgrades')->with('sucess','grade created sucessfully!');
            }
        }
        else{
            return redirect()->route('allgrades')->with('error','this grade already exists try different');
        }
     }

    //show all grades
    public function allgrades(){
       // show user profile image
       $profile = Profile::where('user_id',Auth::user()->id)->get();

       $grades = Grade::all();
       return view('admindashboard.upgrades.allgrade', ['profile'=>$profile, 'grades'=>$grades]);
    }

    // show specific student grade
    public function studentgrade($id){
          // show user profile image
       $profile = Profile::where('user_id',Auth::user()->id)->get();
       
       //total present days    
       $stupresent = Attendance::where('user_id',$id)->where('attendance','present')->count();
       $student = User::find($id);
       return view('admindashboard.upgrades.studentgrade', ['profile'=>$profile, 'stupresent'=>$stupresent, 'student'=>$student]);
    }
}
?>