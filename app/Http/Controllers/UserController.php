<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //show register page
    public function signpage(){
        return view("account.register");
    }

    // sign up method
    public function sign(Request $request){
        // validation
        $request->validate([
            'name' => 'required|min:4',
            'age' => 'required|numeric|between:18,65',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
         ]);

        //  return $request;

           // insert data into database
         $data = User::create([
             'name' => $request->name,
             'age' => $request->age,
             'email' => $request->email,
             'password' => $request->password,
         ]);

         if($data){
            echo "data inserted successfully!";
         }
    }


    //show register page
    public function loginpage(){
        return view("account.login");
    }

    // authenticate 
    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
         ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->role == "admin"){
                return redirect()->route('admindash');
            }
            else{
                
                return redirect()->route('userdash');
            }

        }
        else{
            return redirect()->route('login')->with('error','email and password are incorrect');
        } 
    }

    // logout 
    public function signout(){
        // $id = Auth::user()->id;
        if(Auth::check()){
         $logout = Auth::logout();
         return redirect()->route('login');
        }
        else{
            return redirect()->route('login')->with('error','please first login!');
        }
    }
}
