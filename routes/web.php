<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Agentcontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\Usercontroller;
use App\Http\Controllers\backend\propertycontroller;
use App\Http\Controllers\backend\propertydetailcontroller;
use App\Http\Controllers\backend\AgentPackageController;
use App\Http\Controllers\backend\AgentPropertyController;
use App\Http\Controllers\backend\Statecontroller;
use App\Http\Controllers\frontend\frontpropertydetailcontroller;
use App\Http\Controllers\frontend\Wishlistcontroller;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\ScheduleController;
use App\Http\Controllers\backend\siteSettingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [Usercontroller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/setting', [Usercontroller::class, 'setting'])->name('user.setting');
    Route::post('/user/setting/store', [Usercontroller::class, 'setting_store'])->name('user.setting.store');
    Route::get('/user/logout', [Usercontroller::class, 'user_logout'])->name('user.logout');
    Route::get('/user/password', [Usercontroller::class, 'user_password'])->name('change.password');
    Route::post('/user/update/password', [Usercontroller::class, 'userpasswordupdate'])->name('user.update.password');
    Route::get('/user/schedule/request', [UserController::class, 'UserScheduleRequest'])->name('user.schedule.request');
});



//++++++++++++++ Frontend User +++++++++++++++++++++++

Route::post('/add-to-wishList/{property_id}', [Wishlistcontroller::class, 'AddToWishList']);

Route::get('/', [Usercontroller::class, 'index'])->name('home');

// Frontend Agent Details Page

Route::get('/property/details/{id}', [frontpropertydetailcontroller::class, 'agentpropertydetail'])->name('agentproperty.detail');
Route::get('/property/details/{id}/{slug}', [frontpropertydetailcontroller::class, 'propertydetail']);

//rent and buy

Route::get('/all/rent/property', [frontpropertydetailcontroller::class, 'rentproperty'])->name('all.rent.type');
Route::get('/all/buy/property', [frontpropertydetailcontroller::class, 'buyproperty'])->name('all.buy.type');

//type of property page

Route::get('/type/property/{id}', [frontpropertydetailcontroller::class, 'typeproperty'])->name('type.property');

//State Details Page
Route::get('/state/details/{id}', [Statecontroller::class, 'state_details'])->name('state.details');

//Blog Details
Route::get('/blog/details/{slug}', [BlogController::class, 'blog_details']);

//Category Details
Route::get('/category/details/{id}', [BlogController::class, 'category_details']);

//search
Route::post('/buy/search', [frontpropertydetailcontroller::class, 'buySearch'])->name('buy.search');
Route::post('/rebt/search', [frontpropertydetailcontroller::class, 'rentSearch'])->name('rent.search');

//Comment
Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
Route::get('/admin/blog/comment', [BlogController::class, 'AdminBlogComment'])->name('admin.blog.comment');
Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');

//schedule
Route::post('/store/schedule', [frontpropertydetailcontroller::class, 'StoreSchedule'])->name('store.schedule');


//--------------------End Frontend User ------------------------



//=================================== Admin ===============================================

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [Admincontroller::class, 'Admindashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [Admincontroller::class, 'Adminlogout'])->name('admin.logout');
    Route::get('/admin/profile', [Admincontroller::class, 'Adminprofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [Admincontroller::class, 'Adminprofilestore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [Admincontroller::class, 'Adminpasswordchange'])->name('admin.change.password');
    Route::post('/admin/update/password', [Admincontroller::class, 'Adminpasswordupdate'])->name('admin.update.password');
});

