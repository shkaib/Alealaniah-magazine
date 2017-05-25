<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Only Front page
Route::get('/', [
	'uses' => 'FrontPageController@frontPageCategories',
	'as' => 'mainpage'
]);

// Get About page
Route::get('/about', function(){
	return view('about');	
})->name('about');


// All Products Under Specific Subcategory ({ ID })
Route::get('/category/{id}', [
	'uses' => 'FrontPageController@categorySearch',
	'as'	=> 'category-search'
]);

// Single Ad under Specific parent category ( {ID} )
Route::get('/single-ad/{id}', [
	'uses' => 'FrontPageController@singleAd',
	'as'	=> 'single-ad'
]);

Route::post('/single-ad/{id}', [
	'uses'	=> 'MailController@sendToCustomer',
	'as'	=> 'sendToCustomer'
]);

// Show all Categories
Route::get('/categories', [
	'uses' => 'CategoryController@allCategories',
	'as' => 'allCategories'
]);

// Front page all customers
Route::get('/companies', [
	'uses' 	=> 'CustomerController@showAllCustomers',
	'as' 	=> 'customers'	
]);

// Customer's details
Route::get('/companies/{id}', [
	'uses'	=> 'CustomerController@showCustomerDetails',
	'as'	=> 'companies'
]);

Route::get('/magazines', [
	'uses'	=> 'MagazineController@getMagazines',
	'as'	=> 'getMagazines'
]);

Route::get('/service-centers', function(){
	return view('servicecenters');	
})->name('serviceCenters');

// Contact Page
Route::get( '/contact', function(){
	return view('contact');
})->name('contact');


Route::get('/test-mail', [
	'uses'	=> 'MailController@test',
	'as'	=> 'test'
]);

Route::post('/contact', [
	
	'uses'	=> 'MailController@contactPageMail',
	'as'	=> 'contactMail'
	
]);

Route::get('/sitemap', function(){
	return view('sitemap.sitemap.xml');	
});

Route::get('/mobile/functions.php', function(){
	return Redirect::to("http://mobile.alealaniah.com/functions.php");	
});


Route::group(['prefix' => 'user', 'before' => 'auth'], function(){
	
	// Showing only RAGISTRATION page for a new user
	Route::get('/registration', [
		'uses' => 'RegistrationController@showRegistration',
		'as' => 'registration'
	]);
	
	// taking data with and REGISTER a new user 
	Route::post('/registration', [
		'uses' => 'RegistrationController@registerCustomer',
		'as' => 'registerCustomer'
	]);
	
	// Show LOGIN page
	Route::get('/login', [
		'uses' => 'CustomerLoginController@showLogin',
		'as' => 'customerLogin'
	]);
	
	// Getting data and make a user LOGGED IN
	Route::post('/login', [
		'uses' => 'CustomerLoginController@userAuth',
		'as' => 'customerLogin_'
	]);
	
	// Connected with a LOGOUT function
	Route::get('/logout', [
		'uses' => 'CustomerLoginController@logOut',
		'as' => 'customerLogout'
	]);
	
	// Show User's DASHBOARD
	Route::get('/', [
		'uses' => 'UserProfileController@showUserDashboard',
		'as' => 'customer-dashboard'
	]);
	
	// Add Comment here
	Route::get('/view-my-ads', [
		'uses' => 'UserProfileController@viewMyAds',
		'as'	=> 'viewMyAdsHere'
	]);
	
	// Add Comment Here
	Route::get('/edit-ad/{id}/{name?}', [
		'uses' => 'AdController@editMyAd',
		'as'	=> 'editMyAd'
	]);
	
	Route::post( 'update-ad/{id}', [
		'uses'	=> 'AdController@updateMyAd',
		'as'	=> 'updateMyAd'
	]);
	
	// POSTING a new AD by a user
	Route::get('/post-ad', [
		'uses' 		=> 'AdController@postAd',
		'as'		=> 'postAd'
	]);
	
	Route::get('/post-ad/{id?}', [
		'uses' => 'AdController@postAdById',
		'as'	=> 'postAdById'
	]);
	
	Route::post('/post-added', [
		'uses'		=> 'AdController@newad',
		'as'		=> 'posted-ad'
	]);
});
// End USER Prefix

