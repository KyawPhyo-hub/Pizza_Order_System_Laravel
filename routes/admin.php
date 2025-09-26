<?php

use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\CustomerDashboard;
use App\Http\Controllers\admin\OrderManageController;
use App\Http\Controllers\Admin\AuthorizationController;
use App\Http\Controllers\Admin\BookingManageController;
use App\Http\Controllers\Admin\AdminDashboardController;
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    //Admin Dashboard
    Route::get('/home', [AdminDashboardController::class, 'home'])->name('adminHome');
    //Category
    Route::prefix('categories')->group(function(){
        Route::get('/categories/create',[CategoryController::class,'categoryHome'])->name('adminCategoryHome');
        Route::post('/categories/store',[CategoryController::class,'categoryStore'])->name('adminCategoryStore');
        Route::get('/categoories/delete,{id}',[CategoryController::class,'categoryDelete'])->name('adminCategoryDelete');
    });

    //Manage pizza
    Route::prefix('pizza')->group(function () {
        Route::get('/add',[CategoryController::class,'addmenu'])->name('adminAddMenu');
        Route::post('/store',[CategoryController::class,'storePizza'])->name('adminStorePizza');
        Route::get('/list',[CategoryController::class,'pizzaList'])->name('adminPizzaList');
        Route::get('/view/{id}',[CategoryController::class,'viewPizza'])->name('adminViewPizza');
        Route::get('/update/{id}',[CategoryController::class,'updatePizza'])->name('adminUpdatePizza');
        Route::post('/update/{id}',[CategoryController::class,'updatePizzaStore'])->name('adminUpdatePizzaStore');
        Route::get('/delete/{id}',[CategoryController::class,'deletePizza'])->name('adminDeletePizza');
    });

    //Wine
    Route::prefix('softdrink')->group(function(){
        Route::get('/create',[CategoryController::class,'createsoftdrink'])->name('adminCreateSoftDrink');
        Route::post('/store',[CategoryController::class,'storeSoftDrink'])->name('adminStoreSoftDrink');
        Route::get('/list',[CategoryController::class,'softDrinkList'])->name('adminSoftDrinkList');
        Route::get('/view/{id}',[CategoryController::class,'viewSoftDrink'])->name('adminViewSoftDrink');
        Route::get('/update/{id}',[CategoryController::class,'updateSoftDrink'])->name('adminUpdateSoftDrink');
        Route::post('/update/{id}',[CategoryController::class,'storeUpdateSoftDrink'])->name('adminStoreUpdateSoftDrink');
        Route::get('/delete/{id}',[CategoryController::class,'deleteSoftDrink'])->name('adminDeleteSoftDrink');
    });

    //Dessert
    Route::prefix('dessert')->group(function(){
        Route::get('/create',[CategoryController::class,'createDessertPage'])->name('adminCreateDessertPage');
        Route::post('/store',[CategoryController::class,'storeDessert'])->name('adminStoreDessert');
        Route::get('/list',[CategoryController::class,'dessertList'])->name('adminDessertList');
        Route::get('/view/{id}',[CategoryController::class,'viewDessert'])->name('adminViewDessert');
        Route::get('/update/{id}',[CategoryController::class,'updateDessert'])->name('adminUpdateDessert');
        Route::post('/update/{id}',[CategoryController::class,'storeUpdateDessert'])->name('adminStoreUpdateDessert');
        Route::get('/delete/{id}',[CategoryController::class,'deleteDessert'])->name('adminDeleteDessert');
    });

    //Combo
    Route::prefix('combo')->group(function(){
        Route::get('/create',[ComboController::class,'createCombo'])->name('adminCreateCombo');
        Route::post('/store',[ComboController::class,'storeCombo'])->name('adminStoreCombo');
        Route::get('/view/{id}',[ComboController::class,'viewCombo'])->name('adminViewCombo');
        Route::get('/list',[ComboController::class,'comboList'])->name('adminComboList');
        Route::get('/update/{id}',[ComboController::class,'updateCombo'])->name('adminUpdateCombo');
        Route::post('/update/{id}',[ComboController::class,'storeUpdateCombo'])->name('adminStoreUpdateCombo');
        Route::get('/delete/{id}',[ComboController::class,'deleteCombo'])->name('adminDeleteCombo');
    });

    //Toppings
    Route::prefix('toppings')->group(function(){
        Route::get('/create',[CategoryController::class,'createTopping'])->name('adminCreateTopping');
        Route::post('/store',[CategoryController::class,'storeTopping'])->name('adminStoreTopping');
        Route::get('/update/{id}',[CategoryController::class,'updateTopping'])->name('adminUpdateTopping');
        Route::post('/update/{id}',[CategoryController::class,'storeUpdateTopping'])->name('adminStoreUpdateTopping');
        Route::get('/delete/{id}',[CategoryController::class,'deleteTopping'])->name('adminDeleteTopping');
    });

    //Manage Profile
    Route::prefix('profile')->group(function(){
        Route::get('/view',[ProfileController::class,'viewProfile'])->name('adminViewProfile');
        Route::post('/update',[ProfileController::class,'updateProfile'])->name('adminUpdateProfile');
        Route::get('/change-password',[ProfileController::class,'changePasswordPage'])->name('adminChangePasswordPage');
        Route::post('/change-password',[ProfileController::class,'changePassword'])->name('adminChangePassword');

    });

    //User Authorization
    Route::prefix('authuser')->group(function(){
        Route::get('/admin/create',[AuthorizationController::class,'createAdminPage'])->name('createAdminPage');
        Route::post('/admin/store',[AuthorizationController::class,'storeAdmin'])->name('storeAdmin');
        Route::get('/admin/list',[AuthorizationController::class,'adminList'])->name('viewAdminList');
        Route::get('/admin/delete/{id}',[AuthorizationController::class,'deleteAdmin'])->name('deleteAdmin');
        Route::get('/roleChange/{id}',[AuthorizationController::class,'roleChange'])->name('roleChange');

        Route::get('/user/list',[AuthorizationController::class,'userList'])->name('viewUserList');

    });

    //payment
    Route::prefix('payment')->group(function(){
        Route::get('/home',[PaymentController::class,'paymentHome'])->name('adminPaymentHome');
        Route::post('/store',[PaymentController::class,'storePayment'])->name('adminStorePayment');
    });

    //manage Order
    Route::prefix('orders')->group(function(){
        Route::get('/today/order/list',[OrderManageController::class,'todayOrder'])->name('adminTodayOrderList');
        Route::get('/weekly/order/list',[OrderManageController::class,'weeklyOrder'])->name('adminWeeklyOrderList');
        Route::get('/monthly/order/list',[OrderManageController::class,'monthlyOrder'])->name('adminMonthlyOrderList');
        Route::get('/overall/order/list',[OrderManageController::class,'overallOrder'])->name('adminOverallOrderList');
        Route::get('/details/{id}',[OrderManageController::class,'orderDetails'])->name('adminOrderDetails');
        Route::post('/status/update',[OrderManageController::class,'updateStatus'])->name('adminUpdateOrderStatus');
    });

    //manage Booking
    Route::prefix('bookings')->group(function(){
        Route::get('/today/booking/list',[BookingManageController::class,'todayBooking'])->name('adminTodayBookingList');
        Route::get('/weekly/booking/list',[BookingManageController::class,'weeklyBooking'])->name('adminWeeklyBookingList');
        Route::get('/monthly/booking/list',[BookingManageController::class,'monthlyBooking'])->name('adminMonthlyBookingList');
        Route::get('/overall/booking/list',[BookingManageController::class,'overallBooking'])->name('adminOverallBookingList');
        Route::post('/status/update', [BookingManageController::class, 'updateStatus'])->name('adminUpdateBookingStatus');
        Route::get('/details/{id}', [BookingManageController::class, 'bookingDetails'])->name('adminBookingDetails');

    });


});