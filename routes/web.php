<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\SubscriptionPlanController;

use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\BuyerLoginController;

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/ourcategories', [PagesController::class, 'ourcategories'])->name('ourcategories');
Route::get('/buyer_register', [PagesController::class, 'buyerRegister'])->name('buyer.register');
Route::get('/seller_register', [PagesController::class, 'sellerRegister'])->name('seller.register');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/mostpopularslide1', [PagesController::class, 'mostPopularSlide1'])->name('mostpopularslide1');
Route::get('/team', [PagesController::class, 'team'])->name('team');
Route::get('/testimonial', [PagesController::class, 'testimonial'])->name('testimonial');
Route::get('/whatwedo', [PagesController::class, 'whatWeDo'])->name('whatwedo');
Route::get('/pricing', [PagesController::class, 'pricing'])->name('pricing');
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-condition', [PagesController::class, 'termsCondition'])->name('terms.condition');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'contactSubmit'])->name('contact.submit');
// Listing is moved below with subscription gate
Route::get('/seller/login', [SellerLoginController::class, 'showLoginForm'])->name('seller.login');
// Route::post('/seller/login', [SellerLoginController::class, 'login']);
Route::get('/buyer/login', [BuyerLoginController::class, 'showLoginForm'])->name('buyer.login');
// Route::post('/buyer/login', [BuyerLoginController::class, 'login']);
Route::post('/buyer/register/store', [BuyerLoginController::class, 'register'])->name('buyer.register.store');
Route::post('/seller/register/store', [SellerLoginController::class, 'register'])->name('seller.register.store');
Route::post('/verify-otp', [BuyerLoginController::class, 'verifyOtp'])->name('buyer.verify.otp');
Route::post('/check-phone', [SellerLoginController::class, 'checkPhone'])->name('seller.check.phone');
Route::post('buyer/otp/send', [BuyerLoginController::class, 'otpSend'])->name('buyer.otp.send');
Route::post('buyer/otp/login', [BuyerLoginController::class, 'login'])->name('buyer.otp.login');
Route::post('buyer/dashboard', [BuyerLoginController::class, 'login'])->name('buyer.dashboard');
Route::post('seller/otp/send', [SellerLoginController::class, 'otpSend'])->name('seller.otp.send');
Route::post('seller/otp/login', [SellerLoginController::class, 'login'])->name('seller.otp.login');
Route::post('seller/dashboard', [SellerLoginController::class, 'login'])->name('seller.dashboard');
Route::get('/seller/profile', [SellerLoginController::class, 'profile'])->name('seller.profile');
Route::post('/seller/logout', [SellerLoginController::class, 'logout'])->name('seller.logout');
Route::post('/buyer/logout', [BuyerLoginController::class, 'logout'])->name('buyer.logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// });

// require __DIR__.'/auth.php';
// require __DIR__.'/admin.php';



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login/check', [LoginController::class, 'loginCheck'])->name('login.check');

    Route::middleware(['admin'])->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    

    Route::resource('subscription-plans', SubscriptionPlanController::class);
    Route::patch('subscription-plans/{subscriptionPlan}/toggle-status', [SubscriptionPlanController::class, 'toggleStatus'])->name('subscription-plans.toggle-status');


    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('buyers', [BuyerController::class, 'buyers'])->name('buyers');
    Route::get('buyer/view/{id}', [BuyerController::class, 'buyersView'])->name('buyer.view');
    Route::patch('buyer/{buyer}/approve', [BuyerController::class, 'updateBuyerApproval'])->name('buyer.approval');

    Route::get('sellers', [AdminController::class, 'sellers'])->name('sellers');
    Route::get('sellers/{id}', [AdminController::class, 'sellersView'])->name('seller.view');
    Route::get('plans', [AdminController::class, 'plans'])->name('plans');

    Route::get('enquiries', [AdminController::class, 'enquiries'])->name('enquiries');
    Route::get('/approved/sellers', [AdminController::class, 'sellers'])->name('sellers.approved');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/password', [AdminController::class, 'updateProfilePassword'])->name('profile.password');


    Route::get('/products', [ProductController::class, 'index'])->name('products');
     Route::get('/orders', [ProductController::class, 'orders'])->name('orders');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::patch('/products/{product}/status', [ProductController::class, 'updateStatus'])->name('products.status');
    Route::get('admin/sellers/{seller}/products', [ProductController::class, 'sellerProducts'])->name('seller.products');
    Route::patch('admin/sellers/{seller}/approve', [AdminController::class, 'updateSellerApproval'])->name('sellers.approval');
    Route::get('enquiry/view/{id}', [AdminController::class, 'viewEnquiry'])->name('enquiry.view');
    Route::patch('enquiry/status/{enquiry}', [AdminController::class, 'updateEnquiryStatus'])->name('enquiry.status');
    Route::get('enquiry/delete/{id}', [AdminController::class, 'deleteEnquiry'])->name('enquiry.delete');

    // Contact Messages
    Route::get('contact-messages', [AdminController::class, 'contactMessages'])->name('contact-messages.index');
    Route::get('contact-messages/{id}', [AdminController::class, 'contactMessageView'])->name('contact-messages.view');
    Route::delete('contact-messages/{id}', [AdminController::class, 'contactMessageDelete'])->name('contact-messages.delete');

    Route::get('/notifications/all', [NotificationController::class, 'allAdmin'])->name('notifications.all');
    Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsReadAdmin'])->name('notifications.read');

});
    // Route::middleware('auth:admin')->group(function () {
    //     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //     Route::get('users', [AdminController::class, 'users'])->name('users');
    //     Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    // });
    // Add more admin routes here
});
    Route::get('seller/notifications/all', [NotificationController::class, 'all'])->name('seller.notifications.all');


