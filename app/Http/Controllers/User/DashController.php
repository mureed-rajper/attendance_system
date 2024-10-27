<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Attendance;

class DashController extends Controller
{
    //show user dashbaord 
    public function userdash(){
        $image = Profile::where('user_id','=', Auth::user()->id)->get();

        // show total absent present leave
        $absent = Attendance::where('user_id',Auth::user()->id)->where('attendance','absent')->count();
        $present = Attendance::where('user_id',Auth::user()->id)->where('attendance','present')->count();
        $leave = Leave::where('user_id',Auth::user()->id)->count();
        return view('userdashbaord.userdash',['image' => $image, 'absent'=>$absent, 'present'=>$present, 'leave'=>$leave]);
    }

    
    

     
}