// starting super admin's prfix
Route::group(['prefix' => 'salesman', 'before' => 'auth'], function(){

	Route::get('/', [
		'uses'	=>	'SalesmanController@showDashboard',
		'as'	=>	'salesManDashboard'
	]);

	Route::get('add-new-company', [
		'uses'	=>	'SalesmanController@addNewCompany',
		'as'	=>	'addNewCompany'
	]);

	Route::post('add-new-company_', [
		'uses'	=>	'SalesmanController@addNewComapnyPost',
		'as'	=> 	'addNewComapnyPost'
	]);

	Route::get('/view-my-ads', [
		'uses' => 'UserProfileController@viewMyAds',
		'as'	=> 'viewMyAds'
	]);

	// Add Comment Here
	Route::get('/edit-ad/{id}/{name?}', [
		'uses' => 'AdController@editMyAd',
		'as'	=> 'editMyAd'
	]);
	
	Route::post( 'update-ad/{id}', [
		'uses'	=> 'AdController@updateMyAd',
		'as'	=> 'updateMyAd'
	]);

	Route::get('/delete-ad/{id}/{name?}', [
		'uses'	=> 'AdController@deleteAd',
		'as'	=> 'delete-ad'
	]);
	
});

Route::group(['prefix' => 'service-center', 'before' => 'auth'], function(){

	Route::get('/', [
		'uses'	=>	'ServicecenterController@getServiceIndex',
		'as'	=>	'getServiceIndex'
	]);
	Route::get('/post-new-ad-by-center', [
		'uses'	=>	'ServiceCenterController@getNewAdByCenter',
		'as'	=>	'getNewAdByCenter'
	]);
	Route::post('/add-post-by-center-done',[
		'uses'	=>	'ServicecenterController@insertPostByCenter',
		'as'	=>	'insertPostByCenter'
	]);


	Route::get('/my-ads', [
		'uses'	=>	'ServiceCenterController@getCenterAds',
		'as'	=>	'getCenterAds'
	]);

});

