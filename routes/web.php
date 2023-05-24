<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\productController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\staffbuyerController;
use App\Http\Controllers\staffsellerController;
use App\Http\Controllers\staffproductsController;
use App\Http\Controllers\staffpaymentController;
use App\Http\Controllers\staffQuotationController;



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

Route::get('admin_login', function () {
    return view('auth.login');
});

Route::get('/Sales_login',[salesController::class,'login']);

Route::post('/saleslogin',[salesController::class,'saleslogin']); 

Route::get('/Logout', function () {
    auth()->Logout();
    Session()->flush();
    return Redirect::to('/Sales_login');
})->name('Logout');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
 Route::get('/Dashboard',[sellerController::class,'index']);  
   
    
 Route::get('/addbuyer',[userController::class,'show']);
 Route::post('/savebuyer',[userController::class,'savebuyer']);
 Route::get('/listbuyer',[userController::class,'listbuyer']);
 Route::get('/update_status/{id}', [userController::class, 'update_status']);
 Route::get('/editbuyer/{id}', [userController::class, 'editbuyer']);
 Route::put('/updatebuyer/{id}', [userController::class, 'updatebuyer']);
 Route::get('/deletebuyer/{id}', [userController::class, 'deletebuyer']);
 
 Route::get('/addseller',[sellerController::class,'show']);
 Route::post('/saveseller',[sellerController::class,'saveseller']);
 Route::get('/listtsellers',[sellerController::class,'listtsellers']);
 Route::get('/update_sellerstatus/{id}', [sellerController::class, 'update_sellerstatus']);
  Route::get('/editseller/{id}', [sellerController::class, 'editseller']);
 Route::put('/updateseller/{id}', [sellerController::class, 'updateseller']);
 Route::get('/deleteseller/{id}', [sellerController::class, 'deleteseller']);
 
  Route::get('/addstaff',[staffController::class,'show']);
 Route::post('/savestaff',[staffController::class,'savestaff']);
 Route::get('/liststaff',[staffController::class,'liststaff']);
 Route::get('/update_staffstatus/{id}', [staffController::class, 'update_staffstatus']);
  Route::get('/editstaff/{id}', [staffController::class, 'editstaff']);
 Route::put('/updatestaff/{id}', [staffController::class, 'updatestaff']);
 Route::get('/deletestaff/{id}', [staffController::class, 'deletestaff']);
 
 
  Route::get('/listproduct',[productController::class,'listproduct']);
 
 
 
   Route::get('/addpayment',[paymentController::class,'show']);
 Route::post('/savepayment',[paymentController::class,'savepayment']);
 Route::get('/listpayment',[paymentController::class,'listpayment']);
 Route::get('/update_paymentstatus/{id}', [paymentController::class, 'update_paymentstatus']);
  Route::get('/editpayment/{id}', [paymentController::class, 'editpayment']);
 Route::put('/updatepayment/{id}', [paymentController::class, 'updatepayment']);
 Route::get('/deletepayment/{id}', [paymentController::class, 'deletepayment']);
 
 
    Route::get('/addpurchase',[purchaseController::class,'show']);
 Route::post('/savepurchase',[purchaseController::class,'savepurchase']);
 Route::get('/listpurchase',[purchaseController::class,'listpurchase']);
 Route::get('/update_purchstatus/{id}', [purchaseController::class, 'update_purchstatus']);
  Route::get('/editpurchase/{id}', [purchaseController::class, 'editpurchase']);
 Route::put('/updatepurchase/{id}', [purchaseController::class, 'updatepurchase']);
 Route::get('/deletepurchase/{id}', [purchaseController::class, 'deletepurchase']);
 
 Route::get('/listfeedback',[FeedbackController::class,'listfeedback']);
 Route::get('/listfeed/{id}', [FeedbackController::class, 'listfeed']);

 Route::get('/listQuatation',[FeedbackController::class,'listQuatation']);
 Route::get('/list/{seller_id}', [FeedbackController::class, 'list']);
    Route::get('/addQuatation',[FeedbackController::class,'show']);
 Route::post('/saveQuotation',[FeedbackController::class,'saveQuotation']);
 Route::get('/editproduct/{id}', [FeedbackController::class, 'editproduct']);
 Route::put('/updateproduct/{id}', [FeedbackController::class, 'updateproduct']);
 Route::get('/deleteproduct/{id}', [FeedbackController::class, 'deleteproduct']);
 


 Route::get('/notifications',[NotificationController::class,'notifications']);
 Route::get('/listnotify',[NotificationController::class,'listnotify']);
 Route::post('/savenotify', [NotificationController::class, 'send']);



   Route::get('/addproduct',[productController::class,'show']);
 Route::post('/saveproduct',[productController::class,'saveproduct']);
 Route::get('/listproduct/{seller_id}',[productController::class,'listproduct']);
