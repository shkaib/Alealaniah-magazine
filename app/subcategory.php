<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    public function getCategoryName (){
		return Category::where('id', $this->parent_id)->first()->name;
	}
}
