<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Report;
use App\Models\Attendance;

class UpgradController extends Controller
{
    //show upgrading
    public function upgrading(){ 
        // show user profile image
        $profile = Profile::with('user')->where('user_id',Auth::user()->id)->get();

        $pcount = Attendance::where('user_id',Auth::user()->id)->where('attendance','present')->count('attendance');
        $dates = Attendance::first();
        return view('userupgrades.upgrad', ['profile' =>$profile, 'pcount' => $pcount, 'dates' =>$dates]);
    }
}
