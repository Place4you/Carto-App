<?php
namespace App\Http\Controllers;

use App\Events\OurExampleEvent;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class UserController extends Controller
{

    // Show Correct Homepage Function
    public function correctHomepage(){
        if(auth()->check()){
            $posts = auth()->user()->feedposts()->with('user')->latest()->paginate(6);

                if($posts->isEmpty()) {
                    return view("home-logged-in-no-results");
                } else {
                    return view("home-logged-in-results", compact('posts'));
                }

        }
        else{
            return view('homepage');

        }
    }

    // User Login Function

    public function  login(Request $request){
        $incomingfields = $request->validate(
            [
            'loginusername' => ['required'],
            'loginpassword' => ['required']
            ]);

        if (auth()->attempt([
            'username' => $incomingfields['loginusername'],
            'password' => $incomingfields['loginpassword'],
             ])) 
           {
            // Genrating new session
            $request->session()->regenerate();
            event(new OurExampleEvent(['username'=> auth()->user()->username , 'action' => 'Login' ]));
            return redirect('/')->with('success','You are Logged In Successfully.');
            }
            else{
            return redirect('/')->with('failure','Invalid info, Please Try Again');
            }


    }


    // User Signup Function

    public function  register(Request $request){

        $incomingfields = $request->validate([
                'username' => ["Required", "min:4", "max:20", Rule::unique('users','username')],
                'email' => ["Required", 'email', Rule::unique('users','email') ],
                'password' => ["Required", 'confirmed', ],
            ]);
        // Hashing the password before saving
        $incomingfields['password'] = bcrypt($incomingfields['password']);
        // We will save coming value in variable and call login method of auth, 
        // so user will automaticaly login after creating an account
        $user = User::create($incomingfields);
        auth()->login($user);
        return redirect('/')->with('success', 'Thanks for creating a new account ' . auth()->user()->username);
    }

    // User Logout Function
    public function  logout(){
        event(new OurExampleEvent(['username'=> auth()->user()->username, 'action'=> 'Logout']));
        auth()->logout();
        return redirect('/')->with('success','You are Logged Out Successfully.');
    }

        
}
