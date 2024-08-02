<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use App\Mail\userMail;
use App\Mail\contact_formMail;
use App\Mail\adminCreated_users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                return redirect()->route('admin')->with('success','Welcome Admin ' . Auth::user()->name );
            }else{
                $email = $auth_user->email;
                $subject = "New User Registration";
                $message = "Hey $name";
                Mail::to($email)->send(new userMail($subject, $message));
                return redirect()->route('home')->with('success','Welcome ' . Auth::user()->name );
            }
        }else{
            return redirect()->back()->with('error', 'User not Created');
        }
    }

    public function getUser(Request $req){
        $request = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
            Auth::attempt($request);
            $auth_user = Auth::user();

            if($auth_user){
            if($auth_user->role === 'Admin'){
                return redirect()->route('admin')->with('success','Welcome Admin ' . Auth::user()->name );
            }else{
                return redirect()->route('home')->with('success','Welcome ' . Auth::user()->name );
            }
        }else{
            return redirect()->back()->with('error', 'User not Found');
        }
        }   
        

        // user Profile Delete
        public function profileimageDelete(){
            $id = Auth::user()->id;
            $user = User::find($id);
            $path = public_path('storage/'. $user->profile);

                if(file_exists($path)){
                    @unlink($path);
                    $user->update([
                        'profile' => null,
                    ]);
                    return redirect()->route('profile')->with('success','Profile Image Deleted Succesfully');

                }else{
                    $user->update([
                        'profile' => null,
                    ]);
                    return redirect()->route('profile')->with('success','Image Deleted From DataBase');
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
        
        // contact Form Request

        public function contactSuccess(Request $req){
            $req->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'image' => 'mimes:jpg,png,jpeg,pdf,doc,docx,xsl,xslx',
            ]);
            // return $image;
            if($req->hasFile('image')){
                $image = time() . '.'. $req->image->extension();
                $req->file('image')->move(public_path('contact-form'),$image);
            }else{
                $image = null;
            }

            $email = 'abdullahsheikhmuhammad21@gmail.com';
            Mail::to($email)->send(new contact_formMail($image,$req->all()));
            return redirect()->route('contact')->with('success','Your Request Has Been Successfully Sent'); 
        }

        // contact Form Request End 

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
                $email = $user->email;
                $ccEmail = "abdullahsheikhmuhammad21@gmail.com";
                $name = $user->name;
                $subject = "New User Registration";
                $message = "Hey $name";
                Mail::to($email)->cc($ccEmail)->send(new adminCreated_users($subject, $message));
                return redirect()->route('admin')->with('success','User added successfully');
            }else{
                return redirect()->back()->with('error','User Not Created');
            }
        }

     //  { // Admin User Views in VIew Controller} //

    //  User Edit Admin
    public function editusersuccessAdmin(Request $req ,int $id){
            $user = User::find($id);
            $updated = $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
        ]);
        if($updated){
            return redirect()->route('viewusers.admin')->with('success','User has been updated');
        }else{
            return redirect()->route('viewusers.admin')->with('error','User Not updated');
        }
    }
    //  User Edit Admin
         

    //  User Delete Admin
    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        if($user){
            return redirect()->route('viewusers.admin')->with('success','User deleted successfully');
        }
    }
    //  User Delete Admin End
        public function logout(){
            Auth::logout();
            return redirect()->route('signin');
        }
    }

