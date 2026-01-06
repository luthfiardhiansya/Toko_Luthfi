<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MidtransNotificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/products/{slug}', [CatalogController::class, 'show'])->name('catalog.show');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.destroy');
});

Route::middleware(['auth', 'admin'])
->prefix('admin')
->name('admin.')
->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/product/{slug}', [CatalogController::class, 'show'])->name('catalog.show');
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/sales/export', [ReportController::class, 'exportSales'])->name('reports.export-sales');
});

Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/google', 'redirect')
    ->name('auth.google');
    
    Route::get('/auth/google/callback', 'callback')
    ->name('auth.google.callback');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/orders/{order}/pay', [OrderController::class, 'show'])
    ->name('orders.pay');
    Route::get('/orders/{order}/success', [OrderController::class, 'success'])
    ->name('orders.success');
    Route::get('/orders/{order}/pending', [OrderController::class, 'pending'])
    ->name('orders.pending');
});

Route::post('midtrans/notification', [MidtransNotificationController::class, 'handle'])
->name('midtrans.notification');

Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');