<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;
use App\Models\Comment;



class ExampleController extends Controller
{
    public function post()
    {
    	$posts = Post::all();
    	return response()->json(['posts' => $posts]);
    }

    public function getLastIndexOfPost($posts)
    {
    	$sum = 0;
    	foreach ($posts as $post) {
    		$sum++;
    		# code...
    	}
    	return $sum;
    }

    public function getLastIndexOfUser($users)
    {
    	$counter = 0;
    	foreach ($users as $user) {
    		$counter++;
    		# code...
    	}
    	return $counter;
    }


    public function countUser()
    {
    	$users = User::all();
    	return $this->getLastIndexOfUser($users);
    }

    public function countPost()
    {
    	$posts = POst::all();
    	return $this->getLastIndexOfPost($posts);
    }

    public function comments()
    {
    	$comments = Comment::all();
    	return response()->json(['comments' => $comments]);
    }

    public function storePost(Request $request)
    {
    	$new_post = new Post([
            'title' => $request->title,
            'content' => $request->content,
            'reference' => str_random(7) . time() . uniqid(),
            'user_id' => random_int(1, $this->countUser())
            ]);
    	if ($new_post->save()) {
    		return response()->json($new_post);
    	}else{
    		return response()->json("Error saving into database");
    	}
    }

    public function saveComment(Request $request)
    {

    	$new_comment = new Comment([
            'content' => $request->content,
            'user_id' => random_int(1, $this->countUser()),
            'post_id' => random_int(1, $this->countPost()),
            ]);
    	if ($new_comment->save()) {
    		return response()->json($new_comment);
    	}else{
    		return response()->json("Error saving comment into database");
    	}
    }
    public function editPost(Request $request)
    {
    	$postFound = Post::where('id', '=', $request->input('post_id'))->first();

    	if ($postFound != null) {
    		$postFound->title = $request->input('title');
    		$postFound->content = $request->input('content');
    		$postFound->save();
    		return response()->json($postFound);
    	}else{
	    	return response()->json("No post that has the id ".$request->input('post_id'));
    	}
    }
}

