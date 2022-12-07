<?php

use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\LocationComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\Users\UserComponent;
use App\Http\Controllers\InvoiceController;
use App\Http\Livewire\Admin\AdminComponent;
use App\Http\Livewire\ServiceViewComponent;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ThankyouController;
use App\Http\Livewire\ServiceDetailComponent;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\Admin\AddServiceCategory;
use App\Http\Livewire\Admin\AddSliderComponent;
use App\Http\Livewire\Service\ServiceComponent;
use App\Http\Livewire\Admin\AddServiceComponent;
use App\Http\Livewire\Admin\AdminReplyComponent;
use App\Http\Livewire\Admin\EditServiceCategory;
use App\Http\Livewire\Admin\EditSliderComponent;
use App\Http\Livewire\Admin\AdminServiceCategory;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Admin\EditServiceComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminServiceComponent;
use App\Http\Livewire\Admin\ServicesByCategoryComponent;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/category', CategoryComponent::class)->name('category');
Route::get('/serviceByCategory/{category_slug}', ServiceViewComponent::class)->name('serviceByCategory');
Route::get('/serviceDetails/{service_slug}', ServiceDetailComponent::class)->name('serviceDetails');

Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/searchServices', [SearchController::class, 'searchServices'])->name('searchServices');

// Route::get('/location', LocationComponent::class)->name('location');
// Route::get('/changeLocation', ChangeLocationComponent::class)->name('changeLocation');

// Route::get('/contactUs', ContactComponent::class)->name('contactUs');

// Route::get('/checkout/{slug}', CheckoutComponent::class)->name('checkout');
// Route::get('/checkout/{slug}', [CheckoutController::class, 'checkout'])->name('checkout');
// Route::post('/onlinePayment', [CheckoutController::class, 'onlinePayment'])->name('onlinePayment');
// Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('placeOrder');
// Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
// Route::get('/thankyou', [ThankyouController::class, 'index'])->name('thankyou');
// Route::get('/downloadInvoice/{id}', [InvoiceController::class, 'index'])->name('downloadInvoice');

Route::middleware(['auth:sanctum', 'verified', 'admin_auth'])->group(function () {
    Route::get('/admin', AdminComponent::class)->name('admin');
    Route::get('/admin/category', AdminServiceCategory::class)->name('admin/category');
    Route::get('/admin/add_category', AddServiceCategory::class)->name('admin/add_category');
    Route::get('/admin/edit_category/{categoryId}', EditServiceCategory::class)->name('admin/edit_category');
    Route::get('/admin/services', AdminServiceComponent::class)->name('admin/services');
    Route::get('/admin/addServices', AddServiceComponent::class)->name('admin/addServices');
    Route::get('/admin/editServices/{service_id}', EditServiceComponent::class)->name('admin/editServices');
    
    Route::get('/admin/serviceByCategory/{category_slug}', ServicesByCategoryComponent::class)->name('admin/serviceByCategory');

    Route::get('/admin/adminContactUs', AdminContactComponent::class)->name('admin/adminContactUs');
    Route::get('/admin/replyContact/{contId}', AdminReplyComponent::class)->name('admin/replyContact');

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin/slider');
    Route::get('/admin/addSlider', AddSliderComponent::class)->name('admin/addSlider');
    Route::get('/admin/editSlider/{slide_id}', EditSliderComponent::class)->name('admin/editSlider');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', UserComponent::class)->name('dashboard');

    Route::get('/checkout/{slug}', CheckoutComponent::class)->name('checkout');
    // Route::get('/checkout/{slug}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/onlinePayment', [CheckoutController::class, 'onlinePayment'])->name('onlinePayment');
    Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('placeOrder');

    Route::get('/thankyou', [ThankyouController::class, 'index'])->name('thankyou');
    Route::get('/downloadInvoice/{id}', [InvoiceController::class, 'index'])->name('downloadInvoice');

    Route::get('/location', LocationComponent::class)->name('location');
    Route::get('/changeLocation', ChangeLocationComponent::class)->name('changeLocation');

    Route::get('/contactUs', ContactComponent::class)->name('contactUs');
});


Route::middleware(['auth:sanctum', 'verified', 'sp_auth'])->group(function () {
    Route::get('/service/dashboard', ServiceComponent::class)->name('service/dashboard');
});

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });