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


class AdController extends Controller{
	
	
	public function postAd(){
		
		$category = Category::orderBy('id')->get();
		$subcategories = Subcategory::orderBy('id')->get();
		
		return view ('customer.postad', ['category' => $category, 'subcategories' => $subcategories]);	
	}
	public function postAdById( Request $request, $id ){
		
		$category = Category::orderBy('id')->get();
		$subcategories = Subcategory::where('parent_id', $id)->get();
		return view ( 'customer.postad', ['category' => $category, 'subcategories_id' => $subcategories, 'subcategories' => $subcategories, 'selected_id' => $id]);	
	}
	
	public function newad( Request $request ){
		
		$rules = array(
			'title'	=> 'required',
			//'price'		=> 'required',
			'cat' 	=> 'required',
			'address' => 'required',
			'details' => 'required',
			'featured' 		=> 'mimes:jpeg,png,jpg',
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{
			
			if( Input::hasFile('featured') ){
			
				$file = Input::file('featured');
				
				//$random	= rand(99999999, 99999999);
				
				// Available alpha caracters
				$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				
				// generate a pin based on 2 * 7 digits + a random character
				$pin = mt_rand(1000000, 9999999)
					. mt_rand(1000000, 9999999)
					. $characters[rand(0, strlen($characters) - 1)];
				
				// shuffle the result
				$string = str_shuffle($pin);
				
				
				
				$destinationPath = public_path().'/ads';
				$fileName = Input::file('featured')->getClientOriginalName();
				$extention = Input::file('featured')->getClientOriginalExtension();
				$upload = $file->move($destinationPath, $string.'.'.$extention);
				
				$insert = '/ads/'.$string.'.'.$extention;
				
				
				$user = Auth::User();
				
				$ad = new Ads;
				$ad->title = Input::get('title');
				$ad->price = Input::get('price');
				$ad->image = $insert;
				$ad->lat = Input::get('lat');
				$ad->lng = Input::get('lng');
				$ad->address = Input::get('address');
				$ad->details = Input::get('details');
				$ad->subcat_id = Input::get('cat');
				$ad->user_id = $user->id;
				$ad->activation = 0;
				$ad->fresher = 1;
				$ad->save();
				
				return redirect()
						->back()
						->with(['success' => ' Your ad is under process. It will be published within 24 hours. ']);
				
			}else{
					
				$user = Auth::User();
				
				$ad = new Ads;
				$ad->title = Input::get('title');
				$ad->price = Input::get('price');
				//$ad->image = $insert;
				$ad->lat = Input::get('lat');
				$ad->lng = Input::get('lng');
				$ad->address = Input::get('address');
				$ad->details = Input::get('details');
				$ad->subcat_id = Input::get('cat');
				$ad->user_id = $user->id;
				$ad->activation = 0;
				$ad->fresher = 1;
				$ad->save();
				
				return redirect()
						->back()
						->with(['success' => ' Your ad is under process. It will be published within 24 hours. ']);
			}
		}
			
	}
	
	// Edit MyAd
	public function editMyAd( Request $request, $id ){
		$subcategories = Subcategory::orderBy('id')->get();
		$get_ad = Ads::find($id);
		return view('customer.postAd', ['ad' => $get_ad, 'subcategories' => $subcategories]);
			
	}
	
	public function updateMyAd( Request $request, $id ){
		
				
				$ad =  Ads::find( $id);
				$ad->title = Input::get('title');
				$ad->price = Input::get('price');
				//$ad->image = $insert;
				//$ad->lat = Input::get('lat');
				//$ad->lng = Input::get('lng');
				$ad->address = Input::get('address');
				$ad->details = Input::get('details');
				//$ad->subcat_id = Input::get('cat');
				//$ad->user_id = $user->id;
				//$ad->activation = 0;
				$ad->save();
				
				return redirect()
						->back()
						->with(['success' => ' Your ad is updated ']);
		
			
	}
	
	
	// Get Ads Admin Side
	public function getAds(){
		
		$ads	=	Ads::orderBy('id', 'desc')->get();
		
		return view('admin.ads', ['ads' => $ads]);
	}
	
	// Show Page for new Ad in Admin Side
	public function postNewAdByAdmin(){
		$subcategories = Subcategory::orderBy('id')->get();
		return view('admin.post-new-ad', ['subcategories' => $subcategories]);	
	}
	
	// Insert data of new post Admin Side
	public function postedNewAdByAdmin( Request $request ){
		
		$rules = array(
			'cat' 	=> 'required',
			'details' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{
			
			if( Input::hasFile('featured') ){
			
				$file = Input::file('featured');
				
				//$random	= rand(99999999, 99999999);
				
				// Available alpha caracters
				$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				
				// generate a pin based on 2 * 7 digits + a random character
				$pin = mt_rand(1000000, 9999999)
					. mt_rand(1000000, 9999999)
					. $characters[rand(0, strlen($characters) - 1)];
				
				// shuffle the result
				$string = str_shuffle($pin);
				
				
				
				$destinationPath = public_path().'/ads';
				$fileName = Input::file('featured')->getClientOriginalName();
				$extention = Input::file('featured')->getClientOriginalExtension();
				$upload = $file->move($destinationPath, $string.'.'.$extention);
				
				$insert = '/ads/'.$string.'.'.$extention;
				
				
				$user = Auth::User();
				
				$ad = new Ads;
				$ad->title = Input::get('title');
				$ad->price = Input::get('price');
				$ad->image = $insert;
				$ad->email = Input::get('email');
				$ad->phone = Input::get('phone');
				$ad->lat = Input::get('lat');
				$ad->lng = Input::get('lng');
				$ad->address = Input::get('address');
				$ad->details = Input::get('details');
				$ad->subcat_id = Input::get('cat');
				$ad->user_id = $user->id;
				$ad->activation = 0;
				$ad->fresher = 1;
				$ad->save();
				
				return redirect()
						->back()
						->with(['success' => ' New ad gone for admin approval ']);
				
			}else{
					
				$user = Auth::User();
				
				$ad = new Ads;
				$ad->title = Input::get('title');
				$ad->price = Input::get('price');
				//$ad->image = $insert;
				$ad->lat = Input::get('lat');
				$ad->lng = Input::get('lng');
				$ad->address = Input::get('address');
				$ad->details = Input::get('details');
				$ad->subcat_id = Input::get('cat');
				$ad->user_id = $user->id;
				$ad->email = Input::get('email');
				$ad->phone = Input::get('phone');
				$ad->activation = 0;
				$ad->fresher = 1;
				$ad->save();
				
				return redirect()
						->back()
						->with(['success' => ' New ad gone for admin approval ']);
			}
		}
	}
	
	// View Ad By Admin (REVIEW)
	public function viewAdByAdmin( Request $request, $id ){
		$ad = Ads::find($id);
		
		return view('admin.view-ad', ['ads' => $ad]);
	}
	
	// Approve Ad
	public function approveAd( Request $request, $id ){
		
		$ads = Ads::find($id);
		$ads->activation = '1';
		$ads->save();
		
		return redirect()->back()->with(['success' => $ads->name .' has approved']);
			
	}
	
	public function banAd( Request $request, $id ){
		
		$ads = Ads::find($id);
		$ads->activation = '0';
		$ads->save();
		
		return redirect()->back()->with(['success' => $ads->name .' has ban']);
			
	}
	
	public function deleteAd(Request $request, $id){
		
		$ad = Ads::find($id);
		$ad->delete();
		
		return redirect()->back()->with(['success' => $ad->name.' deleted']);
		
		
	}
	
	
}