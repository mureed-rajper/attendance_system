<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Leave;
use App\Models\User;
use App\Models\Attendance;

class LeaveController extends Controller
{
    //show all student's leave
    public function allleaves(Request $request){
        // admin profile image
        $profile = Profile::where('user_id', Auth::user()->id)->get();
        $leavs = Leave::with('user')->orderBy('created_at', 'desc'); 
        if(!empty($request->leav)){
            $leavs = Leave::with('user')->where('user_id',$request->leav);
        }
        $leavs = $leavs->paginate(8);

        // total present and absent
        $attendance = Attendance::where('attendance','present')->get();
        return view('admindashboard.leave.allleave',['profile' =>$profile, 'leaves' =>$leavs, 'attendance'=>$attendance]);
    }

    // edit status of leave
    public function editleave($id){
        // admin profile image
        $profile = Profile::where('user_id', Auth::user()->id)->get();

        $editleave = Leave::find($id);
        // find total leave,present,absent
        $leave = Leave::where('user_id',$editleave->user_id)->count();
        $present = Attendance::where('user_id',$editleave->user_id)->where('attendance','present')->count();
        $absent = Attendance::where('user_id',$editleave->user_id)->where('attendance','absent')->count();
        return view('admindashboard.leave.editleave', ['profile' => $profile, 'editleave' => $editleave, 'leave'=>$leave, 'present'=>$present, 'absent'=>$absent]);
    }
    
    // update leave status
    public function updateleave(Request $request, $id){

        $update = Leave::where('id',$id)->update(['status' => $request->status]);

        if($update){
           return redirect()->route('allleaves')->with('sucess','leave status updated successfully!');           
        }
    }
}
