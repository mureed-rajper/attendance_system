<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
use App\Models\Profile;

class ProfileController extends Controller
{
    //show student profile
    public function profile(){
        $id = Auth::user()->id; 
        $profile = Profile::where('user_id',$id)->limit(1)->get();
        // foreach($profile as $profiles)
        // return $profiles->img;
         return view("userprofile.profile", ['profile' => $profile]);
    }

   //show form's  profile
   public function getprofile(){
       $profile = Profile::where('user_id','=',Auth::user()->id)->get();
       return view("userprofile.setprofile", ['profile' => $profile]);
   }
   
   // set profile data
   public function setprofile(Request $request){

       // validation
       $request->validate([
           'name' => 'required|min:4',
           'age' => 'required|numeric|between:18,65',
           'class' => 'required',
           'birthday' => 'required',
           'city' => 'required',
       ]);
        

        $id = Auth::user()->id;
         //image 
         if($request->hasFile("img")){

            $imgs = $request->img;
            $imgext = time() . "." . $imgs->getClientOriginalExtension();
            $imgs->move(public_path("storage/profile/"),$imgext);

            $profile = Profile::create([
              'name' => $request->name,
              'age' => $request->age,
              'class' => $request->class,
              'date_of_brith' => $request->birthday,
              'city' => $request->city,
              'img' => $imgext,
              'user_id' => $id,
            ]);

          if($profile){
            return redirect()->route('profile')->with('sucess','your profile set successfully!');
          }
         }
         else{
            $profile = Profile::create([
                'name' => $request->name,
                'age' => $request->age,
                'class' => $request->class,
                'date_of_brith' => $request->birthday,
                'city' => $request->city,
                'img' => 'noimg',
                'user_id' => $id,
            ]);

            if($profile){
                return redirect()->route('profile')->with('sucess','your profile set successfully!');
              }

         }
   }
}
