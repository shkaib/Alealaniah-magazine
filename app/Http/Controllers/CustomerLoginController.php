<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class CustomerLoginController extends Controller{
	
	public function showLogin(){
		
		if (Auth::check())
		{
			return redirect()->route('customer-dashboard');
		}else{
			return view ('customer.login');	
		}
	}
	
	public function userAuth(Request $request){
		
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect()
				->back()
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
		
			// create our user data for the authentication
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password'),
				'admin_type'=> '1'
			);
		
			// attempt to do the login
			if (Auth::attempt($userdata, $request->has('remember'))) {
		
				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				if (Auth::check())
				{
					
					return redirect()->route('customer-dashboard');
				}
		
			} else {
				
				$userdata2 = array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'admin_type' => '2'
				);
				$userdata3 = array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'admin_type' => '3'
				);
				$userdata4 = array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'admin_type' => '4'
				);
				
				if(Auth::attempt($userdata2)){
					if (Auth::check()){
						return redirect()->route('dashboard');
					}
				}elseif(Auth::attempt($userdata3) ){
					if (Auth::check()){
						return redirect()->route('salesManDashboard');
					}

				}elseif(Auth::attempt($userdata4)){
					if (Auth::check()){
						return redirect()->route('getServiceIndex');
					}

				}else{
					// validation not successful, send back to form 
					return Redirect()->route('customerLogin')->withErrors(['Your email or password does not match']);
				} 
		
				
		
			}
			
			
		
		}
		
	}
	
	public function logOut(){
		Session::flush();
		return redirect()->route('customerLogin');	
	}
	
}