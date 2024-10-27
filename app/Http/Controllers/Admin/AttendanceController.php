<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
        // show attendance page
        public function adminattendance($id){
            $image = Profile::where('user_id', Auth::user()->id)->get();
            
            $student = Profile::find($id);
            return view('admindashboard.attendance.markattendance',['profile' => $image, 'student' => $student]);
        }

        // admin mark student's attendance
        public function adminmarkattend(Request $request, $id){
            
            $student = Profile::find($id);  
            $today = now()->format('Y-m-d');
          
            $existattendance = Attendance::where('date',$today)->where('user_id','=',$student->user_id)->first();

            if(!$existattendance){

                $data = Attendance::create([
                    'attendance' => $request->attendance,
                    'date' => $today,
                    'user_id' => $student->user_id,
                ]);

               if($data){
                return redirect()->route('allattend')->with('sucess','marked attendance successfully');
               } 
            }
            else{
                return redirect()->route('allattend')->with('error', 'can not marked attendance. You already marked attendance of this student '. $student->name);
            }
            
        }
        
        // show all attendance of student
        public function allattends(Request $request){
            // show admin profile image
            $profile = Profile::where('user_id',Auth::user()->id)->get();

            // fetach all attendance
            $allattendance = Attendance::with('user')->orderBy('created_at','desc');
            if(!empty($request->attend)){
                $allattendance = Attendance::with('user')->where('user_id',$request->attend);
            }
            $allattendance = $allattendance->paginate(6);
            return view('admindashboard.attendance.allattendance', ['profile' => $profile, 'allattendance'=>$allattendance]);

        }

        // show edit form
        public function editattendance($id){
              // show admin profile image
              $profile = Profile::where('user_id',Auth::user()->id)->get();

              $attendance = Attendance::find($id);
              return view('admindashboard.attendance.editattendance',['profile' => $profile, 'attendance' => $attendance]);

        }
        
    //update students attendance
    public function updateattendance(Request $request, $id){

        $update = Attendance::where('id',$id)->update(['attendance' => $request->attendance]);
        if($update){
            return redirect()->route('allattend')->with('sucess','student attendance updated successfully');
        }
    }
    
    // student's attendance delete
    public function deleteattendance($id){
        $delete =Attendance::find($id);
        $delets =$delete->delete();

        if($delets){
            return redirect()->route('allattend')->with('error','student attendance deleted successfully');
        }
    }
    
}
