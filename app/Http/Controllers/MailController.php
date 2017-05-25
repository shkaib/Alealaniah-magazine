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
use Illuminate\Support\Facades\Mail;
use Session;


class MailController extends Controller{ 

	public function test(){
		Mail::send('email.test' , [ 'name' => 'Ahmed', 'subject' => 'testing from alealaniah magazine' ], function( $message ){
			$message->to('alealaniahmagazine@gmail.com', 'Alealaniah')->subject('WELCOME');	
		});	
	}
	
	
	public function contactPageMail( Request $request ){
		
		$rules = array(
			'name'	=> 'required',
			'email' 	=> 'required|email',
			'contact-message' => 'required',
			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{
			
			// This is the Function Sending as message back to sender that we have recieved your email We will Contact you shortly
			Mail::send( 'email.contact-customer-copy', [ 'name' => Input::get('name'), 'subject' => 'Inquiry' ], function( $message ){
				$message->to(Input::get('email') , Input::get('name'))->Subject('Inquiry');
			});
			
			// This is the function which is send this email to admin, Website admin
			Mail::send('email.contact-admin-copy', [ 'name' => Input::get('name') , 'email' => Input::get('email'), 'content' => Input::get('contact-message') ], function( $adminC ){
				$adminC->to( 'alealaniahmagazine@gmail.com', 'Alealaniah Website')->subject('Inquiry');	
			});
			
			return redirect()->back()->with([ 'success' => 'Email Sent' ]);
		}
			
	}
	
	public function sendToCustomer( Request $request ){
		
		$rules = array(
			'name'	=> 'required',
			'subject'	=> 'required',
			'email' 	=> 'required|email',
			'message-content' => 'required',
			'customer-email'	=>	'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails())
		{
			return redirect()
			->back()
			->withErrors($validator)
			->withInput($request->input());	
		}else{
		
			Mail::send( 'email.ad-contact-template', [ 'name' => Input::get('name'), 'subject' => Input::get('subject'), 'email'	=> Input::get('email'), 'content' => Input::get('message-content') ], function( $message ){
				$message->to(Input::get('customer-email') , 'Alealaniah')->Subject( Input::get('subject') );
			});
			
			return redirect()->back()->with(['success'	=> 'Email Sent']);
		
		}
			
	}
	
}