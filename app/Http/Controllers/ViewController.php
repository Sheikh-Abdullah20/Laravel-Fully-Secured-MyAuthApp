<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ViewController extends Controller
{
    public function index(){
        return view('welcome');
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
    public function users(){
        Gate::authorize('isAdmin');
        return view('users');
    }

    public function profile(){
        return view('user_profile');
    }

    public function profileupdate(){
        return view('update_profile');
    }

    public function adduserAdmin(){
        return view('adduser');
    }

    // Admin User View 
        
    public function viewusersAdmin(){
        $users = User::all(); 
        return view('viewusers',compact('users'));
    }

// Admin User View End

    public function viewpostsAdmin(){
        return view('viewposts');
    }

}
