<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;




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
        if (auth()->user()->cannot('delete', $post)) {
            return " You can NOT delete this post according to Policy";
        } else {
            $post->delete();
            return redirect('/profile/' . auth()->user()->username)->with('success', 'Post is Deleted Successfully.');
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

    public function storeNewPost(Request $request)
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
        return redirect("/post/{$newPost->id}")->with('success', 'New Post Uploaded Successfully.');
    }
}
