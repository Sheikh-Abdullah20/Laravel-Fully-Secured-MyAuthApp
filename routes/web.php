<?php

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

      // profileUpdate
      Route::get('/profileupdate','profileupdate')->name('profileupdate');
    });

        // add User //admin
        Route::get('/adduser/admin','adduserAdmin')->name('adduser.admin');

        // view all users //admin
        Route::get('/viewusers/admin','viewusersAdmin')->name('viewusers.admin');

        // edit user //admin
        Route::get('/edituser/admin/{id}','edituserAdmin')->name('edituser.admin');

        // view all posts //admin
        Route::get('/viewposts/admin','viewpostsAdmin')->name('viewposts.admin');

   
       // Signup
       Route::get('/signup','signup')->name('signup')->middleware(isLogin::class);
       // Signin
       Route::get('/signin','signin')->name('signin')->middleware(isLogin::class);
});

// View Controller Routes End

// QueryController Routes

Route::controller(QueryController::class)->group(function(){

    // AddUser
    Route::post('/adduser','addUser')->name('add.User');

    // GetUsers
    Route::post('/getuser','getUser')->name('get.User');

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