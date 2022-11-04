<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminloginController;
use App\Http\Controllers\ForntendController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PagesettingsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[ForntendController::class,'welcome'])->name('welcome');
Route::get('/about',[ForntendController::class,'about'])->name('about');
Route::get('/services',[ForntendController::class,'services'])->name('services');
Route::get('/gallery',[ForntendController::class,'gallery'])->name('gallery');
Route::get('/explore-our-hotel',[ForntendController::class,'hotels'])->name('hotels');
Route::get('/hotels/room/{rm}',[ForntendController::class,'room'])->name('hto.room');
Route::get('/hotels/room/details/{slug}',[ForntendController::class,'room_details'])->name('roomdetails');
Route::get('/contact',[ForntendController::class,'contact'])->name('contact');
Route::post('/sencontactdmail',[ForntendController::class,'sendcontactmail'])->name('contactsend');
Route::get('/privacy',[ForntendController::class,'privacy'])->name('privacy');
Route::get('/t&c',[ForntendController::class,'terms'])->name('tc');
Route::get('/faq',[ForntendController::class,'faq'])->name('faq');
Route::get('/support',[ForntendController::class,'support'])->name('support');
Route::post('/support/sendmail',[ForntendController::class,'sendsupportmail'])->name('supportmail');

Route::post('/newsletter',[ForntendController::class,'newsletter'])->name('newsletter');

Route::get('/booking/room',[ForntendController::class,'checkout'])->name('book.checkout');
Route::post('/booking/store-chechout',[ForntendController::class,'store_checkout'])->name('book.submitcheckout');
Route::get('/booking/check-room-booked',[ForntendController::class,'checkroombooking'])->name('checkrmbooking');
Route::get('/booking/thankyou',[ForntendController::class,'thankyou'])->name('thankyou');

Route::get('/search/results',[ForntendController::class,'searchresult'])->name('search');

Route::get('/searchdropdown',[ForntendController::class,'searchdropdown'])->name('searchdropdown');

Route::get('/check/user-account',[ForntendController::class,'checkaccount'])->name('checkaccot');


require __DIR__.'/auth.php';