Route::get('/listsells', [productController::class, 'listsells']);

});








 Route::get('/addstaffbuyer',[staffbuyerController::class,'add']);
 Route::post('/savestaffbuyer',[staffbuyerController::class,'savebuyer']);
 Route::get('/liststaffbuyer',[staffbuyerController::class,'listbuyer']);
 Route::get('/updatestaff_status/{id}', [staffbuyerController::class, 'update_status']);
 Route::get('/editstaffbuyer/{id}', [staffbuyerController::class, 'editbuyer']);
 Route::put('/updatestaffbuyer/{id}', [staffbuyerController::class, 'updatebuyer']);
 Route::get('/deletestaffbuyer/{id}', [staffbuyerController::class, 'deletebuyer']);


 Route::get('/addstaffseller',[staffsellerController::class,'show']);
 Route::post('/savestaffseller',[staffsellerController::class,'saveseller']);
 Route::get('/liststaffseller',[staffsellerController::class,'listseller']);
 Route::get('/updatestaff_sellerstatus/{id}', [staffsellerController::class, 'update_sellerstatus']);
  Route::get('/editstaffseller/{id}', [staffsellerController::class, 'editseller']);
 Route::put('/updatestaffseller/{id}', [staffsellerController::class, 'updateseller']);
 Route::get('/deletestaffseller/{id}', [staffsellerController::class, 'deleteseller']);


//   Route::get('/addstaffproduct',[staffproductController::class,'show']);
//  Route::post('/savestaffproduct',[staffproductController::class,'saveproduct']);
  Route::get('/liststaffproduct/{seller_id}',[staffproductsController::class,'liststaffproduct']);
 Route::get('/listseller',[staffproductsController::class,'listseller']);
  
//  Route::get('/editstaffproduct/{id}', [staffproductController::class, 'editproduct']);
//  Route::put('/updatestaffproduct/{id}', [staffproductController::class, 'updateproduct']);
//  Route::get('/deletestaffproduct/{id}', [staffproductController::class, 'deleteproduct']);
 

 Route::get('/addstaffpayment',[staffpaymentController::class,'show']);
 Route::post('/savestaffpayment',[staffpaymentController::class,'savepayment']);
 Route::get('/liststaffpayment',[staffpaymentController::class,'listpayment']);
 Route::get('/updatestaff_paymentstatus/{id}', [staffpaymentController::class, 'update_paymentstatus']);
  Route::get('/editstaffpayment/{id}', [staffpaymentController::class, 'editpayment']);
 Route::put('/updatestaffpayment/{id}', [staffpaymentController::class, 'updatepayment']);
 Route::get('/deletestaffpayment/{id}', [staffpaymentController::class, 'deletepayment']);


 Route::get('/listsellers',[staffQuotationController::class,'listsellers']);
Route::get('/liststaffQuotation/{seller_id}',[staffQuotationController::class,'liststaffQuotation']);



Route::get('/liststafffeedback',[FeedbackController::class,'liststafffeedback']);
 Route::get('/liststafffeed/{id}', [FeedbackController::class, 'liststafffeed']);



 Route::get('/liststaffnotify',[NotificationController::class,'liststaffnotify']);












// Route::get('/logout', function () {
//     auth()->logout();
//     Session()->flush();
//     return Redirect::to('/admin_login');
// })->name('logout');