// =========== Admin Type =============

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(propertycontroller::class)->group(function () {

        //Admin Property Type
        Route::get('/admin/all/property',  'Adminalltype')->name('all.type');
        Route::get('/admin/add/property',  'addpropertytype')->name('add.type');
        Route::post('/admin/update/property',  'updatepropertytype')->name('property.update');
        Route::get('/admin/delete/propertytype/{id}',  'deletepropertytype')->name('property.delete');
        Route::get('/admin/edit/property/{id}',  'editpropertytype')->name('property.edit');
        Route::post('/admin/edit/update/property/{id}',  'editpropertyupdate')->name('edit.update');


        //Package
        Route::get('/admin/history/package', 'historypackage')->name('admin.history.package');
        Route::get('/admin/download/history/package/{id}', 'downloadhistorypackage')->name('admin.download.history.package');

        //Admin Amenities

        Route::get('/admin/all/amenities',  'Adminallamenities')->name('all.amenities');
        Route::get('/admin/add/amenities',  'addamenities')->name('add.amenities');
        Route::post('/admin/update/amenities',  'storeamenities')->name('amenities.store');
        Route::get('/admin/delete/amenities/{id}',  'deleteamenities')->name('amenities.delete');
        Route::get('/admin/edit/amenities/{id}',  'editamenities')->name('amenities.edit');
        Route::post('/admin/edit/update/amenities/{id}',  'editamenitiesupdate')->name('amenities.edit.update');




        //Admin Agent Details
        Route::get('/admin/all/agent',  'allagent')->name('all.agent');
        Route::get('/admin/add/agent',  'addagent')->name('add.agent');
        Route::post('/admin/store/agent',  'storeagent')->name('store.agent');
        Route::get('/admin/edit/agent/{id}',  'editagent')->name('edit.agent');
        Route::post('/admin/Update/agent/{id}',  'updateagent')->name('update.agent');
        Route::get('/admin/delete/agent/{id}',  'deleteagent')->name('delete.agent');
        Route::get('/admin/delete/atoi/{id}',  'atoiagent')->name('atoi.agent');
        Route::get('/admin/delete/itoa/{id}',  'itoaagent')->name('itoa.agent');
    });

    //Admin Property Details
    Route::controller(propertydetailcontroller::class)->group(function () {
        Route::get('/admin/all/propertydetails', 'allpropertydetails')->name('all.property');
        Route::get('/admin/add/propertydetails', 'addpropertydetails')->name('add.property');
        Route::post('/admin/store/propertydetails', 'storepropertydetails')->name('store.property');
        Route::get('/admin/edit/propertydetails/{id}', 'editpropertydetails')->name('edit.property');
        Route::post('/admin/update/propertydetails/{id}', 'updatepropertydetails')->name('update.property');
        Route::post('/admin/update/thumbnail', 'updatethumbnail')->name('update.thumbnail');
        Route::post('/admin/update/multiimage', 'updatemultiimage')->name('update.multiimage');
        Route::get('/admin/delete/multiimage/{id}', 'deletemultiimage')->name('delete.multiimage');
        Route::post('/admin/add/multiimage', 'addmultiimage')->name('add.multiimage');
        Route::post('/admin/update/facility', 'updatefacility')->name('update.facility');
        Route::get('/admin/delete/property/{id}', 'deleteproperty')->name('delete.property');
    });

    Route::controller(Statecontroller::class)->group(function () {

        //State Property Type
        Route::get('/admin/all/state',  'all_state')->name('all.state');
        Route::get('/admin/add/state',  'add_state')->name('add.state');
        Route::post('/admin/store/state',  'store_state')->name('state.store');
        Route::get('/admin/delete/state/{id}',  'delete_state')->name('state.delete');
        Route::get('/admin/edit/state/{id}',  'edit_state')->name('state.edit');
        Route::post('/admin/update/state/{id}',  'update_state')->name('store.update');
    });

    Route::controller(BlogController::class)->group(function () {

        //Blog post

        Route::get('/admin/all/blog/post',  'all_blog_post')->name('all.blog.post');
        Route::get('/admin/add/blog/post',  'add_blog_post')->name('add.blog.post');
        Route::post('/admin/store/blog/post',  'store_blog_post')->name('blog.post.store');
        Route::get('/admin/delete/blog/post/{id}',  'delete_blog_post')->name('blog.post.delete');
        Route::get('/admin/edit/blog/post/{id}',  'edit_blog_post')->name('blog.post.edit');
        Route::post('/admin/update/blog/post/{id}',  'update_blog_post')->name('blog.post.update');
    });


    Route::controller(TestimonialController::class)->group(function () {

        //Testimonial 
        Route::get('/admin/all/testimonial',  'all_testimonial')->name('all.testimonial');
        Route::get('/admin/add/testimonial',  'add_testimonial')->name('add.testimonial');
        Route::post('/admin/store/testimonial',  'store_testimonial')->name('testimonial.store');
        Route::get('/admin/delete/testimonial/{id}',  'delete_testimonial')->name('testimonial.delete');
        Route::get('/admin/edit/testimonial/{id}',  'edit_testimonial')->name('testimonial.edit');
        Route::post('/admin/update/testimonial/{id}',  'update_testimonial')->name('testimonial.update');
    });


    Route::controller(BlogController::class)->group(function () {

        //Blog Category 
        Route::get('/admin/all/blog/category',  'all_blog_category')->name('all.blog.category');
        Route::post('/admin/store/blog/category',  'store_blog_category')->name('store.blog.category');
        Route::get('/admin/delete/blog/category/{id}',  'delete_blog_category')->name('blog.category.delete');
        Route::get('/admin/edit/blog/category/{id}',  'edit_blog_category')->name('blog.category.edit');
        Route::post('/admin/update/blog/category/',  'update_blog_category')->name('blog.category.update');
    });


    // Permission All Route 
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });

    // Roles All Route 
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');


        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');

        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');

        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');

        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');

        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    });

    // Admin User All Route 
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });




    //siteSetting

    Route::controller(siteSettingController::class)->group(function () {
        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');
    });
});

