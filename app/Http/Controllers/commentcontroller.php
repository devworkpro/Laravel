<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\commentmodel;
use App\postmodel;
use App\User;

use App\Http\Requests\commentrequest;
use DB;
use Auth;

class commentcontroller extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function SaveComment(commentrequest $request,$id)
	{
		//echo "DSFds";die();
		$data = $request->all();
		//print_r($data);die;
		$user_id = Auth::user()->id;
		$comment = new commentmodel;
		$comment->user_id = $user_id;
		$comment->post_id = $id;
		$comment->Comment = $data['Comment'];
		$comment->save();

		return redirect('post');
	}


	

}
