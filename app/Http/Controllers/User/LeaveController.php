<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
     // show leave page
     public function leave(){
        $image = Profile::where('user_id','=', Auth::user()->id)->get();
        return view('userleaves.addleave', ['image' => $image]);
    } 

     // leave data stored inot database
     public function getleave(Request $request){

        // validation 
        $request->validate([
            'subject' => 'required|min:6',
            'description' => 'required|min:15',
            'sdate' => 'required',
            'edate' => 'required',
        ]);

        $leave = Leave::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'start_date' => $request->sdate,
            'end_date' => $request->edate,
            'user_id' => Auth::user()->id,
        ]);

        if($leave){
            return redirect()->route('viewleave')->with('sucess','your leave added successfully');
        }
     }


    // show al leaves 
    public function leaves(Request $request){

        // for image
        $image = Profile::where('user_id','=', Auth::user()->id)->get();
        $leaves = Leave::where('user_id','=', Auth::user()->id);
        $leaves =$leaves->paginate(8);
        return view('userleaves.leave', ['leaves' => $leaves], ['image' => $image]);
    }

    //show editform of leave
    // public function editform($id){
    //     // show profile image
    //     $image = Profile::where('user_id','=', Auth::user()->id)->get();

    //      $edit = Leave::find($id);

    //      return view('editleave', ['edit' => $edit, 'image' => $image]);
         
    // }

    // delete leave
    public function deleteleave($id){
         $delete = Leave::find($id);
         $delets = $delete->delete();
         
         if($delets){
            return redirect()->route('viewleave')->with('error','your leave deleted successfully!');
         }
    }
}