// ============ End Admin Types ============

Route::get('/admin/login', [Admincontroller::class, 'Adminlogin'])->name('admin.login');


//======================================= End admin =============================================








// ===================================== Agent =================================================



Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [Agentcontroller::class, 'Agentdashboard'])->name('agent.dashboard');
    Route::get('/agent/profile', [Agentcontroller::class, 'Agentprofile'])->name('agent.profile');
    Route::post('/agent/profile/store', [Agentcontroller::class, 'agentprofilestore'])->name('agent.profile.store');
    Route::get('/agent/change/password', [Agentcontroller::class, 'agentpasswordchange'])->name('agent.change.password');
    Route::post('/agent/update/password', [Agentcontroller::class, 'agentpasswordupdate'])->name('agent.update.password');
    Route::get('/agent/logout', [Agentcontroller::class, 'agentlogout'])->name('agent.logout');
});




//======= Agent Property Group Route =============

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::controller(AgentPropertyController::class)->group(function () {
        Route::get('/agent/all/property', 'agentallproperty')->name('agent.all.property');
        Route::get('/agent/add/property', 'agentaddproperty')->name('agent.add.property');
        Route::post('/agent/store/property', 'agentstoreproperty')->name('agent.store.property');
        Route::get('/agent/edit/property/{id}', 'agenteditproperty')->name('agent.edit.property');
        Route::post('/agent/update/property/{id}', 'agentupdateproperty')->name('agent.update.property');
        Route::post('/agent/thumbnail/update/property/{id}', 'agentthumbnailupdateproperty')->name('agent.thumbnail.update.property');
        Route::post('/agent/mul-image/update/property', 'agentupdateproperty')->name('agent.mulimage.update.property');
        Route::get('/agent/mul-image/delete/property/{id}', 'agentmulimagedeleteproperty')->name('agent.mulimage.delete.property');
        Route::post('/agent/mul-image/add/property', 'agentmulimageaddproperty')->name('agent.mulimage.add.property');
        Route::post('/agent/facilities/update/property', 'agentfacilitiesupdateproperty')->name('agent.facilities.update.property');
        Route::get('/agent/delete/property/{id}', 'agentdeleteproperty')->name('agent.delete.property');
    });

    //=======package======
    Route::controller(AgentPackageController::class)->group(function () {
        Route::get('/agent/all/package', 'allpackage')->name('all.package');
        Route::get('/agent/business/package', 'businesspackage')->name('business.package');
        Route::post('/agent/buy/business/package', 'buybusinesspackage')->name('buy.business.property');
        Route::get('/agent/professional/package', 'professionalpackage')->name('professional.package');
        Route::post('/agent/buy/professional/package', 'buyprofessionalpackage')->name('buy.professional.package');
        Route::get('/agent/history/package', 'historypackage')->name('history.package');
        Route::get('/agent/download/history/package/{id}', 'downloadhistorypackage')->name('download.history.package');
    });


    //=======schedule======
    Route::controller(ScheduleController::class)->group(function () {
        Route::get('/agent/schedule/request/', 'AgentScheduleRequest')->name('agent.schedule.request');

        Route::get('/agent/details/schedule/{id}', 'AgentDetailsSchedule')->name('agent.details.schedule');
        Route::post('/agent/update/schedule/', 'AgentUpdateSchedule')->name('agent.update.schedule');
    });
});


//----------- End Agent Property Group Route ------------------




//=======Agent External Route =============

Route::get('/agent/login', [Agentcontroller::class, 'agentlogin'])->name('agent.login');
Route::post('/agent/register', [Agentcontroller::class, 'agentregister'])->name('agent.register');

//-----------Agent End External Route ------------------



// ===================================== End Agent ==============================================

require __DIR__ . '/auth.php';
