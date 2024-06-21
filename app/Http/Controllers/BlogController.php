<?php

namespace App\Http\Controllers;

use App\Jobs\SendDeletationNoti;
use App\Models\Post;
use App\Models\User;
use App\Jobs\SendNewEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\SendDeleteEmail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;




class BlogController extends Controller
{

    //Post search
    public function search($term)
    {
    $post = POST::search($term)->get();
    $post->load('user:id,username,avatar');
    return $post;    
}


    //Storing the user can Edits in blog post using Policy middleware
    public function updateBlogpost(Post $post, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect("/post/" . $post->id)->with('success', 'Post is Updated Successfully.');
    }


    //Auth user can edit blog post using Policy middleware
    public function editBlogpost(Post $post)
    {
        return view('edit-blog-post', ['post' => $post]);
    }


    //Auth user can delete the post
    public function delete(Post $post)
    {
        dispatch(new SendDeleteEmail(
            [
                'toSend'=> auth()->user()->email ,
            'username' =>auth()->user()->username, 
            'title' =>$post->title
            ]));

        if (auth()->user()->cannot('delete', $post)) {
            return " You can NOT delete this post according to Policy";
        } else {
            $post->delete();
            return redirect('/profile/' . auth()->user()->username)->with('success', 'Post is Deleted Successfully.');
        }
    }

        //Auth user can delete the post via API
        public function deletePostApi(Post $post)
        {
            dispatch(new SendDeleteEmail(
                [
                    'toSend'=> auth()->user()->email ,
                'username' =>auth()->user()->username, 
                'title' =>$post->title
                ]));
    
            if (auth()->user()->cannot('delete', $post)) {
                return " You can NOT delete this post according to Policy";
            } else {
                return 'The'. $post->title.' has beeen deleted';
                $post->delete();
            }
        }

    //Show single post
    public function viewSinglePost(POST $post)
    {
        // Markdown support for Blog body
        $post['body'] = strip_tags(Str::markdown($post->body), '<h1><p><li><ul><h2>');
        return view('post', ['post' => $post]);
    }


    public function showNewForm()
    {
        return view('create-post');
    }

    public function storeNewPost(Request $request, User $user)
    {

        // get value and validate, also strip html tags
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();


        $newPost = Post::create($incomingFields);

        dispatch(new SendNewEmail(['toSend'=> auth()->user()->email ,'username' =>auth()->user()->username, 'title' =>$newPost->title]));

        return redirect("/post/{$newPost->id}")->with('success', 'New Post Uploaded Successfully.');
    }

    //Post Through API
    
    public function storeNewBlogApi(Request $request, User $user)
    {

        // get value and validate, also strip html tags
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();


        $newPost = Post::create($incomingFields);
        $uploaded = $newPost;

        dispatch(new SendNewEmail(['toSend'=> auth()->user()->email ,'username' =>auth()->user()->username, 'title' =>$newPost->title]));

        return "Congragulations! Your Post have been Uploaded, here is post id = {$uploaded->id}";
    }
}
