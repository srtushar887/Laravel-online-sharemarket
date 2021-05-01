<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});


Route::get('/cache_clear',function(){
    Artisan::call('cache:clear');
});

Route::get('/view_clear',function(){
    Artisan::call('view:clear');
});
Route::get('/config_clear',function(){
    Artisan::call('config:cache');
});
Route::get('/route_clear',function(){
    Artisan::call('route:clear');
});



Route::get('/', [\App\Http\Controllers\FrontendController::class,'index'])->name('front');
Route::get('/about-us', [\App\Http\Controllers\FrontendController::class,'about_us'])->name('about.us');
Route::get('/how-it-works', [\App\Http\Controllers\FrontendController::class,'how_it_works'])->name('how.it.works');
Route::get('/team', [\App\Http\Controllers\FrontendController::class,'team'])->name('team');
Route::get('/contact-us', [\App\Http\Controllers\FrontendController::class,'contact_us'])->name('contact.us');
Route::post('/contact-us-send', [\App\Http\Controllers\FrontendController::class,'contact_us_send'])->name('contact.us.send.data');


//blogs
Route::get('/blog', [\App\Http\Controllers\FrontendController::class,'blog'])->name('blog');
Route::get('/blog-details/{id}', [\App\Http\Controllers\FrontendController::class,'blog_details'])->name('blog.details');
Route::post('/blog-comment-save', [\App\Http\Controllers\FrontendController::class,'blog_comment_save'])->name('blog.comment.save');




Route::get('/login', [\App\Http\Controllers\CustomLoginController::class,'login_from'])->name('login');
Route::post('/user-login', [\App\Http\Controllers\CustomLoginController::class,'user_login'])->name('user.login.submit');
Route::get('/register', [\App\Http\Controllers\CustomLoginController::class,'register_from'])->name('register');
Route::post('/user-register', [\App\Http\Controllers\CustomLoginController::class,'user_register'])->name('user.register.submit');
Route::get('/referral-register/{ref_id}', [\App\Http\Controllers\CustomLoginController::class,'user_referral_register'])->name('referral.register');
Route::post('/referral-register-save', [\App\Http\Controllers\CustomLoginController::class,'user_referral_register_save'])->name('user.referall.register.submit');

//account verify
Route::get('/verify-account/{code}', [\App\Http\Controllers\CustomLoginController::class,'verify_account'])->name('user.account.verify');

//reset password
Route::get('/forgot-password', [\App\Http\Controllers\CustomLoginController::class,'forgot_password'])->name('user.forgot.password');
Route::post('/forgot-password-save', [\App\Http\Controllers\CustomLoginController::class,'forgot_password_save'])->name('user.forgot.password.submit');
Route::get('/forgot-password-verify/{code}', [\App\Http\Controllers\CustomLoginController::class,'forgot_password_verify'])->name('user.forgot.password.verify');
Route::get('/forgot-password-change/{code}', [\App\Http\Controllers\CustomLoginController::class,'forgot_password_change'])->name('user.forgot.password.chnage');
Route::post('/forgot-password-change-save', [\App\Http\Controllers\CustomLoginController::class,'forgot_password_change_save'])->name('user.forgot.password.change.submit');


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->name('dashboard');




