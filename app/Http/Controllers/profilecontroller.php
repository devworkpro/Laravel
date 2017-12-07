<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\profilemodel;
use App\User;

use App\Http\Requests\profilerequest;
use DB;
use Auth;

class profilecontroller extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	public function EditProfile()
	{
		$user_id = Auth::user()->id;
		$profile = "";
		if($user_id!=""){
			$profile = DB::table('profile')->where('User_id',$user_id)->first();
			return view('profile/EditProfile',compact('profile'));
		}
		else{
			return view('profile/EditProfile',compact('profile'));
		}
		
	}

	public function SaveProfile(profilerequest $request)
	{
		//die("hello");
		$data = $request->all();
		//echo "<pre>";print_r($data); die();
		$user_id = Auth::user()->id;
		$profile = new profilemodel;
		$profile->user_id = $user_id;
		$profile->first_name = $data['First_Name'];
		$profile->last_name = $data['Last_Name'];
		$profile->phone_number = $data['Phone_Number'];
		$profile->mobile_number = $data['Mobile_Number'];
		$profile->address = $data['Address'];
		$profile->state = $data['State'];
		$profile->city = $data['City'];
		$profile->zip = $data['Zip'];
		//$profile->profile_pic = $data['Profile_Pic'];

		$file = $data['Profile_Pic'];
		$name = $file->getClientOriginalName();
		$img_name =  time().$name;
		$profile['Profile_Pic']  = $img_name;
		$request->Profile_Pic->move(public_path('upload'), $img_name);
		$profile->save();
		return redirect('post');
		//return view('profile/Editprofile');
	}

	public function edit(Request $request,$id)
	{    
		$user_id = Auth::user()->id;
		//print_r($id);die;
		$data = $request->all();
		//print_r($data);die;
		if($data)
		{
			$destination='upload';
			$image= $request->file('Profile_Pic');
			if(!empty($image)) 
			{
				$filename = $image->getClientOriginalName();
				$image->move($destination, $filename);
			}
			else
			{
				$filename = $data['banner_backup'] ;

			}

			profilemodel::where('id', $user_id)
			->update(array('First_Name' => $data['First_Name'],
				'Last_Name' => $data['Last_Name'],
				'Phone_Number' => $data['Phone_Number'],
				'Mobile_Number' => $data['Mobile_Number'],
				'Address' => $data['Address'],
				'State' => $data['State'],
				'City' => $data['City'],
				'Zip' => $data['Zip'],
				'Profile_Pic' => $filename
			));  
			return redirect('post'); 
		}
		
	}
}
