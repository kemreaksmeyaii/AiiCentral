<?php


use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EveventDetailController;
use App\Http\Controllers\googleCalendarController;
use App\Http\Controllers\SubscribeController;

//=======================================================================
//  Star Fornt-end English Content
//=======================================================================

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

//testing mail
Route::get('sendEmail', [EmailController::class, 'sendEmail']);


// Testing Google Calendar

Route::get('google-view', function () {
    return view('googleCalendar');
});
Route::post('google-event', function (Request $request) {

    $data = Event::get();
    return response()->json($data);
})->name('google.event');


Route::get('google-calendar', [googleCalendarController::class, 'index']);
Route::post('google-calendar/action', [googleCalendarController::class, 'action']);

// Testing Google Calendar

// @include('routeFrontEnd.php');

// Admin
Route::get('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/home', [HomeController::class, 'index']);

    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    //google auth//
    Route::get('/redirect', [AuthController::class, 'redirect']);
    Route::get('/login/google/callback', [AuthController::class, 'callback']);
    //google auth//

    #region Admin
    //Route::get('/admin/index', [AdminController::class, 'index']);
    Route::get('/admin/viewUser', [AdminController::class, 'viewUser']);
    Route::get('/admin/viewPermission', [AdminController::class, 'viewPermission',]);
    Route::get('/admin/viewroles', [AdminController::class, 'viewroles']);
    Route::post('/admin/viewUserPhoto', [AdminController::class, 'viewUserPhoto',]);
    #endregion
});

Route::get('/test', function() {
    return view('Cms.test');
});

// preview aii forum
Route::get('/preview', [HomeController::class, 'preview'])->name('preview');
// load more school committee
Route::get('/load-more-data', [HomeController::class,'loadMoreData'])->name('load.more');

// quiz
Route::post('quiz/submit/', [QuizController::class,'quizSubmit'])->name('quiz.submit');
Route::get('/quiz/result/', [QuizController::class,'quizResult'])->name('quiz.result');
Route::get('kh/quiz/result/', [QuizController::class,'quizResultKh'])->name('quiz.resultkh');

Route::get('admin/quiz/form/create', [QuizController::class,'quizFormCreate'])->name('quizForm.create');
Route::post('admin/quiz/form/store', [QuizController::class,'quizFormStore'])->name('quizForm.store');
// end quiz

// subscribe
Route::post('subscribe/', [SubscribeController::class,'subscribe'])->name('subscribe');

Route::get('events/{slug}', [EveventDetailController::class, 'eventDetail'])->name('events');
Route::get('kh/events/{slug}', [EveventDetailController::class, 'eventDetailKh'])->name('eventsKh');

Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('kh/search', [SearchController::class, 'searchKh'])->name('searchKh');

Route::get('/{slug}', [PageController::class, 'render'])->where('slug', '.*')->middleware('visitor');



