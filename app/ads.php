<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subcategory;

class ads extends Model
{
    // Every Ad belongs to any Customer
	public function getCustomerName (){
		return User::where('id', $this->user_id)->first()->name;
	}
	
	// Get Ad owner user's id number
	public function getCustomerNumber (){
		return User::where('id', $this->user_id)->first()->phone;
	}
	
	// Get ad owner user's Email address ({[ 'nessecery' ]})
	public function getCustomerEmail (){
		return User::where('id', $this->user_id)->first()->email;
	}
	
	// Get Ad owner User's facebook Address
	public function getCustomerFacebook(){
		return User::where('id', $this->user_id)->first()->facebook;	
	}
	
	// Get Ad owner USer's instagram Address
	public function getCustomerInstagram(){
		return User::where('id', $this->user_id)->first()->instagram;	
	}
	
	// Get Ad owner USer's Twitter Address
	public function getCustomerTwitter(){
		return User::where('id', $this->user_id)->first()->twitter;	
	}
	
	// get Sub category id of parent category
	public function getSubCategory() {
		return Subcategory::where('id', $this->subcat_id)->first()->name;	
	}
	
	public function getSubCategoryIcon() {
		return Subcategory::where('id', $this->subcat_id)->first()->icon;	
	}
	
}
