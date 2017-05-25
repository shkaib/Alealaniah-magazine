<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\ads;
use App\category;
use App\subcategory;
use App\magazine_pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

Class MagazineController extends Controller{
	
	public function showMagazine (){
		
		$magazine = Magazine_pdf::orderBy('magazine_number', 'DESC')->get();
		return view( 'admin.upload_pdf', ['magazine' => $magazine] );	
	}
	
	public function uploadMagazine(Request $request){
		
		$rules = array(
			'magazine_number'	=> 'required',
			'magazine_thumbnail' => 'required|mimes:png,jpg,jpeg',
			'newmagazine' => 'required|mimes:pdf',
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if( $validator->fails() ){
			return redirect()
				   ->back()
				   ->withErrors($validator)
				   ->withInput($request->input());	
		}else{
			
			
			$image 	= Input::file('magazine_thumbnail');
			$pdf 	= Input::file('newmagazine');
			
			//$random	= rand(99999999, 99999999);
			
			// Available alpha caracters
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			
			// generate a pin based on 2 * 7 digits + a random character
			$pin = mt_rand(1000000, 9999999)
				. mt_rand(1000000, 9999999)
				. $characters[rand(0, strlen($characters) - 1)];
			
			// shuffle the result
			$string = str_shuffle($pin);
			
			
			
			$pdfPath = public_path('/pdf');
			$thumbnailPath = public_path('/thumbnail');
			
			
			$imageName = Input::file('magazine_thumbnail')->getClientOriginalName();
			$imageExtention = Input::file('magazine_thumbnail')->getClientOriginalExtension();
			$upload = $image->move($thumbnailPath, $string.'.'.$imageExtention);
			
			$pdfName = Input::file('newmagazine')->getClientOriginalName();
			$pdfExtention = Input::file('newmagazine')->getClientOriginalExtension();
			$upload = $pdf->move($pdfPath, $string.'.'.$pdfExtention);
			
			$imageInsert = 'thumbnail/'.$string.'.'.$imageExtention;
			$pdfInsert = 'pdf/'.$string.'.'.$pdfExtention;
			
			$ad = new Magazine_pdf;
			$ad->magazine_number = Input::get('magazine_number');
			$ad->magazine_picture = $imageInsert;
			$ad->magazine_pdf = $pdfInsert;
			$ad->save();
			
			return redirect()
					->back()
					->with(['success' => ' New Magazine Uploaded ']);
					
				
		}
			
	}
	
	public function getMagazines(){
		
		$magazine = Magazine_pdf::orderBy('magazine_number', 'decs')->get();
		return view( 'magazines', ['magazine' => $magazine] );	
			
	}
		
}