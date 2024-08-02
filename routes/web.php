<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\userAuthentication;
use Illuminate\Support\Facades\Route;







// View Controller Routes

Route::controller(ViewController::class)->group(function(){
    Route::middleware(userAuthentication::class)->group(function(){
    // Home
    Route::get('/','index')->name('home');
    // Admin
    Route::get('/admin','admin')->name('admin');
    
    // profile
    Route::get('/profile','profile')->name('profile');

    // Contact us
    Route::get('/contact','contact')->name('contact');

    // profileUpdate
    Route::get('/profileupdate','profileupdate')->name('profileupdate');

    // add User //admin
    Route::get('/adduser/admin','adduserAdmin')->name('adduser.admin');

    // view all users //admin
    Route::get('/viewusers/admin','viewusersAdmin')->name('viewusers.admin');
      
    // edit user //admin
    Route::get('/edituser/admin/{id}','edituserAdmin')->name('edituser.admin');
  
    });

    // Coverd With The Guarded Auth

    // Signup
    Route::get('/signup','signup')->name('signup')->middleware(isLogin::class);
    // Signin
    Route::get('/signin','signin')->name('signin')->middleware(isLogin::class);

    // Coverd With The Guarded Auth
});

// View Controller Routes End


// Post Controller Routes

Route::controller(PostController::class)->group(function(){
    
    // add post  //user
    Route::get('/addpost','addpost')->name('add.post');

    
    // edit post  //user
    Route::get('/edit/post/{id}','editpost')->name('edit.post');

    // delete post  //user
    Route::get('/delete/post/{id}','deletepost')->name('delete.post');

    // delete post  //Admin
    Route::get('/delete/post/admin/{id}','deletepostAdmin')->name('deleteAdmin.post');

    // view all posts //admin
    Route::get('/viewposts/admin','viewpostsAdmin')->name('viewposts.admin');

    // view all posts //admin
    Route::get('/editpost/admin/{id}','editpostAdmin')->name('editpost.admin');
    

    // add post success //user
    Route::post('/addpostsuccess','addpostsuccess')->name('add.postSuccess');

    // edit post success //user
    Route::post('/edit/post/success/{id}','editpostSuccess')->name('edit.postSuccess');

    // Edit Post //Admin
    Route::post('/edit/post/success/admin/{id}','editpostSuccessAdmin')->name('edit.postSuccessAdmin');
    
});

// Post Controller Routes Ends


// QueryController Routes

Route::controller(QueryController::class)->group(function(){

    // AddUser
    Route::post('/adduser','addUser')->name('add.User');

    // GetUsers
    Route::post('/getuser','getUser')->name('get.User');

    // Contact Form 
    Route::post('/contact/success','contactSuccess')->name('contact.success');
    
    // Delete Profile Image
    Route::get('/profile/image/delete','profileimageDelete')->name('profileimage.delete');

    // Profile Update
    Route::post('/updateprofile','updateprofile')->name('update.profile');

     // AddUser
    Route::post('/adduser/admin','addUserAdmin')->name('add.User.Admin');

    // Edit User
    Route::post('/editusersuccess/admin\{id}','editusersuccessAdmin')->name('editusersuccess.admin');


    
    // Delete User
    Route::get('/deleteuser/{id}','deleteuser')->name('delete.user');

    // logout
    Route::get('/logout','logout')->name('logout');

});

// QueryController Routes End

