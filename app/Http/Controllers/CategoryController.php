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

// Class CategoryController
class CategoryController extends Controller{
	
	
	// 1) Show All Categories
	public function showAddCategory(){
		$category = Category::orderBy('id')->get();
		
		return view('admin.category', ['categories' => $category]);
	}
	
	// 2) Insert category function;
	public function addCategory(){
		
		// Defining the rules for validation
		$rules = array(
			'cat_name'	=>	'required',
		);
		
		// Validator function
		$validatore = validator::make(Input::all(), $rules);
		
		
		// Condition for validation
		if($validatore->fails()){
			return redirect()
				   ->back()
				   ->withErrors('$validatore')
				   ->withInput();	
		}else{
			
			// if validator pass insert the data
			$category = new Category;
			$category->name = Input::get('cat_name');
			$category->color = Input::get('color_');
			$category->icon = Input::get('icon_name');
			$category->save();
			
			// redirect back
			return redirect()->back();
				
		}
			
	}
	
	// 3) Category Delete
	public function deleteCategory(Request $request, $id){
		$category = Category::find($id);
		$category->delete();
		
		return redirect()->back()->with(['success' => $category->name.' has been deleted']);
	}
	
	// 4) Edit Category
	public function editCategory(Request $request, $id){
		
		$category_update = Category::find($id);
		$category = Category::orderBy('id')->get();
		
		return view('admin.category', ['category_update' => $category_update, 'categories' => $category]);	
	}
	
	// 5) Subcategory page show function
	public function showSubcategory(){
			$category = Category::orderBy('id')->get();
			$subcategory = Subcategory::orderBy('id')->get();
			return view ('admin.subcategory', ['category' => $category, 'subcategory' => $subcategory]);
	}
	
	// 6) Lets Update Category
	public function updateCategory(Request $request, $id){
		$category = Category::find($id);
		$category->name = Input::get('cat_name');
		$category->color = Input::get('color_');
		$category->icon = Input::get('icon_name');
		$category->save();
		
		return redirect()->route('category')->with(['success' => $category->name.' has updated']);
	}
	
	
	// 7) Subcategory insert function
	public function insertsubcategory(Request $request){
		
		// Validate function
		$this->validate($request, [
           'cat_name' => 'required|unique:subcategories,name' 
        ]);
			
			// Subcategory function
			$subcategory = new Subcategory;
		
			$subcategory->name = Input::get('cat_name');
			$subcategory->parent_id = Input::get('parent');
			$subcategory->icon = Input::get('subcat_icon');
			$subcategory->save();
			
			return redirect()->back()->with(['success' => $subcategory->name.' has been added']);
	}
	
	// 8) Subcategory delete function
	public function deleteSubcategory( Request $request, $id ){
		
		$subcategory = Subcategory::find($id);
		$subcategory->delete();
		
		return redirect()->back()->with(['success' => $subcategory->name .' has been deleted']);	
	}
	
	public function updateSubcategory(Request $request, $id){
		$update= Subcategory::find($id);
		$category = Category::orderBy('id')->get();
		$subcategory = Subcategory::orderBy('id')->get();
		
		return view('admin.subcategory', ['details' => $update, 'category' => $category, 'subcategory' => $subcategory]);
	}
	
	// 9) Lets update Subcategory this post
	public function updatedSubcategory(Request $request, $id){
		$update= Subcategory::find($id);
		$update->name = Input::get('cat_name');
		$update->parent_id = Input::get('parent');
		$update->icon = Input::get('subcat_icon');
		$update->save();
		
		return redirect()->route('subcategory')->with(['success' => $update->name.' updated']);
	}
	
	// Get Sub Categories Page
	public function allCategories(){
		
		$categories = Category::orderBy('id')->get();
		$subcategories = Subcategory::orderBy('id')->get();
		
		
		return view('categories', ['categories' => $categories, 'subcategories' => $subcategories]);
	}
		
}

	