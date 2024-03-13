<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeConfigController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoEmbedController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\PopupHomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CategoryEventController;
use App\Http\Controllers\DashboardBackendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumniController;

// name method controller in route is fil name when insert permission

Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/getFormToken', [AuthController::class, 'getFormToken']);

Route::get('/newsArticleHome', [HomeController::class, 'newsArticleHome']);
Route::get('/getFristNewsCarousel', [HomeController::class, 'getFristNewsCarousel']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/destroysession', [AuthController::class, 'destroysession']);
    Route::Post('/logout', [AuthController::class, 'logOut']);
    Route::Post('/resetPassword', [AuthController::class, 'resetPassword']);

    #Out RBAC
    Route::Post('/admin/getUserImage', [AdminController::class, 'getUserImage',]);
    Route::Post('/admin/isAccessible', [AdminController::class, 'isAccessible',]);
    #Out RBAC

    #region Admin

    #region User
    Route::post('/admin/getUsers', [AdminController::class, 'getUsers']);
    Route::post('/admin/getUserRole', [AdminController::class, 'getUserRole']);
    Route::post('/admin/assignRole', [AdminController::class, 'assignRole']);
    Route::post('/admin/editUser', [AdminController::class, 'editUser']);
    Route::post('/admin/updateUser', [AdminController::class, 'updateUser']);
    Route::post('/admin/resetPassword', [AdminController::class, 'resetPassword',]);
    Route::post('/admin/saveUser', [AdminController::class, 'saveUser']);
    Route::post('/admin/deleteUser', [AdminController::class, 'deleteUser']);
    Route::post('/admin/saveUserImage', [AdminController::class, 'saveUserImage',]);
    Route::post('/admin/maniUsers', [AdminController::class, 'maniUsers',]);
    #endregion

    #dashboardBackend
    Route::get('/admin/dashboard-backend', [DashboardBackendController::class, 'DashboardBackend'])->name('dashboardBackend');
    #dashboardBackend

    #region Permission
    Route::get('/admin/getpermissionlist', [AdminController::class, 'getpermissionlist',]);
    //Route::get('admin/permissionlist', [AdminController::class, 'permissionlist']);

    #endregion

    #region Roles
    Route::get('/admin/getrolelist', [AdminController::class, 'getrolelist']);
    Route::post('/admin/saverole', [AdminController::class, 'saverole']);
    Route::post('/admin/editrole', [AdminController::class, 'editrole']);
    Route::post('/admin/updaterole', [AdminController::class, 'updaterole']);
    Route::post('/admin/deleterole', [AdminController::class, 'deleterole']);
    Route::post('/admin/getrolepermission', [AdminController::class, 'getrolepermission',]);
    Route::post('/admin/assignPermission', [AdminController::class, 'assignPermission',]);
    #endregion

    #Articals
    Route::get('/admin/article/teachers/view', [ArticleController::class, 'viewTeachers']);
    Route::get('/admin/article/teachers/index', [ArticleController::class, 'teacherIndex']);
    Route::get('/admin/article/teachers/create', [ArticleController::class, 'teacherCreate']);
    Route::get('/admin/article/teachers/show/{article}', [ArticleController::class, 'teacherShow']);
    Route::get('/admin/article/view', [ArticleController::class, 'view']);
    Route::get('/admin/article/create', [ArticleController::class, 'create']);
    Route::apiResource('/admin/article', ArticleController::class);
    #Articals

    #category-article
    Route::get('/admin/category-article/view', [CategoryArticleController::class, 'view']);
    Route::apiResource('/admin/category-article', CategoryArticleController::class);
    #category-article

    #TypeConfig
    Route::get('/admin/type-config/view', [TypeConfigController::class, 'view']);
    Route::apiResource('/admin/type-config', TypeConfigController::class);
    #TypeConfig

    #slide
    Route::get('/admin/slide/view', [SlideController::class, 'view']);
    Route::apiResource('/admin/slide', SlideController::class);
    #slide

    #Popup Home
    Route::get('/admin/popupHome/view', [PopupHomeController::class, 'view']);
    Route::get('/admin/popupHome/activeBtn/{id}', [PopupHomeController::class, 'activeBtn']);
    Route::apiResource('/admin/popupHome', PopupHomeController::class);
    #Popup Home

    #event
    Route::get('/admin/event/view', [EventController::class, 'view']);
    Route::apiResource('/admin/event', EventController::class);
    #event
    #category-event
    Route::get('/admin/category-event/view', [CategoryEventController::class, 'view']);
    Route::apiResource('/admin/category-event', CategoryEventController::class);
    #category-event

    #Vidoe Embed
    Route::get('/admin/videoEmbed/view', [VideoEmbedController::class, 'view']);
    Route::get('/admin/videoEmbed/activeBtn/{id}', [VideoEmbedController::class, 'activeBtn']);
    Route::apiResource('/admin/videoEmbed', VideoEmbedController::class);
    #Vidoe Embed

    #info
    Route::get('/admin/info/view', [InfoController::class, 'view']);
    Route::apiResource('/admin/info', InfoController::class);
    #info

    #Type
    Route::get('/admin/type/view', [TypeController::class, 'view']);
    Route::apiResource('/admin/type', TypeController::class);
    #Type

    #menu
    Route::get('/admin/menu/view', [MenuController::class, 'view']);
    Route::get('/admin/menu/create/{id}', [MenuController::class, 'create']);
    Route::get('/admin/menu/edit/{id}', [MenuController::class, 'edit']);
    Route::get('/admin/menu/indexList/{type}', [MenuController::class, 'indexList']);
    Route::post('/admin/menu/selectMenu', [MenuController::class, 'selectMenu']);
    Route::apiResource('/admin/menu', MenuController::class);
    #menu

    #event
    Route::get('/admin/alumni/view', [AlumniController::class, 'view']);
    Route::apiResource('/admin/alumni', AlumniController::class);
    #event
    #category-event
    Route::get('/admin/category-event/view', [CategoryEventController::class, 'view']);
    Route::apiResource('/admin/category-event', CategoryEventController::class);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//read header menu
// Route::get('/menuFrontEnd/getTopMenu', [FrontendmenuController::class, 'getTopMenu']);
