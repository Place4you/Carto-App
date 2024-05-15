<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class followController extends Controller
{
    public function createFollow(User $user)
    {
    // User can not add itself
    if($user->id == auth()->user()->id){
        return back()->with('failure','You can not Follow  yourself');
    }
        
    // User should not be able to follow already followed people
    $alreadyfollowed = Follow::where('user_id', auth()->user()->id)
                             ->where('followeduser', $user->id)
                             ->count();
    if($alreadyfollowed)
    {
    return back()->with('failure','You already Follow '). ucwords($user->username);
    }


    $new_Follow = new Follow;
    $new_Follow->user_id = auth()->user()->id;
    $new_Follow->followeduser = $user->id;
    $new_Follow->save();
    return back()->with('success','You have Successfully Followed '. ucwords($user->username));
    }


    // Unfollow the user  -> Show unfollow button to auth user only -> 
    public function removeFollow(User $user)
    {
        $followexist = Follow::where('user_id', auth()->user()->id)
                             ->where('followeduser', $user->id)
                             ->delete();
        if($followexist)
        {
            return redirect('/profile/'.$user->username)->with('success',' You successfully unfollowed'). ucwords($user->username);

        }
    }
}
