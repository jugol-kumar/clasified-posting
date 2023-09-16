<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BusinessSettingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MessangerController;
use App\Http\Controllers\RecruitersCompanyController;
use App\Http\Controllers\RecruitersController;
use App\Http\Controllers\RecruitersProfileController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\SeekerJobController;
use App\Http\Controllers\SeekerProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MocktestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalPaymentController;

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
Route::get('/storage', function (){
   Artisan::call('storage:link');
});

Route::controller(HomeController::class)->name('client.')->group(function (){
    Route::get('', 'home')->name('home');
    Route::get('single-post/{job_title_slug}', 'singleJob')->name('single_post');
    Route::get('recruiters', 'recruiter')->name('recruiter');
    Route::get('seekers', 'seekers')->name('seekers');

    Route::post('all-district', 'allDistrict')->name('allDistrict');
    Route::get('sub-categories/category-id/{id}', 'getSubCategories')->name('getSubCategories');
    Route::get('search', 'searchJob')->name('searchJObs');

    Route::get('get-districts-by-division-id/{id}', 'getDistricts')->name('getCities');
    Route::get('get-thana-by-district-id/{id}', 'getThana')->name('getThana');
});

Route::controller(RecruitersController::class)->prefix('recruiters')->name('recruiter.')->group(function (){
    Route::post('create', 'create')->name('create');
});


//Route::get('/', [HomeController::class, 'home']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/checkout/{slug}', [HomeController::class, 'checkout']);
Route::get('/details/{slug}', [HomeController::class, 'details']);

Route::get('pay/paypal', [PayPalPaymentController::class, 'charge'])->middleware('auth')->name('paypal.pay');
Route::get('pay/success', [PayPalPaymentController::class, 'success'])->name('paypal.success');
Route::get('pay/error', [PayPalPaymentController::class, 'error'])->name('paypal.error');



Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/account', [RegisterController::class, 'store'])->name('register.account');

    Route::post('recruiter/register', [RegisterController::class, 'create'])->name('recruiter.create');
    Route::post('recruiter/login', [LoginController::class, 'authenticate'])->name('recruiter.login');

    Route::get('seekers/register', [RegisterController::class, 'seekerRegister'])->name('seeker.register');
    Route::post('seeker/create', [RegisterController::class, 'registerSeeker'])->name('registerSeeker');

    Route::post('login/or/create', [LoginController::class, 'loginOrCreate'])->name('loginOrCreate');
});
Route::any('logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('oauth')->group(function (){
        Route::get('verification', [VerificationController::class, 'verification'])->name('verification');
        Route::post('verification-otp', [VerificationController::class, 'verificationCheckOtp'])->name('verificationOtp');
        Route::get('resend-verification-code', [VerificationController::class, 'resVCode'])->name('resVCode');
    });



    Route::prefix('student')->middleware('is_student')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'student'])->name('dashboard');
    });

    Route::prefix('panel')->group(function () {
        Route::prefix('admin')->group(function(){
            Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

            // categories
            Route::resource('category', CategoryController::class);
            Route::post('/category/update-with-files/{id}', [CategoryController::class, 'update']);
            Route::get('/category/make-featured/{id}', [CategoryController::class, 'makeFeatured'])->name('makeFeatured');

            Route::resource('sub-category', SubCategoryController::class);
            Route::resource('child-category', ChildCategoryController::class);
            Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('update');

            Route::resource('posts', JobController::class);
            Route::get('single-post/{id}', [JobController::class, 'show']);
            Route::post('change-post-status', [JobController::class, 'updateStatus'])->name('changeStatus');
            Route::post('child-categories-by-category-id', [JobController::class, 'allSubcategory'])->name('allSubCategory');

            Route::get('district-by-division-id/{id}', [JobController::class, 'getDistricts']);
            Route::get('upozila-by-district-id/{id}', [JobController::class, 'getUpozilas']);

            Route::get('settings',  [BusinessSettingController::class, 'index'])->name('setting.index');
            Route::post('settings',  [BusinessSettingController::class, 'updateSetting'])->name('setting.update');
        });

        Route::prefix('user')->name('user.')->middleware('recruiters')->group(function(){
            Route::withoutMiddleware('recruiters')->group(function(){
                Route::get('make-profile', [RecruitersController::class, 'makeProfile'])->name('makeProfile');
                Route::post('update-bio', [RecruitersController::class, 'updateBio'])->name('updateBio');

                Route::get('upload-business-files', [RecruitersController::class, 'uploadBusinessFile'])->name('uploadBusinessFile');
                Route::post('verify-work-mail', [RecruitersController::class, 'verifyWorkEmail'])->name('verifyWorkEmail');
                Route::get('verification/verify-work-mail', [RecruitersController::class, 'verificationWorkEmail'])->name('verificationWorkEmail');

                Route::post('verify-business-file', [RecruitersController::class, 'verifyBusinessFile'])->name('verifyBusinessFile');

                Route::get('show-before-verification-profile', [RecruitersController::class, 'showBeforeVerify'])->name('showBeforeVerify');
                Route::get('show-wait-for-verification-profile', [RecruitersController::class, 'waitForVerify'])->name('waitForVerify');

                Route::get('cancel-your-verification-request', [RecruitersController::class, 'cancelVerifyRequest'])->name('cancelVerifyRequest');

                Route::get('profile-inactive', [RecruitersController::class, 'profileInactive'])->name('profileInactive');
            });

            Route::get('dashboard', [DashboardController::class, 'recruiters'])->name('dashboard');

            Route::get('posts', [RecruitersController::class, 'allJobs'])->name('allJobs');
            Route::get('post/create-post', [RecruitersController::class, 'createJob'])->name('createJob');
            Route::post('post/new-post', [RecruitersController::class, 'storeJob'])->name('storeJob');
            Route::get('delete-post/{id}', [RecruitersController::class, 'deletePost'])->name('deletePost');


            Route::delete('jobs/delete-job/{id}', [RecruitersController::class, 'deleteJob'])->name('deleteJob');
            Route::get('jobs/edit-single-job/{job_slug}', [RecruitersController::class, 'editJob'])->name('editJob');
            Route::put('jobs/update-single-job/{id}', [RecruitersController::class, 'updateJob'])->name('updateJob');

            Route::get('sub-category/by-category-id/{id}', [RecruitersController::class, 'getSubCat'])->name('getSubCat');
            Route::get('child-category/by-sub-category-id/{id}', [RecruitersController::class, 'getChildCat'])->name('getChildCat');

            Route::withoutMiddleware('recruiters')->group(function (){
                Route::get('chatting', [RecruitersController::class, 'chatting'])->name('chatting');
                Route::get('single-post-messages/{details_id}', [RecruitersController::class, 'singlePostSingleMessage'])->name('singlePostSingleMessage');
                Route::delete('delete-chat/{id}', [RecruitersController::class, 'deleteChattings'])->name('deleteChat');

                Route::get('single-message/{msg_id}', [RecruitersController::class, 'singleMessage'])->name('singleMessage');
                Route::post('send-chatting-message', [RecruitersController::class, 'sendMessage'])->name('sendMessage');
                Route::post('send-chat', [RecruitersController::class, 'sendChat'])->name('sendChat');
            });

            Route::get('edit-profile', [RecruitersController::class, 'editProfile'])->name('editProfile');
            Route::post('change-profile-picture', [RecruitersController::class, 'changeProfilePicture'])->name('changeProfilePicture');


        });
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/test', function (){
    return view('auth.recruiter_workmail_verification');
});