Route::middleware(['seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('dashboard');
    // Product-related screens require active subscription
    Route::middleware('subscribed')->group(function () {
        Route::resource('products', \App\Http\Controllers\Seller\ProductController::class);
        Route::get('inquiries', [\App\Http\Controllers\Seller\InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/view/{id}', [\App\Http\Controllers\Seller\InquiryController::class, 'view'])->name('inquiries.view');
    });
    Route::get('update-approval/{id}', [\App\Http\Controllers\Seller\InquiryController::class, 'updateApproval'])->name('enquiry.approved');
    Route::get('/chat/{id}', [\App\Http\Controllers\Seller\InquiryController::class, 'chatPage'])->name('chat');
    Route::post('/chat/send', [\App\Http\Controllers\Seller\InquiryController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{id}', [\App\Http\Controllers\Seller\InquiryController::class, 'fetchMessages'])->name('chat.fetch');
    Route::get('/plan', [\App\Http\Controllers\Seller\DashboardController::class, 'plan'])->name('plan.index');
    Route::get('orders', [\App\Http\Controllers\Seller\DashboardController::class, 'orders'])->name('orders.index');
    Route::get('payments', [\App\Http\Controllers\Seller\DashboardController::class, 'paymentHistory'])->name('payments.index');
       
    Route::post('/update-inquiry-status', [App\Http\Controllers\Seller\InquiryController::class, 'updateInquiryStatus'])->name('update.inquiry.status');
    
    Route::get('profile/edit', [\App\Http\Controllers\Seller\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [\App\Http\Controllers\Seller\ProfileController::class, 'update'])->name('profile.update');
    Route::post('update/bank_details', [\App\Http\Controllers\Seller\ProfileController::class, 'updateBankDetail'])->name('update.bank.details');
    Route::post('address/store', [\App\Http\Controllers\Seller\ProfileController::class, 'addressStore'])->name('address.store');

//     Route::get('/ping', function () {
//     return response()->json(['status' => 'ok', 'time' => now()]);
// })->name('your.route.name');
});

Route::middleware(['buyer'])->prefix('buyer')->name('buyer.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Buyer\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile/edit', [\App\Http\Controllers\Buyer\ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/chat/{id}', [\App\Http\Controllers\Buyer\InquiryController::class, 'chatPage'])->name('chat');
    Route::post('/chat/send', [\App\Http\Controllers\Buyer\InquiryController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{id}', [\App\Http\Controllers\Buyer\InquiryController::class, 'fetchMessages'])->name('chat.fetch');
    Route::get('/category', [\App\Http\Controllers\Buyer\DashboardController::class, 'category'])->name('category.index');
    Route::get('/category/product{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'categoryProduct'])->name('category.product');
    Route::get('/products/details{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'productDetails'])->name('products.details');

    // Route::put('address/store', [\App\Http\Controllers\Buyer\ProfileController::class, 'addressStore'])->name('address.store');
    Route::post('address/store', [\App\Http\Controllers\Buyer\ProfileController::class, 'addressStore'])->name('address.store');
    Route::put('profile/update', [\App\Http\Controllers\Buyer\ProfileController::class, 'update'])->name('profile.update');
    Route::post('update/bank_details', [\App\Http\Controllers\Buyer\ProfileController::class, 'updateBankDetail'])->name('update.bank.details');
    Route::get('inquiries', [\App\Http\Controllers\Buyer\DashboardController::class, 'inquiries'])->name('inquiries.index');
    Route::get('inquiry/view/{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'viewInquiry'])->name('inquiry.view');
    Route::post('/update-address/{id}', [\App\Http\Controllers\Buyer\ProfileController::class, 'updateInquiryAddress'])->name('updateAddress');
    // Route::get('orders/pay/{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'payOrder'])->name('orders.pay');
    Route::post('orders/pay/{id}', [\App\Http\Controllers\StripeController::class, 'payOrder'])->name('orders.pay');
    Route::get('orders', [\App\Http\Controllers\Buyer\DashboardController::class, 'orders'])->name('orders.index');
    Route::get('wishlist', [\App\Http\Controllers\Buyer\DashboardController::class, 'wishlist'])->name('wishlist.index');
    Route::get('payments', [\App\Http\Controllers\Buyer\DashboardController::class, 'paymentHistory'])->name('payments.index');
    Route::get('order/payments', [\App\Http\Controllers\Buyer\DashboardController::class, 'orderPaymentHistory'])->name('order.payments.index');

    Route::get('/notifications/all', [NotificationController::class, 'allBuyer'])->name('notifications.all');
    Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');

    // Add other buyer routes here
});

// Product pages
Route::get('/products/filter', [\App\Http\Controllers\PagesController::class, 'filter'])->name('products.filter');

Route::middleware('subscribed')->group(function () {
    // Guests can still access; middleware only redirects logged-in users without subscription
    Route::get('products/{product}', [\App\Http\Controllers\PagesController::class, 'productDetails'])->name('products.details');
    Route::get('listing', [\App\Http\Controllers\PagesController::class, 'listing'])->name('listing');
    Route::post('products/{product}/enquiry', [\App\Http\Controllers\PagesController::class, 'submitEnquiry'])->name('products.enquiry');
});
Route::post('/stripe/charge', [StripeController::class, 'charge'])->name('stripe.charge');
Route::post('subscription/{id}/renew', [StripeController::class, 'renew'])->name('subscription.renew');
Route::post('/subscription/free', [StripeController::class, 'freeSubscription'])->name('subscription.free');


// Wishlist routes
Route::post('wishlist/add/{product}', [\App\Http\Controllers\WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('wishlist/remove/{product}', [\App\Http\Controllers\WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('wishlist/check/{product}', [\App\Http\Controllers\WishlistController::class, 'checkWishlistStatus'])->name('wishlist.check');
Route::get('wishlist/count', [\App\Http\Controllers\WishlistController::class, 'getWishlistCount'])->name('wishlist.count');



Route::get('/notifications/all', [NotificationController::class, 'all'])->name('notifications.all');
Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');