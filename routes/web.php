<?php

use App\Events\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\HOME;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use Symfony\Contracts\Service\Attribute\Required;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User Controller Routes
Route::get('/', [ UserController::class, 'correctHomepage'])->name('login');
Route::post('/register',[UserController::class,"register"]);
Route::post('/login', [UserController::class,"login"])->middleware('guest');
Route::post('/logout', [UserController::class,"logout"])->name('logout');

Route::post('/send-chat-message', function(Request $request)
    {
        $formfields = $request->validate([
            'textvalue' => 'required',
        ]);
        if(!trim(strip_tags($formfields['textvalue'])))
        {
            return response()->noContent();
        };
        
        broadcast(new ChatMessage([
            'username' => auth()->user()->username,
            'avatar' => auth()->user()->avatar,
            'textvalue' => $formfields['textvalue'],
        ]))->toOthers();

        return response()->noContent();
    })->middleware('loggeduser');



// Blog Controller Routes
Route::get('/create-post',[BlogController::class,'showNewForm'])->middleware('loggeduser');
Route::post('/create-post',[BlogController::class,'storeNewPost'])->middleware('loggeduser');
Route::get('/post/{post}',[BlogController::class,'viewSinglePost']);
Route::delete('/post/{post}',[BlogController::class,'delete'])->middleware('can:delete,post');
Route::get('/post/{post}/edit',[BlogController::class,'editBlogpost'])->middleware('can:update,post');
Route::put('/post/{post}/',[BlogController::class,'updateBlogpost'])->middleware('can:update,post');
Route::get('/search/{term}/',[BlogController::class,'search'])->middleware('loggeduser');



// Profile Controller Routes
Route::get('profile/{user:username}', [ProfileController::class,'showprofile'])->middleware('loggeduser');
Route::get('/profile/{user:username}/follower',[ProfileController::class,'profileFollower'])->middleware('loggeduser');
Route::get('/profile/{user:username}/following',[ProfileController::class,'profileFollowing'])->middleware('loggeduser');

Route::middleware('cache.headers:public,max_age=20;etag')->group(function(){
    Route::get('profile/{user:username}/raw', [ProfileController::class,'showprofileRaw'])->middleware('loggeduser');
    Route::get('/profile/{user:username}/follower/raw',[ProfileController::class,'profileFollowerRaw'])->middleware('loggeduser');
    Route::get('/profile/{user:username}/following/raw',[ProfileController::class,'profileFollowingRaw'])->middleware('loggeduser');

});


Route::get('/manage-avatar', [ProfileController::class,'showAvatarForm'])->middleware('loggeduser');
Route::post('/manage-avatar', [ProfileController::class,'storeAvatar'])->middleware('loggeduser');


// Gate for Admin Only
Route::get('/admins-only', function(){ return view('admins-only'); })->middleware('can:adminonly');




// Follow Controller
Route::post('/create-follow/{user:username}',[FollowController::class,'createFollow'])->middleware('loggeduser');
Route::post('/remove-follow/{user:username}',[FollowController::class,'removeFollow'])->middleware('loggeduser');

