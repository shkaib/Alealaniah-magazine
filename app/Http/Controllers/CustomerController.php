<?php

namespace App\Http\Controllers;

// Libraries
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

// Initiating A Class
class CustomerController extends Controller{
	
	public function showAdmin(){
		
		$ads_fresh = Ads::where('fresher' , '1')->get();
		$customer_fresh = User::where('new_register', '1')->get();
		$ads = Ads::get();
		
		return view('admin.index', ['ads_fresh' => $ads_fresh, 'customers_fresh'=> $customer_fresh, 'ads' => $ads]);
				
	}
	
	// Getting All Customers List
	public function showCustomers(){
		$customers = User::where('admin_type', 1)->orderBy('id', 'desc')->get();
		
		return view('admin.tables', ['customer' => $customers]);
	}
	
	// Approve a Customer
	public function approveCustomer( Request $request, $id ){
		
		$approval = User::find($id);
		$approval->active = '1';
		$approval->save();
		
		return redirect()->back()->with(['success' => $approval->name. ' is approved ']);	
	}
	
	// Approve a Customer
	public function banCustomer( Request $request, $id ){
		
		$approval = User::find($id);
		$approval->active = '0';
		$approval->save();
		
		return redirect()->back()->with(['success' => $approval->name. ' is baned ']);	
	}
	
	public function deleteACustomer( Request $request, $id ){
		
		$user = User::find($id);
		$user->delete();
		
		return redirect()->back()->with(['success', 'One user deleted']);
				
	}
	
	// Show all Customers List Admin Panel
	public function showAllCustomers(){
	
		$customers = User::where('active' , '1')->orderBy('id', 'desc')->get();
		
		return view('viewcustomers', ['customers' => $customers]);
				
	}
	
	public function showCustomerDetails(Request $request, $id){
		
		$customer = User::find($id);
		
		$ads	= Ads::where( 'user_id', $id)->orderBy('id', 'desc')->get();
		
		return view ('customerprofile', ['customer' => $customer, 'ads' => $ads]);
		
	}
	
}