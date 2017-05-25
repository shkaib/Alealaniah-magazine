<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class RegistrationController extends Controller
{
	public function showRegistration(){
   		return view('registration.registration');
	}
	
	public function registerCustomer(Request $request){
		
		$validator = Validator::make($request->all(),[
			'company-title' 	=> 'required',
			'city' 		=> 'required',
			'email' 	=> 'required|unique:users|email',
			'mobile' 	=> 'required',
			'logo' 		=> 'mimes:jpeg,png',
			'form-password' => 'required',
			'form-repeat-password' => 'required|same:form-password',
			
		]);
		
		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{
			
			if( Input::hasFile('logo') ){
			
				$file = Input::file('logo');
				
				// Available alpha caracters
				$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				
				// generate a pin based on 2 * 7 digits + a random character
				$pin = mt_rand(1000000, 9999999)
					. mt_rand(1000000, 9999999)
					. $characters[rand(0, strlen($characters) - 1)];
				
				// shuffle the result
				$string = str_shuffle($pin);
				
				
				$destinationPath = public_path().'/logos';
				$fileName = Input::file('logo')->getClientOriginalName();
				$extention = Input::file('logo')->getClientOriginalExtension();
				$upload = $file->move($destinationPath, $string.'.'.$extention);
				
				$insert = '/logos/'.$string.'.'.$extention;
				
				$customer = new User;
				$customer->logo = $insert;
				$customer->name = Input::get('company-title');
				$customer->address = Input::get('form-about-yourself');
				$customer->city = Input::get('city');
				//$customer->website = Input::get('city');
				$customer->email = Input::get('email');
				$customer->password = Hash::make(Input::get('form-password'));
				$customer->phone = Input::get('mobile');
				//$customer->telephone = Input::get('city');
				$customer->facebook = Input::get('form-facebook');
				$customer->instagram = Input::get('instagram');
				$customer->twitter = Input::get('form-twitter');
				$customer->map_address  = Input::get('form-about-yourself');
				$customer->map_lat = Input::get('latitude');
				$customer->map_lng = Input::get('longitude');
				$customer->active = ('1');
				$customer->admin_type = ('1');
				$customer->new_register = ('0');
				$customer->save();	
				
				//return redirect()->route('registration');
				
				// create our user data for the authentication
				$userdata = array(
					'email'     => Input::get('email'),
					'password'  => Input::get('form-password'),
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
						
						// This is the function which is send this email to admin, Website admin
						Mail::send('email.registration', [ 'name' => Input::get('company-title') , 'email' => Input::get('email')], function( $adminC ){
							$adminC->to( 'alealaniahmagazine@gmail.com', 'Alealaniah Website')->subject('Inquiry');	
						});
					}
			
				} else {
					
					$userdata2 = array(
						'email' => Input::get('email'),
						'password' => Input::get('password'),
						'admin_type' => '2'
					);
					
					if(Auth::attempt($userdata2)){
						if (Auth::check()){
							return redirect()->route('dashboard');
						}
					}else{
						// validation not successful, send back to form 
						return Redirect()->route('customerLogin')->withErrors(['message', 'your email or password does not match']);
					} 
			
				}
					
			}else{
				$customer = new user;
				$customer->name = Input::get('company-title');
				$customer->address = Input::get('form-about-yourself');
				$customer->city = Input::get('city');
				//$customer->introduction = Input::get('city');
				$customer->website = Input::get('city');
				$customer->email = Input::get('email');
				$customer->password = Hash::make( Input::get('form-password') );
				$customer->phone = Input::get('mobile');
				//$customer->telephone = Input::get('city');
				//$customer->fax = Input::get('city');
				$customer->facebook = Input::get('form-facebook');
				$customer->instagram = Input::get('instagram');
				$customer->twitter = Input::get('form-twitter');
				$customer->map_address  = Input::get('form-map-address');
				$customer->map_lat = Input::get('latitude');
				$customer->map_lng = Input::get('longitude');
				$customer->active = ('1');
				$customer->admin_type = ('1');
				$customer->new_register = ('0');
				$customer->save();
				
				//return redirect()->route('registration');
				
				// create our user data for the authentication
				$userdata = array(
					'email'     => Input::get('email'),
					'password'  => Input::get('form-password'),
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
					
					if(Auth::attempt($userdata2)){
						if (Auth::check()){
							return redirect()->route('dashboard');
						}
					}else{
						// validation not successful, send back to form 
						return Redirect()->route('customerLogin')->withErrors(['message', 'your email or password does not match']);
					} 
			
					
			
				}
					
			}
				
		}
		
	}
	
}