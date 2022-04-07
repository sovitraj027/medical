<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.index')->name('dashboard');
    
    //user module
    Route::resource('/users',UserController::class);


    Route::view('/admin/invoice', 'invoice.generateInvoice');
    Route::view('/register/user', 'auth.register')->name('register-user');
    Route::get('/manage/user', 'ManualAuth\RegisterController@showUser')->name('manage-user');
    Route::post('/register/user', 'ManualAuth\RegisterController@register')->name('user-register');

//    Route::resource('medicine', 'MedicineController');
    Route::get('medicine', 'MedicineController@index')->name('medicine');
    Route::post('medicine', 'MedicineController@store')->name('store-medicine');
    Route::get('/medicine/view', 'MedicineController@viewMedicine')->name('view-medicine');
    Route::post('/medicine/store', 'MedicineStockController@stockStore')->name('add-medicine-stock');
    Route::post('/generate/invoice', 'MedicineStockController@createInvoice')->name('create_invoice');
    Route::resource('/medicines',MedicineController::class);
    

    //manufacturer
    Route::post('medicine-manufacturer', 'MedicineManufacturerController@store')->name('medicine-manufacturer');
    Route::get('/manufacturer', 'MedicineManufacturerController@index')->name('manufacturer-list');
    Route::resource('/manufacture',MedicineManufacturerController::class);

    //invoice
    Route::get('/invoices', 'InvoiceBillController@createInvoices')->name('invoice');
    Route::get('/refundinvoices', 'InvoiceBillController@refundInvoices')->name('refund');

    //search
    Route::get('/search', 'SearchMedicineController@index')->name('search');
    Route::get('/stock', 'SearchMedicineController@stock')->name('stock');
    Route::get('/search/medicine', 'SearchMedicineController@search')->name('search-medicine');
    Route::get('/search/stock', 'SearchMedicineController@getstock')->name('search-stock');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');


