<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CustomerDashboard;
use App\Http\Controllers\Customer\ProfileController;
Route::group(['prefix'=>'customer','middleware'=>['auth','user']],function(){
    //Customer Home Direct
    Route::get('/home', [CustomerDashboard::class, 'home'])->name('customerHome');
    //Menu Direct
    Route::get('/menu',[CustomerDashboard::class, 'menu'])->name('customerMenu');
    //Reservation Direct
    Route::get('/reservation',[CustomerDashboard::class, 'reservation'])->name('customerReservation');
    Route::post('/reservation/store',[CustomerDashboard::class, 'storeReservation'])->name('customerStoreReservation');
    Route::get('/booking/list',[CustomerDashboard::class, 'bookingList'])->name('customerBookingList');
    //Cart Direct
    Route::get('/cart',[CustomerDashboard::class, 'cart'])->name('customerCart');
    Route::get('/cart/details/{id}/{category}',[CartController::class, 'cartDetails'])->name('customerCartDetails');
    Route::post('/cart/add',[CartController::class, 'addToCart'])->name('customerAddToCart');
    Route::get('/cart/toppings/{id}', [CartController::class, 'chooseToppings'])->name('toppingPage');
    Route::post('/cart/add/toppings',[CartController::class, 'addTopping'])->name('customerAddTopping');
    Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cartRemove');

    //Order
    Route::group(['prefix'=>'order'],function(){
        Route::post('/store',[OrderController::class, 'storeOrder'])->name('customerStoreOrder');
        Route::get('/choose-delivery/{orderId}',[OrderController::class, 'chooseDeliveryPage'])->name('customerChooseDelivery');
        Route::post('/choose-delivery',[OrderController::class, 'storeDeliveryType'])->name('customerStoreDeliveryType');
        Route::get('/payment/{orderId}',[OrderController::class, 'paymentPage'])->name('customerPaymentPage');
        Route::post('/payment',[OrderController::class, 'storePayment'])->name('customerStorePayment');
        Route::get('/list',[OrderController::class, 'orderList'])->name('customerOrderList');
        Route::get('/details/{orderId}',[OrderController::class, 'orderDetails'])->name('customerOrderDetails');
    });

    //profile
    Route::group(['prefix'=>'profile'],function(){
        Route::get('/',[ProfileController::class, 'profile'])->name('customerProfile');
        Route::post('/update',[ProfileController::class, 'updateProfile'])->name('customerUpdateProfile');
        Route::get('/change-password',[ProfileController::class, 'changePasswordPage'])->name('customerChangePasswordPage');
        Route::post('/change-password',[ProfileController::class, 'changePassword'])->name('customerChangePassword');
    });

    //Chefs Direct
    Route::get('/chefs', [CustomerDashboard::class, 'chefs'])->name('customerChefs');
    //about direct
    Route::get('/about', [CustomerDashboard::class, 'cusAbout'])->name('customerAbout');
    //contact direct
    Route::get('/contact', [CustomerDashboard::class, 'contact'])->name('customerContact');
    //location direct
    Route::get('/location', [CustomerDashboard::class, 'location'])->name('customerLocation');
});