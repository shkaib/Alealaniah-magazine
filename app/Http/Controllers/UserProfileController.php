<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class UserProfileController extends Controller{
	
	// Geting User Dashboard
	public function showUserDashboard(){
		
		if (Auth::check()){
			$user = Auth::user();
			$count_ads = Ads::where('user_id', $user->id)->get();
			$notapproved = Ads::where( [
				[ 'user_id', '=', $user->id ],
				[ 'activation', '=', '0' ]
			])->get();
			$approved = Ads::where( [
				[ 'user_id', '=', $user->id ],
				[ 'activation', '=', '1' ]
			])->get();
			
			return view ('customer.index', [ 'total_ads' => $count_ads, 'notapproved' => $notapproved, 'approved' => $approved ]);		
		}else{
			return redirect()->route('customerLogin');	
		}
		
	}
	
	// Get Customer Side Ads
	public function viewMyAds(){
		if (Auth::check()){
			$u_id = Auth::user();
			$myads = Ads::where('user_id', $u_id->id)->get();
			return view('customer.ads', ['myads' => $myads]);	
		}
	}
}