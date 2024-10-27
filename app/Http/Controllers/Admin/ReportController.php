<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Report;
use App\Models\Attendance;

class ReportController extends Controller
{
    //show report form for  absent students
    public function reports(){

        // show admin profile image
        $profile= Profile::where('user_id',Auth::user()->id)->get();
        return view('admindashboard.report.makereport', ['profile' => $profile]);    
    }
    
    // get report and save into database
    public function getreport(Request $request){
        // validation
        $request->validate([
            'title' => 'required|min:10',
            'abstu' => 'required',
            'sdate' => 'required',
            'edate' => 'required',
        ]);

        $report = Report::create([
            'title' =>$request->title,
            'students' =>$request->abstu,
            'startdate' =>$request->sdate,
            'endate' =>$request->edate,
        ]);

        
          if($report){
              if($request->abstu == 'absent'){
              return redirect()->route('allreports')->with('sucess', 'this report is created successfully for absent students');
          }
          else{
                  return redirect()->route('allreports')->with('sucess', 'this report is created successfully for all students');
  
              }
          }
    }

    // show all reports 
     public function allreports(Request $request){
        // show admin profile image
        $profile= Profile::where('user_id',Auth::user()->id)->get();

        $reports = Report::orderBy('created_at','desc');
        if(!empty($request->repots)){
            $reports = Report::where('students','like','%'. $request->repots.'%');
        }
        $reports =$reports->paginate(8);
        return view('admindashboard.report.allreport', ['reports' => $reports, 'profile' => $profile]);

     }

    //  edit report's form
    public function editreport($id){
         // show admin profile image
         $profile= Profile::where('user_id',Auth::user()->id)->get();
         
         $editreport = Report::find($id);
         return view('admindashboard.report.editreport', ['profile' => $profile, 'editreport' =>$editreport]);
    }

     // the specific report update 
    public function updatereport(Request $request,$id){
        // validation
        $request->validate([
            'title' => 'required|min:10',
            'abstu' => 'required',
            'sdate' => 'required',
            'edate' => 'required',
        ]);

        $updates = Report::where('id',$id)->update([
            'title' => $request->title,
            'students' => $request->abstu,
            'startdate' => $request->sdate,
            'endate' => $request->edate,
        ]);

        if($updates){
            return redirect()->route('allreports')->with('sucess', 'this report is updated successfully');
        }
    }

    // the specific report delete
    public function deletereport($id){
       
       $delete = Report::find($id);
       $delets = $delete->delete();
       if($delets){
        return redirect()->route('allreports')->with('error', 'this report is deleted successfully');
       }
    }
   
}
