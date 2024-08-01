<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function addpost(){
        return view('Users/addpost');
    }

    public function addpostsuccess(Request $req){
        $user_id = Auth::user()->id;
        $request = $req->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'mimes:jpg,jpeg,png|image|max:3000',
        ]);
        if($req->hasFile('image')){
            $post = Post::create([
                'title' => $req->title,
                'description' => $req->description,
                'user_id' => $user_id,
                'image' => $req->file('image')->store('image-post','public') ,

            ]);
            return redirect()->route('home')->with('success',"Post Has Been Added Successfully");

        }else{
            $post = Post::create([
                'title' => $req->title,
                'description' => $req->description,
                'user_id' => $user_id,
            ]);
            return redirect()->route('home')->with('success',"Post Has Been Added Successfully");
        }
    }


    public function editpost($id){
        $post = Post::find($id);
        return view('Users/editpost', compact('post'));
    }

    public function editpostSuccess(Request $req, $id){
        $post = Post::find($id);
        $path = public_path('storage/'.$post->image);

        if($req->hasFile('image')){
            @unlink($path);
        $post->update([
            'title' => $req->title,
            'description' => $req->description,
            'image' => $req->file('image')->store('image-post','public'),
        ]);
        return redirect()->route('home')->with('success','Post Has Been Updated Successfully');
    }else{
        $post->update([
            'title' => $req->title,
            'description' => $req->description,
        ]);
        return redirect()->route('home')->with('success','Post Has Been Updated Successfully');
    }
    }
    public function deletepost($id){
        $post = Post::find($id);
        $deleted = $post->delete();

        if($deleted){
            @unlink(public_path('storage/'.$post->image));
            return redirect()->route('home')->with('success','Post Has Been Deleted');
        }else{
            return redirect()->route('home')->with('error','Post Not Deleted');
        }
        
    }

    // Admin Page s

    public function viewpostsAdmin(){
        Gate::authorize('isAdmin');
        $posts = Post::all();
        return view('Admin/viewposts',compact('posts'));
    }

        // Edit Post Page Admin
    public function editpostAdmin($id){
        Gate::authorize('isAdmin');
        $post = Post::with('user')->find($id);

        return view('Admin/editpost_admin',compact('post'));
    }

    // Edit Post Admin
    public function editpostSuccessAdmin(Request $req, $id){
        Gate::authorize('isAdmin');
        $post = Post::find($id);
        $path = public_path('storage/'.$post->image);
        if($req->hasFile('image')){
            @unlink($path);
            $post->update([
                'title' => $req->title,
                'description' => $req->description,
                'image' => $req->file('image')->store('image-post','public'),
            ]);
            return redirect()->route('viewposts.admin')->with('success','post Updated Successfully');
        }else{
            $post->update([
                'title' => $req->title,
                'description' => $req->description,
            ]);
            return redirect()->route('viewposts.admin')->with('success','post Updated Successfully');
        }
        
    }
    // Delete Post Admin
    public function deletePostAdmin($id){
        Gate::authorize('isAdmin');
        $post = Post::find($id);
        $deleted = $post->delete();
        if($deleted){
            @unlink(public_path('storage/'.$post->image));
            return redirect()->route('viewposts.admin')->with('success','post deleted Successfully');
        } else{
            return redirect()->route('viewposts.admin')->with('error','post not deleted');
        }
        
 
    }
}
