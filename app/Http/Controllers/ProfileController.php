<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // As we are giving alot of variables data to blade template, to avoid duplication we can create a Private function which will just handle all the data in array
    private function getSharedData($user){
        $currentlyFollowing = 0;
        if(auth()->check())
        {
        $currentlyFollowing = Follow::where('user_id', auth()->user()->id)
                                     ->where('followeduser', $user->id)
                                     ->count();
        }
        View::share('shareData',[
            'following' => $currentlyFollowing ,
            'user' => $user,
            'avatar' => $user->avatar,
            'username' => $user->username,
            'postcount' => $user->posts()->count(),
            'followercount' => $user->followers()->count(),
            'followingcount' => $user->FollowingTheseUsers()->count(),
        ]);
    }

    public function showprofile(User $user, Post $post) {
        $this->getSharedData($user);
        return view('profile-posts', ['posts' => $user->posts()->latest()->get()]);
    }


    public function profileFollower(User $user){
       $this->getSharedData($user);
       return  view('profile-follower',[ 'followers' => $user->followers()->latest()->get() ]);
    
    }


    public function profileFollowing(User $user){
        $this->getSharedData($user);
        return  view('profile-following', ['following' => $user->FollowingTheseUsers()->latest()->get()] );
    
    }

    // Profile Raw
    public function showProfileRaw(User $user, Post $post) {
        return response()->json([
            'theHtml' => view('profile-posts-only', ['posts' => $user->posts()->latest()->get()])->render(),
            'Pagetitle' => "{$user->username} Profile"
        ]);
    }

    public function profileFollowerRaw(User $user) {
        return response()->json([
            'theHtml' => view('profile-follower-only', [
                'followers' => $user->followers()->latest()->get()
            ])->render(),
            'Pagetitle' => "{$user->username}'s Follower List"
        ]);
    }

    public function profileFollowingRaw(User $user) {
        return response()->json([
            'theHtml' => view('profile-following-only', [
                'following' => $user->FollowingTheseUsers()->latest()->get()
            ])->render(),
            'Pagetitle' => "{$user->username}'s Following List"
        ]);
    }

    public function showAvatarForm(){
        return view('upload-avatar');
    }

    public function storeAvatar(Request $request, User $user){
        // validate the image
        $request->validate([
            'avatar' => 'required |image | max:3000 '
        ]);
        $user = auth()->user();
        $filename = $user->id . '-'. uniqid() . '.jpg';

        // use 3rd party library to resize the image and then save it in Storage
        $ImgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('/public/avatars/'. $filename , $ImgData);
        
        $old = $user->avatar;
        // save filename in avatar attribute
        $user->avatar = $filename;
        $user->save();

        // Now delete any avatar which is not fallback
        if($old != "fallback-img.jpg")
        {
            Storage::delete(str_replace('/storage','public/',$old));
        }
 
        return redirect('/profile/'.auth()->user()->username)->with('success','Your Profile Image is Updated.');
    }
    


    

}