// starting super admin's prfix
Route::group(['prefix' => 'admin', 'before' => 'auth'], function(){
	
	Route::get('/', [
		'uses' => 'CustomerController@showAdmin',
		'as' => 'dashboard'
	]);
	
	Route::get('/customers', [
		'uses' 	=> 'CustomerController@showCustomers',
		'as'	=> 'customer'
	]);
	
	// Approve a Customer
	Route::get('/approval/{id}', [
		'uses'	=> 'CustomerController@approveCustomer',
		'as'	=> 'approve-customer'
	]);
	
	// ban a Customer
	Route::get('/ban/{id}', [
		'uses'	=> 'CustomerController@banCustomer',
		'as'	=> 'ban-customer'
	]);
	
	// Delete a Customer by Admin
	Route::get('delete-customer/{id}', [
		'uses'	=>	'CustomerController@deleteACustomer',
		'as' 	=> 'customer-delete'	
	]);
	
	
	Route::get('/ads', [
		'uses' => 'AdController@getAds',
		'as'	=> 'ads'
	]);
	
	// POST a New Ad ( View Route Here { GET METHOD } ) | By Admin
	Route::get('/post-new-ad-by-admin', [
		'uses' 	=> 'AdController@postNewAdByAdmin',
		'as'	=> 'post-new-ad-by-admin'
	]);
	
	// POST a new Ad ( Post Route Here {{ POST METHOD }} ) | By Admin
	Route::post('/post-new-ad-by-admin', [
		'uses' 	=> 'AdController@postedNewAdByAdmin',
		'as'	=> 'posted-new-ad-by-admin'
	]);
	
	// Gone Ad For Approval By Admin
	Route::get('/approve-ad/{id}', [
		'uses'	=>	'AdController@approveAd',
		'as'	=>	'approve-ad'
	]);
	
	// Gone Ad For Ban
	Route::get('/ban-ad/{id}', [
		'uses'	=>	'AdController@banAd',
		'as'	=>	'ban-ad'
	]);
	
	// Delete an Ad by Admin
	Route::get('/delete-ad/{id}/{name?}', [
		'uses'	=> 'AdController@deleteAd',
		'as'	=> 'delete-ad'
	]);
	
	// Ad View Everything
	Route::get('/view-ad-by-admin/{id}', [
		'uses'	=> 'AdController@viewAdByAdmin',
		'as'	=> 'view-ad-by-admin'
	]);
	
	// getting CATEGORY page
	Route::get( '/category', [
		'uses' => 'CategoryController@showAddCategory',
		'as'   => 'category',
	]);
	
	// Inserting new CATEGORY
	Route::post('/category', [
		'uses'	=> 'CategoryController@addCategory',
		'as'	=> 'insert-category'
	]);
	
	// Parent Category Deleting
	Route::get('/category-delete/{id}', [
		'uses' 	=> 'CategoryController@deleteCategory',
		'as'	=> 'delete-category'
	]);
	
	// Parent Category Edit
	Route::get('/edit-category/{id}' , [
		'uses'	=> 'CategoryController@editCategory',
		'as'	=> 'edit-category'
	]);
	
	// Lets Update Category
	Route::post('/edit-category/{id}', [
		'uses'	=>	'CategoryController@updateCategory',
		'as'	=>	'update-category'
	]);
	
	// Getting Parent Category and show Subcategory page
	Route::get( '/subcategories', [
		'uses'	=> 'CategoryController@showSubcategory',
		'as'	=> 'subcategory'
	]);
	
	// Insert subcategory
	Route::post('/subcategory', [
		'uses'	=>	'CategoryController@insertSubcategory',
		'as'	=>	'insert-subcategory'
	]);	
	
	// Detele Subcategory
	Route::get('/delete-subcategory/{id}', [
		'uses' 	=> 'CategoryController@deleteSubcategory',
		'as'	=>	'deleteSubcategory'
	]);
	
	// Edit Subcategory
	Route::get('/update/{id}',[
		'uses' 	=> 'CategoryController@updateSubcategory',
		'as'	=> 'update-subcategory'
	]);
	
	// Lets Update  Subcategory
	Route::post('/updated/{id}', [
		'uses'	=> 'CategoryController@updatedSubcategory',
		'as'	=> 'updated-subcategory'
	]);
	
	// Magazines
	Route::get('/magazine', [
		'uses' => 'MagazineController@showMagazine',
		'as'	=> 'magazine'
	]);
	
	Route::post( '/magazine', [
		'uses'	=> 'MagazineController@uploadMagazine',
		'as'	=> 'uploadMagazine'
	]);

	
	// Salesman
	Route::get('/salesman', [
		'uses'	=> 'SalesmanController@viewsalesman',
		'as'	=> 'viewsalesman'
	]);

	Route::get('/add-salesman', [
		'uses'	=> 'SalesmanController@viewAddSalesman',
		'as'	=> 'viewAddSalesman'
	]);
	
	Route::post('/add-new-salesman', [
		'uses'	=>	'SalesmanController@addSalesman',
		'as'	=> 	'addSalesman'
	]);

	Route::get('/block-salesman/{id}', [
		'uses'	=>	'SalesmanController@blockSalesMan',
		'as'	=>	'blockSalesMan'
	]);

	Route::get('/active-salesman/{id}', [
		'uses'	=>	'SalesmanController@activeSalesMan',
		'as'	=>	'activeSalesMan'
	]);

	Route::get('/delete-salesman/{id}', [
		'uses'	=>	'SalesmanController@deleteSalesMan',
		'as'	=>	'deleteSalesMan'
	]);

	Route::get('/service-center', [
		'uses'	=>	'ServicecenterController@showServiceCenters',
		'as'	=>	'getServiceCenters'
	]);

	Route::post('/add-service-center', [
		'uses'	=>	'ServiceCenterController@addServiceCenter',
		'as'	=>	'addServiceCenter'
	]);

	Route::get('/service-centers', [
		'uses'	=>	'ServicecenterController@getAllServiceCenters',
		'as'	=> 'getAllServiceCenters'
	]);

});


