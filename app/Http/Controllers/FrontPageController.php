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


class FrontPageController extends Controller{
	
	public function frontPageCategories(){
		
		$categories = Category::orderBy('id')->get();
		$subcategories = Subcategory::orderBy('id')->get();
		$ads	= Ads::where([
								['activation' , '=' , '1'],
								['lat', '=', ''],
								['lng', '=', '']
							] )->orderBy('id', 'desc')->paginate('120');
		$ads_location	= Ads::where('activation', '1')->orderBy('id' , 'desc')->get();
		
		return view('mainpage', ['categories' => $categories, 'subcategories' => $subcategories, 'ads' => $ads, 'locations' => $ads_location]);
	}
	
	public function singleAd( Request $request, $id ){
		
		$ads = Ads::find($id);
		
		return view ('single-ad', ['ads' => $ads]);
	}
	
	public function categorySearch( Request $request, $id ){
		
		$ads = Ads::where([
							['subcat_id' , '=' , $id], 
							['activation', '=', '1']
						])->orderBy('id', 'desc')->get();
		
		return view('catsearch', ['new_ads' => $ads]);
			
	}

}