Route::group(['middleware' => ['auth:sanctum','uverify']], function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

        //profile
        Route::get('/profile', [\App\Http\Controllers\User\UserController::class,'profile'])->name('user.profile');
        Route::post('/profile-update', [\App\Http\Controllers\User\UserController::class,'profile_update'])->name('user.profile.update');

        //change password
        Route::get('/change-password', [\App\Http\Controllers\User\UserController::class,'change_password'])->name('user.change.password');
        Route::post('/change-password-update', [\App\Http\Controllers\User\UserController::class,'change_password_update'])->name('user.change.password.update');


        //choose plan
        Route::get('/choose-plan', [\App\Http\Controllers\User\UserPlanController::class,'choose_plan'])->name('user.choose.plan');
        Route::post('/choose-plan-save', [\App\Http\Controllers\User\UserPlanController::class,'choose_plan_save'])->name('user.choose.plan.save');

        //my plan
        Route::get('/my-plan', [\App\Http\Controllers\User\UserPlanController::class,'my_plan'])->name('user.my.plan');
        Route::get('/claim-amount/{plan_id}/{amount}/{type}/{userplan_id}', [\App\Http\Controllers\User\UserPlanController::class,'claim_first'])->name('cliam.amount');
        Route::get('/re-invest/{id}', [\App\Http\Controllers\User\UserPlanController::class,'re_invest'])->name('user.reinvest');

        //buy share
        Route::get('/buy', [\App\Http\Controllers\User\UserShareController::class,'buy'])->name('user.buy');
        Route::post('/buy-share-save', [\App\Http\Controllers\User\UserShareController::class,'buy_share_save'])->name('user.buy.share.save');
        Route::get('/bought-share', [\App\Http\Controllers\User\UserShareController::class,'bought_share'])->name('user.bought.share');

        //sell
        Route::get('/sell', [\App\Http\Controllers\User\UserShareController::class,'sell'])->name('user.sell');
        Route::get('/sell-confirm/{id}', [\App\Http\Controllers\User\UserShareController::class,'sell_confirm'])->name('user.sell.confirm');
        Route::get('/sell-remove/{id}', [\App\Http\Controllers\User\UserShareController::class,'sell_remove'])->name('user.sell.remove');
        Route::get('/sell-report/{id}', [\App\Http\Controllers\User\UserShareController::class,'sell_report'])->name('user.sell.report');
        Route::get('/sell-repair/{id}', [\App\Http\Controllers\User\UserShareController::class,'sell_repair'])->name('user.sell.repair');

        //withdraw
        Route::get('/withdraw', [\App\Http\Controllers\User\UserWithdrawController::class,'withdraw'])->name('user.withdraw');
        Route::post('/withdraw-save', [\App\Http\Controllers\User\UserWithdrawController::class,'withdraw_save'])->name('user.withdraw.save');

        //message
        Route::get('/message', [\App\Http\Controllers\User\UserMessageController::class,'message'])->name('user.message');
        Route::get('/message-get/{id}', [\App\Http\Controllers\User\UserMessageController::class,'message_get'])->name('user.message.get');
        Route::post('/send-message', [\App\Http\Controllers\User\UserMessageController::class,'message_send'])->name('user.message.send');

        //referral users
        Route::get('/referall-users', [\App\Http\Controllers\User\UserController::class,'referral_users'])->name('user.referral.users');

        //account active
        Route::post('/account-active-submit', [\App\Http\Controllers\User\UserController::class,'account_active_submit'])->name('user.account.active.submit');
    });
});











//superadmin routes
Route::prefix('superadmin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\SuperAdminLoginController::class,'showLoginform'])->name('superadmin.login');
    Route::post('/login',[\App\Http\Controllers\Auth\SuperAdminLoginController::class,'login'])->name('superadmin.login.submit');

    Route::get('/logout', [\App\Http\Controllers\Auth\SuperAdminLoginController::class,'logout'])->name('superadmin.logout');
});




