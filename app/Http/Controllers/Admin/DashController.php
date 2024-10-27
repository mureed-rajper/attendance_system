<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Leave;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    //show admin dashboard
    public function admindash(){
        // show profile image
        $profile = Profile::where("user_id",'=', Auth::user()->id)->get();

        // show total students,leavels,reports
        $students = User::where('role','student')->count();
        $leave = Leave::count();
        $reports = Report::count();
        return view("admindashboard.admindash", ['profile' => $profile, 'students'=>$students, 'leave'=>$leave,'reports'=>$reports]);
    }

    // show admin profile
    public function adminprofile(){
        $profile = Profile::where("user_id",'=', Auth::user()->id)->get();
        return view('admindashboard.profile.profile', ['profile' => $profile]);
    }

    // show edit form for admin profile
    public function adminaddprofile(){
        // show profile image
        $profile = Profile::where("user_id",'=', Auth::user()->id)->get();
        return view('admindashboard.profile.setprofile', ['profile' => $profile]);
    }

    // get prfile data
    public function admingetprofile(Request $request){

        // validation
        $request->validate([
            'name' => 'required|min:4',
            'age' => 'required|numeric|between:18,65',
            'class' => 'required',
            'birthday' => 'required',
            'city' => 'required|min:4',
        ]);

        if($request->hasFile('img'))
        {
            $imgs = $request->img;
            $imgext = time() . "." . $imgs->getClientOriginalExtension();
            $imgs->move(public_path('storage/adminprofile/'),$imgext);

            $data = Profile::create([
                'name' => $request->name,
                'age' => $request->age,
                'class' => $request->class,
                'date_of_brith' => $request->birthday,
                'city' => $request->city,
                'img' => $imgext,
                'user_id' => Auth::user()->id,
            ]);
            if($data){
               return redirect()->route('adminprofile')->with('sucess','your profile upddated successfully!');
            }
        }
        else{
            $data = Profile::create([
                'name' => $request->name,
                'age' => $request->age,
                'class' => $request->class,
                'date_of_brith' => $request->birthday,
                'city' => $request->city,
                'user_id' => Auth::user()->id,
            ]);
            if($data){
               return redirect()->route('adminprofile')->with('sucess','your profile without profile image upddated successfully!');
            }
        }


    }

    // show all students
     public function allstudents(Request $request){
        // show profile image
        $profile = Profile::where("user_id",'=', Auth::user()->id)->get();
        
        $students = Profile::with('user')->where('user_id','!=',1);
        if(!empty($request->student)){
            $students = Profile::where('name','like','%'.$request->student.'%');
        }
        $students = $students->paginate(8);
        return view('admindashboard.allstudent', ['students' => $students, 'profile' => $profile]);
     }
}
