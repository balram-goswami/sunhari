<?php
use Illuminate\Support\Facades\{
    Route, 
    Artisan
};
use App\Http\Controllers\Customer\{
    CustomerController
};

// Customer
Route::get('customerdashboard', [CustomerController::class, 'index'])->name('customer.index');
Route::get('customerProfile', [CustomerController::class, 'customerProfile'])->name('customerProfile');
Route::get('customerOrders', [CustomerController::class, 'customerOrders'])->name('customerOrders');
Route::get('updateUserDetails', [CustomerController::class, 'updateUserDetails'])->name('updateUserDetails');
Route::post('coustomerDetailsUpdate/{id}', [CustomerController::class, 'coustomerDetailsUpdate'])->name('coustomerDetailsUpdate');