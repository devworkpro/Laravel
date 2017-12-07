<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\postmodel;
use App\User;

use App\Http\Requests\postrequest;
use DB;
use Auth;

class postcontroller extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	public function AddPost()
	{
		//echo "DSFds";die();
		return view('post/AddPost');
	}

	public function SavePost(postrequest $request)
	{
		//die("hello");
		$data = $request->all();
	    //echo "<pre>";print_r($data); die();
		$user_id = Auth::user()->id;
		$post = new postmodel;
		$post->user_id = $user_id;
		$post->title = $data['Title'];
		$post->text = $data['Text'];
		$post->save();
		//$request->session()->flash('status', 'post was successful added!');
		return redirect('post');
		//return view('post/AddPost');
	}

	public function post()
	{
		
		$user_id = Auth::user()->id;
		$Post = DB::table('profile')->where('User_id',$user_id)->first();
		
		$allpost = DB::table('users')
		->join('posts', 'posts.User_id', '=', 'users.id')
		->get();


		$Posts = DB::table('posts')->get();
		foreach ($Posts as $key => $newpost) {
			$post_id = $newpost->id;
			$Post_User_id = $newpost->User_id;
			$Comments = DB::table('comments')->where('Post_id',$post_id)->get();
			$user = DB::table('users')->where('id',$Post_User_id)->first();
			foreach ($Comments as $keys => $comment) {
				$user_id = $comment->user_id;
				$User = DB::table('users')->where('id',$user_id)->first();
				$Comments[$keys]->User = $User;				
			}
			$Posts[$key]->Comments = $Comments;
			$Posts[$key]->User = $user;
		}
		//echo "<pre>";print_r($Posts);die();
		
		return view('post/Post',compact('Post','allpost','Posts'));
	}


	
}
