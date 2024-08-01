<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ViewController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $posts = Post::where('user_id', '=', $id)->get();
        // return $posts;
        return view('Users/welcome',compact('posts'));
    }
    public function admin(){
        if(Gate::allows('isAdmin')){
            return view('Admin/AdminDashboard');
        }else{
            return redirect()->route('home');
        }
    }

    public function signup(){
        return view('Users/signup');
    }

    public function signin(){
        return view('Users/signin');
    }

    public function profile(){
        return view('Users/user_profile');
    }

    public function profileupdate(){
        return view('Users/update_profile');
    }

    public function adduserAdmin(){
        if( Gate::authorize('isAdmin')){
            return view('Admin/adduser');
        }else{
            return redirect()->route('home');
        }
       
    }

    // Admin User View 
        
    public function viewusersAdmin(){
        if(Gate::authorize('isAdmin')){
            $users = User::all(); 
            return view('Admin/viewusers',compact('users'));
        }else{
            return redirect()->route('home');
        }
       
    }

// Admin User View End

// Admin User Edit

public function edituserAdmin($id){
   if( Gate::authorize('isAdmin')){
    $user = User::find($id);
    return view('Admin/edituser',compact('user'));
   }else{
    return redirect()->route('home');
}
 
}
// Admin User Edit End


 

}
