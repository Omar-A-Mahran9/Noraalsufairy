<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'dashboard' , 'namespace' => 'Dashboard', 'as' => 'dashboard.' , 'middleware' => ['web', 'auth:employee', 'set_locale'] ] , function (){

    /** set theme mode ( light , dark ) **/
    Route::get('/change-theme-mode/{mode}', function ($mode) {

        session()->put('theme_mode', $mode);
        return redirect()->back();

    });

    /** dashboard index **/
    Route::get('/' , 'DashboardController@index')->name('index');

    /** resources routes **/
    Route::resource('appointments','AppointmentController')->except('delete');
    Route::resource('schedules','ScheduleController')->only(['index', 'store']);
    Route::resource('orders','OrderController');
    Route::get('orders-export','OrderController@excel')->name('orders-export');
    Route::resource('roles','RoleController');
    Route::resource('brands','BrandController');
    Route::resource('models','ModelController');
    Route::resource('cars','CarController');
    Route::get('cars-export','CarController@excel')->name('cars-export');
    Route::resource('colors','ColorController');
    Route::resource('tags','TagController');
    Route::resource('employees','EmployeeController');
    Route::resource('clients','ClientController');
    Route::resource('banks','BankController');
    Route::resource('services','ServiceController');
    Route::resource('branches','BranchController');
    Route::resource('cities','CityController');
    Route::resource('news','NewsController');
    Route::resource('faqs','FaqController');
    Route::resource('offers','OfferController');
    Route::resource('funding-organizations','FundingOrganizationController');
    Route::resource('contact-us','ContactUsController')->except(['store','create','destroy']);
    Route::resource('news-subscribers','NewsSubscriberController')->except(['store','create','show']);
    Route::resource('settings','SettingController')->only(['index','store']);
    Route::resource('careers','CareerController');
    Route::get('/applicants' , 'CareerController@applicants')->name('career-applicants');
    Route::get('/schedules/time-slots' , 'ScheduleController@timeSlots');
    Route::get('/brands/{brand}/models' , 'BrandController@models');
    Route::get('/cities/{city}/branches' , 'CityController@branches');
    Route::post('/appointments/{appointment}/change-status' , 'AppointmentController@changeStatus');
    Route::get('/brands/{brand}/parent-models','BrandController@parentModels');

    /** notifications routes **/
    Route::post('/save-token', 'NotificationController@saveToken')->name('save-token');
    Route::get('notifications/{id}/mark_as_read', 'NotificationController@markAsRead')->name('notifications.mark_as_read');
    Route::get('notifications/{type}/load-more/{next}', 'NotificationController@loadMore')->name('notifications.load_more');
    Route::get('notifications/mark-all-as-read', 'NotificationController@markAllAsRead')->name('notifications.mark_all_as_read');
    Route::post('notifications/change-status-sound' , 'NotificationController@changeSoundStatus')->name('notifications.change-sound-status');

    /** duplicate car **/
    Route::get('/cars/{car}/duplicate' , 'CarController@edit');

    /** ajax routes **/
    Route::get('role/{role}/employees','RoleController@employees');
    Route::post('car-validate/{car?}','CarController@validateStep');
    Route::post('change-status/{order}','OrderController@changeStatus');

    /** employee profile routes **/

    Route::view('edit-profile','dashboard.employees.edit-profile')->name('edit-profile');
    Route::put('update-profile', 'EmployeeController@updateProfile')->name('update-profile');
    Route::put('update-password', 'EmployeeController@updatePassword')->name('update-password');

    /** Trash routes */

    Route::get('trash/{modelName?}','TrashController@index')->name('trash');
    Route::get('trash/{modelName}/{id}','TrashController@restore');
    Route::delete('trash/{modelName}/{id}','TrashController@forceDelete');

    /** Add new module route */
    Route::get('/add-new-module/{moduleName}', 'RoleController@addNewModule');

    Route::get('branch-available-days/{branch}', 'BranchController@getBranchAvailableDays');

});