Route::group(['middleware' => ['auth:superadmin']], function() {
    Route::prefix('superadmin')->group(function() {

        Route::get('/', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'index'])->name('superadmin.dashboard');


        Route::get('/profile', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'profile'])->name('superadmin.profile');
        Route::post('/profile-update', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'profile_update'])->name('superadmin.profile.update');

        //change password
        Route::get('/chnage-password', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'change_password'])->name('superadmin.change.password');
        Route::post('/chnage-password-save', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'change_password_save'])->name('superadmin.change.password.update');

        //general settings
        Route::get('/general-setting', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'general_setting'])->name('superadmin.general.settings');
        Route::post('/general-setting-save', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'general_setting_save'])->name('superadmin.general.settings.update');

        //plans
        Route::get('/plans', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'plans'])->name('superadmin.plans');
        Route::post('/plans-save', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'plans_save'])->name('superadmin.plan.save');
        Route::post('/plans-update', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'plans_update'])->name('superadmin.plan.update');
        Route::post('/plans-delete', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'plans_delete'])->name('superadmin.plan.delete');

        //user plans
        Route::get('/user-plans', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'user_plans'])->name('superadmin.user.plans');
        Route::post('/user-plans-update', [\App\Http\Controllers\Superadmin\SuperAdminPlanController::class,'user_plans_update'])->name('superadmin.user.plan.update');

        //users
        Route::get('/users', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'users'])->name('superadmin.users');
        Route::get('/user-edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_edit'])->name('superadmin.edit.user');
        Route::post('/user-update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_update'])->name('superadmin.user.update');
        Route::post('/user-delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_delete'])->name('superadmin.user.delete');


        //admins
        Route::get('/admins', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admins'])->name('superadmin.admins');
        Route::post('/admins-create', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admins_create'])->name('superadmin.admins.create');
        Route::get('/admin-edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admin_edit'])->name('superadmin.edit.admin');
        Route::post('/admin-update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admin_update'])->name('superadmin.admin.update');
        Route::post('/admin-delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admin_delete'])->name('superadmin.admin.delete');




        //user account activation
        Route::get('/user-account-activation', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_account_activation'])->name('superadmin.users.account.activation');
        Route::post('/user-account-activation-update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_account_activation_update'])->name('superadmin.users.account.activation.update');

        //share
        Route::get('/normal-share-list', [\App\Http\Controllers\Superadmin\SuperAdminShareController::class,'normal_share_list'])->name('superadmin.normal.share.list');
        Route::get('/shared-share-list', [\App\Http\Controllers\Superadmin\SuperAdminShareController::class,'shared_share_list'])->name('superadmin.shared.share.list');
        Route::get('/special-share-list', [\App\Http\Controllers\Superadmin\SuperAdminShareController::class,'scpecial_share_list'])->name('superadmin.scpecial.share.list');



        //withdraw
        Route::get('/withdraw-pending', [\App\Http\Controllers\Superadmin\SuperAdminWithdrawController::class,'withdraw_pending'])->name('superadmin.withdraw.pending');
        Route::get('/withdraw-confirmed', [\App\Http\Controllers\Superadmin\SuperAdminWithdrawController::class,'withdraw_confirmed'])->name('superadmin.withdraw.confirmed');
        Route::get('/withdraw-rejected', [\App\Http\Controllers\Superadmin\SuperAdminWithdrawController::class,'withdraw_rejected'])->name('superadmin.withdraw.rejected');
        Route::post('/withdraw-status-save', [\App\Http\Controllers\Superadmin\SuperAdminWithdrawController::class,'withdraw_status_save'])->name('superadmin.withdraw.status.save');
        Route::post('/withdraw-delete', [\App\Http\Controllers\Superadmin\SuperAdminWithdrawController::class,'withdraw_delete'])->name('superadmin.withdraw.delete');

        //blog category
        Route::get('/blog-category', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_category'])->name('superadmin.blog.category');
        Route::post('/blog-category-save', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_category_save'])->name('superadmin.blog.category.save');
        Route::post('/blog-category-update', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_category_update'])->name('superadmin.blog.category.update');
        Route::post('/blog-category-delete', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_category_delete'])->name('superadmin.blog.category.delete');

        //blog
        Route::get('/blog-list', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_list'])->name('superadmin.blog.list');
        Route::get('/blog-create', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_create'])->name('superadmin.blog.create');
        Route::post('/blog-save', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_save'])->name('superadmin.blog.create.save');
        Route::get('/blog-edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_edit'])->name('superadmin.blog.edit');
        Route::post('/blog-update', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_update'])->name('superadmin.blog.create.update');
        Route::post('/blog-delete', [\App\Http\Controllers\Superadmin\SuperAdminBlogController::class,'blog_delete'])->name('superadmin.blog.create.delete');

    });
});







//admin routes

Route::prefix('admin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'showLoginform'])->name('admin.login');
    Route::post('/login',[\App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login.submit');

    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');


        Route::get('/profile', [\App\Http\Controllers\Admin\AdminController::class,'profile'])->name('admin.profile');
        Route::post('/profile-update', [\App\Http\Controllers\Admin\AdminController::class,'profile_update'])->name('admin.profile.update');

        //change password
        Route::get('/chnage-password', [\App\Http\Controllers\Admin\AdminController::class,'change_password'])->name('admin.change.password');
        Route::post('/chnage-password-save', [\App\Http\Controllers\Admin\AdminController::class,'change_password_save'])->name('admin.change.password.update');

        //general settings
        Route::get('/general-setting', [\App\Http\Controllers\Admin\AdminController::class,'general_setting'])->name('admin.general.settings');
        Route::post('/general-setting-save', [\App\Http\Controllers\Admin\AdminController::class,'general_setting_save'])->name('admin.general.settings.update');

        //plans
        Route::get('/plans', [\App\Http\Controllers\Admin\AdminPlanController::class,'plans'])->name('admin.plans');
        Route::post('/plans-save', [\App\Http\Controllers\Admin\AdminPlanController::class,'plans_save'])->name('admin.plan.save');
        Route::post('/plans-update', [\App\Http\Controllers\Admin\AdminPlanController::class,'plans_update'])->name('admin.plan.update');
        Route::post('/plans-delete', [\App\Http\Controllers\Admin\AdminPlanController::class,'plans_delete'])->name('admin.plan.delete');

        //user plans
        Route::get('/user-plans', [\App\Http\Controllers\Admin\AdminPlanController::class,'user_plans'])->name('admin.user.plans');
        Route::post('/user-plans-update', [\App\Http\Controllers\Admin\AdminPlanController::class,'user_plans_update'])->name('admin.user.plan.update');



        //users
        Route::get('/users', [\App\Http\Controllers\Admin\AdminUserController::class,'users'])->name('admin.users');
        Route::get('/user-edit/{id}', [\App\Http\Controllers\Admin\AdminUserController::class,'user_edit'])->name('admin.edit.user');
        Route::post('/user-update', [\App\Http\Controllers\Admin\AdminUserController::class,'user_update'])->name('admin.user.update');
        Route::post('/user-delete', [\App\Http\Controllers\Admin\AdminUserController::class,'user_delete'])->name('admin.user.delete');
        Route::get('/user-account-activation', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation'])->name('admin.users.account.activation');
        Route::post('/user-account-activation-save', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation_save'])->name('admin.users.account.activation.update');

        //share
        Route::get('/normal-share-list', [\App\Http\Controllers\Admin\AdminShareController::class,'normal_share_list'])->name('admin.normal.share.list');
        Route::get('/shared-share-list', [\App\Http\Controllers\Admin\AdminShareController::class,'shared_share_list'])->name('admin.shared.share.list');
        Route::get('/special-share-list', [\App\Http\Controllers\Admin\AdminShareController::class,'scpecial_share_list'])->name('admin.scpecial.share.list');

        //withdraw
        Route::get('/withdraw-pending', [\App\Http\Controllers\Admin\AdminWithdrawController::class,'withdraw_pending'])->name('admin.withdraw.pending');
        Route::get('/withdraw-confirmed', [\App\Http\Controllers\Admin\AdminWithdrawController::class,'withdraw_confirmed'])->name('admin.withdraw.confirmed');
        Route::get('/withdraw-rejected', [\App\Http\Controllers\Admin\AdminWithdrawController::class,'withdraw_rejected'])->name('admin.withdraw.rejected');
        Route::post('/withdraw-status-save', [\App\Http\Controllers\Admin\AdminWithdrawController::class,'withdraw_status_save'])->name('admin.withdraw.status.save');
        Route::post('/withdraw-delete', [\App\Http\Controllers\Admin\AdminWithdrawController::class,'withdraw_delete'])->name('admin.withdraw.delete');
    });
});
