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
        return view('welcome',compact('posts'));
    }
    public function admin(){
        if(Gate::allows('isAdmin')){
            return view('AdminDashboard');
        }else{
            return redirect()->route('home');
        }
    }

    public function signup(){
        return view('signup');
    }

    public function signin(){
        return view('signin');
    }

    public function profile(){
        return view('user_profile');
    }

    public function profileupdate(){
        return view('update_profile');
    }

    public function adduserAdmin(){
        Gate::authorize('isAdmin');
        return view('adduser');
    }

    // Admin User View 
        
    public function viewusersAdmin(){
        Gate::authorize('isAdmin');
        $users = User::all(); 
        return view('viewusers',compact('users'));
    }

// Admin User View End

// Admin User Edit

public function edituserAdmin($id){
    Gate::authorize('isAdmin');
    $user = User::find($id);
    return view('edituser',compact('user'));
}

// Admin User Edit End

    public function viewpostsAdmin(){
        Gate::authorize('isAdmin');
        return view('viewposts');
    }

 

}
