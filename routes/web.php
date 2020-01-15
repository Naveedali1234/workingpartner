<?php
use App\Business;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@frontPage');
Route::post('send-contact-message','HomeController@sendMessage')->name('contact-us-message');
Route::get('contact-us',function(){
	return view('front-end.contact-us');
});
Auth::routes(['verify' => true]);
Route::get('user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('user/login', 'Auth\LoginController@login');
Route::get('register/{id}','Auth\RegisterController@showRegistrationForm')->name('registerForm');
// Route::get('/home', 'HomeController@index')->name('home');

// ==========================Admin dashboard==============================

Route::group(['prefix'=>'admin-dashboard','middleware'=> ['auth']],function () {
    Route::get('login', 'HomeController@index')->name('admin.login');
	Route::get('home', 'HomeController@home')->name('admin.home');

	//profile settings
	Route::get('profile','UserController@adminProfileSettings')->name('admin.profile');
	Route::post('profile/update/{user}','UserController@updateAdminProfile')->name('profile.update');

	//all admins account
	Route::get('all-admins','UserController@allAdmins')->name('admins.index');

	//add admin Form account
	Route::get('admin/create','UserController@createAdmin')->name('admin.create');

	//add admins account
	Route::post('admin/store','UserController@storeAdmin')->name('admin.store');

	//edit admin account form
	Route::get('admin/edit/{user}','UserController@editAdmin')->name('admin.edit');
	//Update admin account
	Route::post('admin/update/{user}','UserController@updateAdmin')->name('admin.update');
	//delete admin account
	Route::get('delete/admin/{user}','UserController@destroyAdminAccount')->name('destroy.admin');

	//Verified Businesses
	Route::get('verified-businesses','AdminBusinessController@verifiedBusinesses')->name('verified.businesses');

	//Unverified Businesses
	Route::get('unverified-businesses','AdminBusinessController@unverifiedBusinesses')->name('unverified.businesses');

	//business verification
	Route::get('business-verify/{business}','AdminBusinessController@verifyBusiness')->name('business.verify');
	//suggest changes
	Route::post('suggest-business-changes','AdminBusinessController@suggestchanges')->name('suggestChanges');
	//Delete business
	Route::get('business-delete/{business}','AdminBusinessController@destroyBusiness')->name('business.destroyy');

	//sent offers
	Route::get('sent-offers','AdminOfferController@sentOffers')->name('sent.offers');

	//recieved offers
	Route::get('accepted-offers','AdminOfferController@acceptedOffers')->name('accepted.offers');

	//All Conversations
	Route::get('all-conversation','AdminConversationController@allConversationList')->name('all.conversations');
	//conversation details between 2 users
	Route::get('conversation-details/{thread}','AdminConversationController@conversationDetails')->name('conversation.details');

	//Country Management
	Route::resource('countries','CountryController');
	Route::get('delete/{country}','CountryController@destroy')->name('countries.destroy');
	// province management
	Route::resource('provinces','ProvinceController');
	Route::get('delete/{province}','ProvinceController@destroy')->name('provinces.destroy');


	// City management
	Route::resource('cities','CityController');
	Route::get('delete/city/{city}','CityController@destroy')->name('cities.destroy');

	Route::get('bulk-upload-cities-form','CityController@BulkUploadForm')->name('cities.bulkupload');
	Route::post('bulk-upload-cities','CityController@BulkUploadStore')->name('bulkUploadCities.store');
	//All provinces of related Country
	Route::get('country/all-provinces/{province}','CityController@allCities')->name('province.allCities');

	//All cities of related Province
	Route::get('province/all-cities/{province}','CityController@allCities')->name('province.allCities');

	// Asking price management
	Route::resource('asking_price','AskingPriceController');
	Route::get('delete/asking-price/{askingPrice}','AskingPriceController@destroy')->name('asking_price.destroy');

	// Sector management
	Route::resource('sectors','SectorController');
	Route::get('delete/sector/{sector}','SectorController@destroy')->name('sectors.destroy');

	// Industry management
	Route::resource('industries','IndustryController');
	Route::get('delete/industry/{industry}','IndustryController@destroy')->name('industries.destroy');

	// Asking price management
	Route::resource('shares_available','SharesAvailableController');
	Route::get('delete/shares_available/{sharesAvailable}','SharesAvailableController@destroy')->name('shares_available.destroy');

	// Share Value management
	Route::resource('share_value','ShareValueController');
	Route::get('delete/share_value/{shareValue}','ShareValueController@destroy')->name('share_value.destroy');

	// Working Salary management
	Route::resource('working_salary','WorkingSalaryController');
	Route::get('delete/working_salary/{workingSalary}','WorkingSalaryController@destroy')->name('working_salary.destroy');

	//Users Management
	Route::get('all-users/sellers','UserController@allSellers')->name('all.sellers');
	
	Route::get('all-users/working-partner','UserController@allWorkingPartners')->name('all.workingPartners');

	Route::get('deactivate-account/{user}','UserController@deactivateAccount')->name('account.deactivate');
	Route::get('activate-account/{user}','UserController@activateAccount')->name('account.activate');

});

//=========================Seller Dashboard===============================

Route::group(['prefix'=>'seller','middleware'=> ['auth','verified','seller']],function () {


Route::post('business_register','BusinessController@business_register')->name('business_register');
Route::get('home','HomeController@sellerHome')->name('seller.home');
Route::get('profile-settings','HomeController@sellerProfile')->name('seller.profile');
Route::post('profile-settings','HomeController@sellerProfileUpdate')->name('seller.profileUpdate');
Route::resource('business','BusinessController');



Route::get('chats','ChatsController@index')->name('seller.chats');
Route::resource('offer','OfferController');
Route::get('delete/offer/{offer}','OfferController@destroy')->name('offer.destroy');
Route::get('recieved-offers','OfferController@offersRecieved')->name('offers.recieved');
Route::get('return','OfferController@offerAccepted');
Route::get('cancel','OfferController@offercancelled');

});

//for registering a business
Route::get('business/return','BusinessController@registerBusinessReturned');
Route::get('business/cancel','BusinessController@registerBusinessCancelled');
Route::post('business/notify','BusinessController@registerBusinessNotified');


Route::post('seller/notify','OfferController@offerNotified');

//=================Working Partner Dashboard==============================
Route::group(['prefix'=>'working-partner','middleware'=>['auth','verified','workingPartner']],function(){
	Route::get('home','HomeController@WorkingPartnerHome')->name('workingPartner.home');
	Route::get('chats','ChatsController@index')->name('working-partner.chats');
	Route::get('recieved-offers','WorkingPartnerDetailController@offersRecieved')->name('workingPartner.offersRecieved');
	Route::get('return','WorkingPartnerDetailController@offerAccepted');
	Route::get('cancel','WorkingParnerDetailController@offercancelled');
	Route::post('profile-settings','HomeController@workingPartnerProfileUpdate')->name('workingPartner.profileUpdate');
	Route::get('profile-settings','HomeController@workingPartnerProfile')->name('workingPartner.profile');
});
Route::post('working-partner/notify','WorkingPartnerDetailController@offerNotified');
//==================Ajax call=============================================
Route::get('all-cities/{id}','AjaxCallsController@fetchCities');
Route::get('offer-details/{offer}','AjaxCallsController@offerDetails');
Route::get('business-details/{business}','AjaxCallsController@businessDetails');

//================Front End Controller===================================
Route::get('business-search','FrontEndController@searchBusiness')->name('business.search');

Route::get('business/{title}/details','FrontEndController@SingleBusinessDetails')->name('business.details');

Route::get('featured-businesses','FrontEndController@featuredBusinesses')->name('business.featured');
//================================Chat===============================

// Route::get('chats','ChatsController@index')->name('chats')->middleware('auth');
Route::post('/'.'send-first-message','ChatsController@sendFirstMessage')->name('message.send')->middleware('auth');
Route::get('/'.'fetchConversationList','ChatsController@conversationList')->middleware('auth');
Route::get('/privateMessages/{user}/{thread}','ChatsController@privateMessages');
Route::post('/messages/{user}/{thread}','ChatsController@sendPrivateMessage')->middleware('auth');


// featured business feature
Route::get('return',function(){
return redirect()->route('business.index')->with('success','Congratulations ! Your payment has been made successfully and your business is featured');
	
});
Route::get('cancel',function(){
	return redirect()->route('business.index')->with('danger','Sorry ! Your payment is not successful. Please try again.');
});
Route::post('notify','HomeController@updatedBusiness');


//social Media boosting feature
Route::post('social-media/notify','HomeController@updateBusinessSocialMedia');
Route::get('social-media/return',function(){
	return redirect()->route('business.index')->with('success','Congratulations ! Your payment has been made successfully and your business will be boosted on social media.');
});
Route::get('social-media/cancel',function(){
	return redirect()->route('business.index')->with('danger','Sorry ! Your payment is not successful. Please try again.');
});