<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\ads;
use App\category;
use Hash;
use App\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;


class SalesmanController extends Controller{
	
	public function viewsalesman(){
	
		$salesman 	=	User::where('admin_type' , '3')->orderBy('id', 'DESC')->get();
		return view('admin.salesman', ['salesman' => $salesman]);
		
	}

	public function viewAddSalesman(){

		return view ('admin.add-salesman');

	}

	public function addSalesman( Request $request ){

		$validator = Validator::make($request->all(),[
			'name' 	=> 'required',
			'email' 	=> 'required|unique:users|email',
			'password' => 'required',
			'designation' => 'required',
			
		]);

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

					$salesman 				= 	new User;
					$salesman->name 		= 	Input::get('name');
					$salesman->email 		= 	Input::get('email');
					$salesman->password 	= 	Hash::make( Input::get('password') );
					$salesman->designation 	= 	Input::get('designation');
					$salesman->phone 		= 	Input::get('phone');
					$salesman->about 		= 	Input::get('details');
					$salesman->logo 		= 	$insert;
					$salesman->active 		= 	('1');
					$salesman->admin_type 	= 	('3');
					$salesman->new_register = 	('0');
					$salesman->save();

					return redirect()->back()->with(['success' => 'New salesman added']);

					// This is the Function Sending as message back to sender that we have recieved your email We will Contact you shortly
					Mail::send( 'email.addsalesman', [ 'name' => Input::get('name'), 'subject' => 'New Salesman Registration', 'email' => Input::get('email'), 'password' => Input::get('password'), 'designation' => Input::get('designation') ], function( $message ){
						$message->to(Input::get('email') , Input::get('name'))->Subject('Inquiry');
					});
					
					

			}else{

					$salesman 				= 	new User;
					$salesman->name 		= 	Input::get('name');
					$salesman->email 		= 	Input::get('email');
					$salesman->password 	= 	Hash::make( Input::get('password') );
					$salesman->designation 	= 	Input::get('designation');
					$salesman->phone 		= 	Input::get('phone');
					$salesman->about 		= 	Input::get('details');
					//$salesman->logo 		= 	$insert;
					$salesman->active 		= 	('1');
					$salesman->admin_type 	= 	('3');
					$salesman->new_register = 	('0');
					$salesman->save();

					return redirect()->back()->with(['success' => 'New salesman added']);

			}


		}

	}


	public function blockSalesMan ( Request $request, $id ){

		$salesman 			=	User::find($id);
		$salesman->active 	=	'0';
		$salesman->save();

		return redirect()->back()->with( ['success'	=>	$salesman->name . ' is blocked']);

	}

	public function activeSalesMan ( Request $request, $id ){

		$salesman 			=	User::find($id);
		$salesman->active 	=	'1';
		$salesman->save();

		return redirect()->back()->with( ['success'	=>	$salesman->name . ' is activated']);

	}

	public function deleteSalesMan ( Request $request, $id ){

		$salesman 			=	User::find($id);
		$salesman->delete();

		return redirect()->back()->with( ['success'	=>	$salesman->name . ' is deleted']);

	}


	public function showDashboard() {

		return view('salesman.index');

	}

	public function addNewCompany(){

		$category	=	subcategory::orderBy('id', 'desc')->get();

		return view('salesman.add-new-company', [ 'category'	=>  $category ]);

	}

	public function addNewComapnyPost( Request $request ){

		$validator = Validator::make($request->all(),[
			'name' 	=> 'required',
			'email' 	=> 'required',
			'address'	=> 	'required',
			'phone'		=> 	'required',
			'category'	=>	'required'
		]);

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
		
					$company 	= 	new Ads;
					$company->title =	Input::get('name');
					$company->image =	$insert;
					$company->address =	Input::get('address');
					$company->details =	Input::get('details');
					$company->subcat_id =	Input::get('category');
					$company->user_id =	$user->id;
					$company->activation 	 =	'0';
					$company->fresher =	'0';
					$company->email =	Input::get('email');
					$company->phone =	Input::get('phone');
					$company->facebook =	Input::get('facebook');
					$company->twitter =	Input::get('twitter');
					$company->instagram =	Input::get('instagram');
					$company->snapchat =	Input::get('snapchat');
					$company->website =	Input::get('website');
					$company->lat =	Input::get('lat');
					$company->lng =	Input::get('lng');
					$company->save();
		
					return redirect()->back()->with(['success'	=>	'New Company Added']);
			}else{
		

				$user = Auth::User();
	
				$company 	= 	new Ads;
				$company->title =	Input::get('name');
				//$company->image =	Input::get('');
				$company->address =	Input::get('address');
				$company->details =	Input::get('details');
				$company->subcat_id =	Input::get('category');
				$company->user_id =	$user->id;
				$company->activation 	 =	'0';
				$company->fresher =	'0';
				$company->email =	Input::get('email');
				$company->phone =	Input::get('phone');
				$company->facebook =	Input::get('facebook');
				$company->twitter =	Input::get('twitter');
				$company->instagram =	Input::get('instagram');
				$company->snapchat =	Input::get('snapchat');
				$company->website =	Input::get('website');
				$company->lat =	Input::get('lat');
				$company->lng =	Input::get('lng');
				$company->save();
	
				return redirect()->back()->with(['success'	=>	'New Company Added']);
			}

		}

	}
		
}