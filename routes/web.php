<?php


use App\Http\Controllers\aboutController;
use App\Http\Controllers\Admin\planController;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\helpController;
use App\Http\Controllers\Admin\linkController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\paymentControllers;
use App\Http\Controllers\signupController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\userDashbordController;
use App\Http\Controllers\Admin\usersController;
use App\Http\Controllers\BiolinkBlockController;
use App\Http\Controllers\LinkAjax;
use App\Http\Controllers\previewController;
use App\Http\Controllers\User\usersLinkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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

Route::get('/', function () {
    return view('front.home');
});

Route::get('signin',[loginController::class,'index'])->name('login');
Route::post('signin',[loginController::class,'signin']);

Route::get('signup',[signupController::class,'index']);
Route::post('signup',[signupController::class,'signup']);

Route::get('logout', function () {
    Auth::logout();

    return back();
});

Route::get('about',[aboutController::class,'index']);
Route::get('contact',[contactController::class,'index']);
Route::get('blog',[blogController::class,'index']);
Route::get('team',[teamController::class,'index']);
Route::get('help',[helpController::class,'index']);




Route::middleware(['auth'])->group(function () {

    Route::get('dashboard',[dashboardController::class,'index']);
    //admins route
    Route::prefix('admin')->middleware('is_admin')->group(function () {
        Route::get('dashboard',[adminController::class,'index']);

        //plans
        Route::get('plans',[planController::class,'index']);
        Route::get('create-plan',[planController::class,'create']);
        Route::post('create-plan',[planController::class,'store'])->name('create-plan');
        Route::get('plan/{id}',[planController::class,'show']);
        Route::post('update-plan/{id}',[planController::class,'update'])->name('plan-update');
        Route::get('plan-delete/{id}',[planController::class,'destroy']);

        //users
        Route::get('users',[usersController::class,'index']);
        Route::get('user/{id}',[usersController::class,'show']);
        Route::post('user/{id}',[usersController::class,'update']);
        Route::get('delete/user/{id}',[usersController::class,'destroy']);

        //links
        Route::get('links',[linkController::class,'index']);
        Route::get('delete/link',[linkController::class,'destroy']);

        Route::get('website-settings',[SettingController::class,'index']);
        Route::post('website-settings',[SettingController::class,'update']);
    });


    //user route
    Route::prefix('user')->group(function () {
        Route::get('dashboard',[userDashbordController::class,'index']);
        Route::get('links',[usersLinkController::class,'index']);
        Route::get('link/{id}',[usersLinkController::class,'show']);
        Route::post('create-biolink',[usersLinkController::class,'createBiolink']);
        Route::post('update_biolink',[LinkAjax::class,'update'])->name('update_biolink');
    });

    Route::get('pay', [paymentControllers::class,'index']);
    Route::post('pay', [paymentControllers::class,'pay']);
    Route::get('success-callback',[paymentControllers::class,'successCallback']);
    Route::get('cancel-callback',[paymentControllers::class,'cancelCallback']);

});

Route::post('biolink-block-ajax',[BiolinkBlockController::class,'index']);
Route::post('link-ajax',[LinkAjax::class,'index']);

Route::get('{url}',[previewController::class,'index']);


