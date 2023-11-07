<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IdentityVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController as AuthPropertyController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TierController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\HomepageController;
use App\Http\Controllers\Website\PropertyController;
use App\Http\Controllers\Website\SellController;
use App\Http\Controllers\Website\TermsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomepageController::class)->name('homepage');
Route::get('/properties', [PropertyController::class, 'index'])->name('property_page');
Route::get('properties/ajax', [PropertyController::class, 'ajax'])->name('property_ajax');
Route::get('/properties/detail', [PropertyController::class, 'show'])->name('show_property');
Route::get('about', AboutController::class)->name('about');
Route::get('sell', SellController::class)->name('sell');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'save'])->name('contact.save');
Route::get('terms-and-conditions', [TermsController::class, 'terms'])->name('term_condition');
Route::get('privacy-policy', [TermsController::class, 'privacy'])->name('privacy_policy');
Route::get('cookies-notice', [TermsController::class, 'cookies'])->name('cookies_policy');
Route::get('key-risks', [TermsController::class, 'risks'])->name('key_risks');

// Routes for kyc
Route::middleware(['auth', 'verified', 'phone_verified'])->prefix('kyc')->group(function () {
    Route::get('tiers', [TierController::class, 'index'])->name('tiers.index');
    Route::post('tiers', [TierController::class, 'store'])->name('tiers.store');

    Route::get('employment-status', [UserInfoController::class, 'index'])->name('user_info.index');
    Route::post('employment-status', [UserInfoController::class, 'store'])->name('user_info.store');

    Route::get('identity-verification', [IdentityVerificationController::class, 'index'])->name('identity.index');
    Route::get('identity-verification/passport', [IdentityVerificationController::class, 'passport'])->name('identity.passport');
    Route::post('identity-verification/', [IdentityVerificationController::class, 'store'])->name('identity.store');
});


Route::middleware(['auth', 'verified', 'phone_verified', 'has_tier', 'has_fill_info', 'submitted_identity'])->prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/rating', RatingController::class)->name('rating.index');
    Route::resource('feedback', FeedbackController::class)->only(['index', 'store']);

    // properties
    Route::get('properties', [AuthPropertyController::class, 'index'])->name('properties.index');
    Route::get('properties/{property}', [AuthPropertyController::class, 'show'])->name('properties.show');
    Route::get('properties/{property}/files', [AuthPropertyController::class, 'files'])->name('properties.files');

    // wallet
    Route::get('wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');
    Route::get('wallet/deposit/success', [WalletController::class, 'deposit_success'])->name('wallet.deposit.success');
    Route::get('wallet/deposit/cancel', [WalletController::class, 'deposit_cancel'])->name('wallet.deposit.cancel');
    Route::get('stripe/onboarding', [WalletController::class, 'onboarding'])->name('stripe.onboarding');
    Route::get('stripe/onboarding/success/{account_id}', [WalletController::class, 'onboarding_success'])->name('stripe.onboarding.success');

    // bookmarks
    Route::get('bookmarks', BookmarkController::class)->name('bookmarks.index');

    // checkouts route
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
