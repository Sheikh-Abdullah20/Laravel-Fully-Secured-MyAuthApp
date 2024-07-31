<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use App\Mail\userMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class QueryController extends Controller
{
    public function addUser(Request $req){
        $request = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        $user = User::create($request);
        if($user){
            Auth::login($user);
            $auth_user = Auth::user();
            $name = $auth_user->name;
            if($auth_user->role === 'Admin'){
                $email = $auth_user->email;
                $subject = "New User Registration";
                $message = "Hey $name";
                Mail::to($email)->send(new adminMail($subject, $message));
                return redirect()->route('admin')->with('success','Welcome Admin' . Auth::user()->name );
            }else{
                $email = $auth_user->email;
                $subject = "New User Registration";
                $message = "Hey $name";
                Mail::to($email)->send(new userMail($subject, $message));
                return redirect()->route('home')->with('success','Welcome' . Auth::user()->name );
            }
        }
    }

    public function getUser(Request $req){
        $request = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            Auth::attempt($request);
            
            $auth_user = Auth::user();

            if($auth_user->role === 'Admin'){
                return redirect()->route('admin')->with('success','Welcome Admin' . Auth::user()->name );
            }else{
                return redirect()->route('home')->with('success','Welcome' . Auth::user()->name );
            }
            
        }


        // User Profile Update
        public function updateprofile(Request $req){
            $req->validate([
                'profile' => 'mimes:jpg,jpeg,png',
            ]);
            $id = Auth::user()->id;
            $user = User::where('id',$id)->first();
            $path = public_path('storage/'. $user->profile);
                if($req->profile){
                    @unlink($path);
                    $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'profile' => $req->file('profile')->store('profile','public'),
                    
                ]);
                return redirect()->route('profile')->with('success','Profile Updated Succesfully');
            }else{
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                ]);
                return redirect()->route('profile')->with('success','Profile Updated Succesfully');
            }
            return redirect()->route('home');
        }
        

        // Admin User Add 
        public function addUserAdmin(Request $req){
           $request =  $req->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'role' => 'required',

            ]);
            $user = User::create($request);

            if($user){
                return redirect()->route('admin')->with('success','User added successfully');
            }else{
                return redirect()->back()->with('error','User Not Created');
            }
        }

     //  { // Admin User Views in VIew Controller} //
         
        public function logout(){
            Auth::logout();
            return redirect()->route('signin');
        }
    }

