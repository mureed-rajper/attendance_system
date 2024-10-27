<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
class AttendanceController extends Controller
{
    // show attendance page
    public function attendance(){
        $image = Profile::where('user_id','=', Auth::user()->id)->get();
        return view('userattendance.attendance',['image' => $image]);
    }

    // mark attendance 
    public function markattendance(Request $request){
       
        
        $today = now()->format('Y-m-d');
        $existattendance = Attendance::where('user_id','=', Auth::user()->id)->where('date','=',$today)->first();

        if(!$existattendance){
            $data = Attendance::create([
                'attendance' => $request->attendance,
                'date' => $today,
                'user_id' => Auth::user()->id,
            ]);
            if($data){
                return redirect()->route('allattendance')->with('sucess','your attendance submited successfully!');
            }
        }
        else{
            return redirect()->route('allattendance')->with('error','you already mark attendance. You can mark attendance one time in a day.');
            
        }
    }

    // show all attendance
    public function allattendance(Request $request){
        // get image path
        $image = Profile::where('user_id','=', Auth::user()->id)->get();

        $attendances = Attendance::with('user')->where('user_id','=',Auth::user()->id);
        if(!empty($request->atend)){
            $attendances = Attendance::with('user')->where('user_id', Auth::user()->id)->where('attendance','like','%'.$request->atend.'%');
        }
        $attendances = $attendances->paginate(8);
        return view('userattendance.allattendance', ['attendances' => $attendances], ['image' => $image]);
    }
}

?>