<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\ads;
use App\category;
use App\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Hash;


class ServicecenterController extends Controller{

	public function showServiceCenters(){

		return view('admin.add-service-center');

	}

	public function addServiceCenter( Request $request ){

		$validator = Validator::make($request->all(),[
			'name' 	=> 'required',
			'email' 	=> 'required|unique:users|email',
			'password' => 'required',
			
		]);

		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{

			$salesman 				= 	new User;
			$salesman->name 		= 	Input::get('name');
			$salesman->email 		= 	Input::get('email');
			$salesman->password 	= 	Hash::make( Input::get('password') );
			$salesman->phone		=	Input::get('phone');
			$salesman->active 		= 	('1');
			$salesman->admin_type 	= 	('4');
			$salesman->new_register = 	('0');
			$salesman->save();

			return redirect()->back()->with(['success' => 'New Service Center Added']);

		}

	}

	public function getServiceIndex(){

		return view ('servicecenter.index');

	}

	public function getAllServiceCenters(){

		$showServiceCenters	=	User::where( 'admin_type', '4' )->get();

		return view( 'admin.servicecenters' , ['servicecenter' => $showServiceCenters]);
	}

	public function getNewAdByCenter(){
		$category	=	subcategory::orderBy('id', 'desc')->get();
		return view ('servicecenter.post-new-ad', [ 'category'	=>  $category ]);
	}

	public function insertPostByCenter( Request $request ){

		$validator = Validator::make($request->all(),[
			'title' 	=> 	'required',
			'details' 	=> 	'required',
			'phone'		=>	'required',
			'category'	=>	'required'
			
		]);

		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{

			$user = Auth::User();

			$salesman 				= 	new Ads;
			$salesman->title 		= 	Input::get('title');
			$salesman->price 		= 	Input::get('price');
			$salesman->details 		= 	Input::get('details');
			$salesman->phone		=	Input::get('phone');
			$salesman->subcat_id	=	Input::get('category');
			$salesman->activation	= 	('0');
			$salesman->address 		=	NULL;
			$salesman->user_id	 	= 	$user->id;
			$salesman->fresher		= 	('0');
			$salesman->save();

			return redirect()->back()->with(['success' => 'New Ad Added']);

		}


	}

	public function getCenterAds(){

		$user = Auth::User();

		$ads 	=	Ads::where('user_id', $user->id)->get();

		return view( 'servicecenter.centersads' , ['ads' => $ads] );

	}
}