Route::group(['prefix' => 'e-main-admin'], function(){
Route::get('/admin-login',[AdminloginController::class,'adminloginpg'])->name('adlogin');
Route::post('/admin-login',[AdminloginController::class,'adminlogin'])->name('admin-login');
Route::get('/logout', [AdminloginController::class,'adminlogout'])->name('admin.logout');

Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/user/account', [AdminController::class,'adminuser'])->name('user.account');
Route::get('/user-create', [AdminController::class,'create'])->name('user.create');
Route::post('/user-create', [AdminController::class,'store'])->name('newuser.store');
Route::get('/make-admin', [AdminController::class,'make_admin'])->name('make_admin');
Route::get('/password/edit/{id}', [AdminController::class,'changepassword'])->name('password.change');
Route::post('/change-password', [AdminController::class,'change_pass'])->name('change.pass');
Route::get('/delete/{id}', [AdminController::class,'destroy'])->name('admin.delete');
Route::get('/profile/admin-users', [AdminController::class,'profile'])->name('profile');
Route::post('/profile/update', [AdminController::class,'updateprofile'])->name('updateprofile');
    
//contact
Route::get('/contact', [PagesettingsController::class,'contactpg'])->name('admin.contact');
Route::post('/contact/save', [PagesettingsController::class,'contact_save'])->name('contact.save');

//about
Route::get('/about/bio', [PagesettingsController::class,'bio'])->name('about.bio');
Route::post('/about/bio/save', [PagesettingsController::class,'save_bio'])->name('about.biosave');
 //term of service
 Route::get('/terms-of-service', [PagesettingsController::class,'termpg'])->name('term');
 Route::post('/terms-of-service/save', [PagesettingsController::class,'save_terms'])->name('terms.save');
 //privacy
 Route::get('/privacy-page', [PagesettingsController::class,'privacypg'])->name('privacypg');
 Route::post('/privacy/save', [PagesettingsController::class,'save_privacy'])->name('privacypg.save');

 //faq
 Route::get('/faq', [AdminController::class,'faqpage'])->name('admin.faq');
 Route::post('/faq', [AdminController::class,'addfaq'])->name('admin.addquest');
 Route::get('/faq/{id}/edit', [AdminController::class,'faqedit'])->name('faq.edit');
 Route::post('/faq/update/{id}', [AdminController::class,'faqupdate'])->name('faq.update');
 Route::get('/faq/delete/{id}', [AdminController::class,'faqdelete'])->name('faq.delete');

//testimonial
Route::get('/testimonial',[TestimonialController::class,'index'])->name('tst.index');
Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('tst.create');
Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('tst.store');
Route::get('/testimonial/{id}/edit',[TestimonialController::class,'edit'])->name('tst.edit');
Route::post('/testimonial/update/{id}',[TestimonialController::class,'update'])->name('tst.update');
Route::get('/testimonial/delete/{id}',[TestimonialController::class,'destroy'])->name('tst.delete');

Route::get('/news-letter',[AdminController::class,'managenewsletter'])->name('news');
Route::get('/news/delete/{id}',[AdminController::class,'deletenewsletter'])->name('news.delete');
Route::get('/broadcast',[AdminController::class,'showbroadcast'])->name('showbcast');
Route::post('/sendbroadcast',[AdminController::class,'sendbroadcast'])->name('send.msg');

//team
Route::get('/team', [TeamController::class,'index'])->name('team.index');
Route::get('/team/create', [TeamController::class,'create'])->name('team.create');
Route::post('/team/store', [TeamController::class,'store'])->name('team.store');
Route::get('/team/{id}/edit', [TeamController::class,'edit'])->name('team.edit');
Route::post('/team/update/{id}', [TeamController::class,'update'])->name('team.update');
Route::get('/team/delete/{id}', [TeamController::class,'destroy'])->name('team.delete');

//gallery 
Route::get('/gallery', [AdminController::class,'gallerypage'])->name('admin.gallery');
Route::post('/gallery', [AdminController::class,'addgallery'])->name('newgallery');
Route::get('/gallery/{id}/edit', [AdminController::class,'galleryedit'])->name('gallery.edit');
Route::post('/gallery/update/{id}', [AdminController::class,'galleryupdate'])->name('gallery.update');
Route::get('/gallery/delete/{id}', [AdminController::class,'gallerydelete'])->name('gallery.delete');

 //report generator
 Route::get('/reports',[AdminController::class,'report'])->name('admin.report');
 Route::get('/generate/reports',[AdminController::class,'generate_report'])->name('generatereport');

 //hotels
 Route::get('/hotels-branches',[HotelController::class,'index'])->name('htl');
 Route::post('/hotels-branches/store',[HotelController::class,'store_hotel_branch'])->name('htl.store');
 Route::get('/hotels-branches/{id}/edit',[HotelController::class,'edit_hotel_branch'])->name('htl.edit');
 Route::post('/hotels-branches/update/{id}',[HotelController::class,'update_hotel_branch'])->name('htl.update');
 Route::get('/hotels-branches/detele/{id}',[HotelController::class,'delete_hotel_branch'])->name('htl.delete');

 //bookings, checkin and checkout
 Route::get('/clients/checkins',[HotelController::class,'client_checkin'])->name('checkin');
 Route::get('/clients/checkouts',[HotelController::class,'client_checkout'])->name('checkout');
 Route::get('/clients/checkinouts/{id}',[HotelController::class,'client_checkinout_details'])->name('checkin.details');
 Route::get('/clients/bookings',[HotelController::class,'client_booking'])->name('bookins');
 Route::get('/clients/get-booking-count',[HotelController::class,'getbookingcount'])->name('getbook');
 Route::post('/clients/check-booking-code',[HotelController::class,'check_booking_code'])->name('checkbookincode');
 Route::get('/clients/getrooms',[HotelController::class,'getrooms'])->name('getromms');
 Route::get('/clients/getrooms-price',[HotelController::class,'getrooms_price'])->name('getrommsprices');

 //checkin client
 Route::post('/clients/checkin-store',[HotelController::class,'store_checkins'])->name('submitcheckin');
 Route::post('/clients/checkin-via-booking',[HotelController::class,'checkin_client_via_booking'])->name('submitcheckinviabookin');
 Route::get('/clients/continue-checkin',[HotelController::class,'continue_tocheckin'])->name('continsubmitcheckin');
 Route::get('/print/checkin/recipt',[HotelController::class,'print_recipt'])->name('printr');
 //checkout client
 Route::get('/clients/checkin-out/{id}',[HotelController::class,'checkins_out'])->name('checkin.out');
 Route::get('/clients/search',[HotelController::class,'searchquery'])->name('searchquery');
 //get room expiry
 Route::get('/client/get_time_out',[HotelController::class,'get_time_out'])->name('getroomexpiry');

 //rooms
 Route::get('/hotels-branches/rooms-gethours',[HotelController::class,'gethours'])->name('htl.gethrs');
 Route::get('/hotels-branches/rooms/{id}',[HotelController::class,'rooms'])->name('htl.room');
 Route::get('/hotels-branches/rooms-create',[HotelController::class,'rooms_create'])->name('htlroom.create');
 Route::post('/hotels-branches/rooms/store',[HotelController::class,'store_room'])->name('htlroom.store');
 Route::get('/hotels-branches/rooms/{id}/edit',[HotelController::class,'edit_room'])->name('htlroom.edit');
 Route::post('/hotels-branches/rooms/update/{id}',[HotelController::class,'update_room'])->name('htlroom.update');
 Route::get('/hotels-branches/rooms/delete/{id}',[HotelController::class,'delete_room'])->name('htlroom.delete');
 Route::get('/hotels-branches/rooms-duration/delete/{id}',[HotelController::class,'delete_room_duration'])->name('htlroomdura.delete');
 Route::get('/hotels-branches/rooms-images/delete/{id}',[HotelController::class,'delete_room_image'])->name('htlroomdimage.delete');
 Route::get('/hotels-branches/rooms-features/delete/{id}',[HotelController::class,'delete_room_features'])->name('htlroomfeatures.delete');

 Route::get('booking-options',[HotelController::class,'bookingopt_index'])->name('bkopt');
 Route::post('booking-options/store',[HotelController::class,'bookingopt_store'])->name('bkopt.store');
 Route::post('booking-options/update',[HotelController::class,'bookingopt_update'])->name('bkopt.update');
 Route::get('booking-options/delete/{id}',[HotelController::class,'bookingopt_delete'])->name('bkopt.delete');
});



