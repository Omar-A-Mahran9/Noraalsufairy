<?php

use Illuminate\Support\Facades\Route;

 
Route::group([ 'prefix' => 'dashboard' , 'namespace' => 'Dashboard', 'as' => 'dashboard.' , 'middleware' => ['web', 'auth:employee', 'set_locale'] ] , function (){

    /** set theme mode ( light , dark ) **/
    Route::get('/change-theme-mode/{mode}', 'SettingController@changeThemeMode');

    /** dashboard index **/
    Route::get('/' , 'DashboardController@index')->name('index');


    /** resources routes **/
    Route::resource('courses','CourseController');
    Route::post('course-validate/{course?}','CourseController@validateStep');
    Route::prefix('courses')->group(function () {
        Route::resource('videos', 'VideosController')->names([
            'index' => 'courses.videos.index',
            'create' => 'courses.videos.create',
            'store' => 'courses.videos.store',
            'show' => 'courses.videos.show',
            'edit' => 'courses.videos.edit',
            'update' => 'courses.videos.update',
            'destroy' => 'courses.videos.destroy',
        ]);
        Route::resource('attachment', 'AttachmentController')->names([
            'index' => 'courses.attachment.index',
            'create' => 'courses.attachment.create',
            'store' => 'courses.attachment.store',
            'show' => 'courses.attachment.show',
            'edit' => 'courses.attachment.edit',
            'update' => 'courses.attachment.update',
            'destroy' => 'courses.attachment.destroy',
        ]);
    });
    Route::resource('books', 'BookController');
    Route::resource('articles', 'ArticlesController');
    Route::resource('quizzes','QuizzeController');
    Route::prefix('quizzes')->group(function () {
        Route::resource('questions', 'QuestionsController')->names([
            'index' => 'quizzes.questions.index',
            'create' => 'quizzes.questions.create',
            'store' => 'quizzes.questions.store',
            'show' => 'quizzes.questions.show',
            'edit' => 'quizzes.questions.edit',
            'update' => 'quizzes.questions.update',
            'destroy' => 'quizzes.questions.destroy',
        ]);
        
    });

     Route::resource('roles','RoleController');
    Route::resource('employees','EmployeeController');
    Route::resource('vendors','VendorController');
    Route::resource('contact-us','ContactUsController')->except(['store','create','destroy']);
    Route::resource('news-subscribers','NewsSubscriberController')->except(['store','create','show']);
    Route::resource('settings','SettingController')->only(['index','store']);
 
 
    /** ajax routes **/
    Route::get('role/{role}/employees','RoleController@employees');
     Route::post('change-status/{order}','OrderController@changeStatus');

    /** employee profile routes **/

    Route::view('edit-profile','dashboard.employees.edit-profile')->name('edit-profile');
    Route::put('update-profile', 'EmployeeController@updateProfile')->name('update-profile');
    Route::put('update-password', 'EmployeeController@updatePassword')->name('update-password');

 
});
