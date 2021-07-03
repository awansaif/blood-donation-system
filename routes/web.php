<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BloodGroupController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Donor\ProfileController;
use App\Http\Controllers\Donor\SettingController;
use App\Http\Controllers\DonorAuthLoginController;
use App\Http\Controllers\DonorAuthRegisterController;
use App\Http\Controllers\Org\AuthController;
use App\Http\Controllers\Org\OfficeController;
use App\Http\Controllers\Org\ProfileController as OrgProfileController;
use App\Http\Controllers\Org\SettingController as OrgSettingController;
use App\Http\Controllers\PublicPagesController;
use App\Models\News;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome', [
        'news' => News::take(3)->latest()->get()
    ]);
});


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::group(['middleware' => 'guest:admin'], function () {
            Route::get('/', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
            Route::post('login', [LoginController::class, 'login'])->name('login');
        });
        Route::group(['middleware' => 'auth:admin'], function () {
            route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
            Route::resource('users', DonorController::class);

            Route::resource('cities', CityController::class);
            Route::resource('bloodgroup', BloodGroupController::class);
            Route::resource('news', NewsController::class);
            Route::resource('organization', OrganizationController::class);
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        });
    });


Route::prefix('user')
    ->as('donor.')
    ->group(function () {
        Route::group(['middleware' => 'guest:donor'], function () {
            Route::get('/register', [DonorAuthRegisterController::class, 'showRegisterForm'])->name('showRegisterForm');
            Route::post('register', [DonorAuthRegisterController::class, 'register'])->name('register');

            Route::get('/login', [DonorAuthLoginController::class, 'showLoginForm'])->name('showLoginForm');
            Route::post('login', [DonorAuthLoginController::class, 'login'])->name('login');
        });
        Route::group(['middleware' => 'auth:donor'], function () {
            route::get('home', [DonorAuthLoginController::class, 'dashboard'])->name('dashboard');

            Route::resource('profile', ProfileController::class);
            Route::resource('setting', SettingController::class);

            Route::get('logout', [DonorAuthLoginController::class, 'logout'])->name('logout');
        });
    });


Route::prefix('org')
    ->as('org.')
    ->group(function () {
        Route::group(['middleware' => 'guest:org'], function () {
            Route::post('login', [AuthController::class, 'login'])->name('login');
        });
        Route::group(['middleware' => 'auth:org'], function () {
            route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

            Route::resource('office', OfficeController::class);

            Route::resource('profile', OrgProfileController::class);
            Route::resource('setting', OrgSettingController::class);

            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('news', [PublicPagesController::class, 'news'])->name('news');
Route::get('news/{slug}', [PublicPagesController::class, 'signleNews'])->name('signleNews');

Route::get('/organization', [PublicPagesController::class, 'organization'])->name('org.showLoginForm');


Route::get('/donors', [PublicPagesController::class, 'donors'])->name('donor');
