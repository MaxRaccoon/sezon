<?php

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

Route::get('/', 'HomeController@index');

Route::namespace('Auth')->group(function () {
//    Route::get('register', 'RegisterController@create');
});

Route::post('/sendRequest', 'HomeController@sendRequest');


Route::middleware(['auth'])->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::prefix('admin')->group(function () {

            Route::post('upload', 'UploadController@index');

            //User
            Route::prefix('users')->group(function () {
                Route::get('', 'UserController@index');
                Route::get('list', 'UserController@getList');
            });
            Route::post('user/{id}', 'UserController@save')->where('id', '[0-9]+');
            Route::post('user', 'UserController@save');
            Route::get('user/{id}', 'UserController@getOne')->where('id', '[0-9]+');
            Route::delete('user/{id}', 'UserController@destroy')->where('id', '[0-9]+');

            // Landing data
            Route::prefix('landings')->group(function () {
                Route::get('', 'LandingController@index');
                Route::get('list', 'LandingController@getData');
            });
            Route::post('landing/{id}', 'LandingController@save')->where('id', '[0-9]+');
            Route::post('landing', 'LandingController@save');
            Route::get('landing/{id}', 'LandingController@getOne')->where('id', '[0-9]+');
            Route::delete('landing/{id}', 'LandingController@destroy')->where('id', '[0-9]+');

            //Menu
            Route::prefix('menus')->group(function () {
                Route::get('', 'MenuController@index');
                Route::get('list', 'MenuController@getList');
            });
            Route::post('menu/{id}', 'MenuController@save')->where('id', '[0-9]+');
            Route::post('menu', 'MenuController@save');
            Route::get('menu/{id}', 'MenuController@getOne')->where('id', '[0-9]+');
            Route::delete('menu/{id}', 'MenuController@destroy')->where('id', '[0-9]+');

            //Technology
            Route::prefix('technologies')->group(function () {
                Route::get('', 'TechnologyController@index');
                Route::get('list', 'TechnologyController@getList');
            });
            Route::post('technology/{id}', 'TechnologyController@save')->where('id', '[0-9]+');
            Route::post('technology', 'TechnologyController@save');
            Route::get('technology/{id}', 'TechnologyController@getOne')->where('id', '[0-9]+');
            Route::delete('technology/{id}', 'TechnologyController@destroy')->where('id', '[0-9]+');

            //program
            Route::prefix('programs')->group(function () {
                Route::get('', 'ProgramController@index');
                Route::get('list', 'ProgramController@getList');
            });
            Route::post('program/{id}', 'ProgramController@save')->where('id', '[0-9]+');
            Route::post('program', 'ProgramController@save');
            Route::get('program/{id}', 'ProgramController@getOne')->where('id', '[0-9]+');
            Route::delete('program/{id}', 'ProgramController@destroy')->where('id', '[0-9]+');

            //Slider
            Route::prefix('sliders')->group(function () {
                Route::get('', 'SliderController@index');
                Route::get('list', 'SliderController@getList');
            });
            Route::post('slider/{id}', 'SliderController@save')->where('id', '[0-9]+');
            Route::post('slider', 'SliderController@save');
            Route::get('slider/{id}', 'SliderController@getOne')->where('id', '[0-9]+');
            Route::delete('slider/{id}', 'SliderController@destroy')->where('id', '[0-9]+');

            //topLink
            Route::prefix('topLink')->group(function () {
                Route::get('', 'TopLinkController@index');
                Route::get('list', 'TopLinkController@getList');
            });
            Route::post('topLink/{id}', 'TopLinkController@save')->where('id', '[0-9]+');
            Route::post('topLink', 'TopLinkController@save');
            Route::get('topLink/{id}', 'TopLinkController@getOne')->where('id', '[0-9]+');
            Route::delete('topLink/{id}', 'TopLinkController@destroy')->where('id', '[0-9]+');

            //Request
            Route::prefix('requests')->group(function () {
                Route::get('', 'RequestController@index');
                Route::get('list', 'RequestController@getList');
            });
            Route::get('request/{id}', 'RequestController@getOne')->where('id', '[0-9]+');
            Route::delete('request/{id}', 'RequestController@destroy')->where('id', '[0-9]+');

            //Gallery
            Route::prefix('gallery')->group(function () {
                Route::get('', 'GalleryController@index');
                Route::get('list', 'GalleryController@getList');
            });
            Route::post('gallery/{id}', 'GalleryController@save')->where('id', '[0-9]+');
            Route::post('gallery', 'GalleryController@save');
            Route::get('gallery/{id}', 'GalleryController@getOne')->where('id', '[0-9]+');
            Route::delete('gallery/{id}', 'GalleryController@destroy')->where('id', '[0-9]+');

            //Trainers
            Route::prefix('trainers')->group(function () {
                Route::get('', 'TrainerController@index');
                Route::get('list', 'TrainerController@getList');
            });
            Route::post('trainer/{id}', 'TrainerController@save')->where('id', '[0-9]+');
            Route::post('trainer', 'TrainerController@save');
            Route::get('trainer/{id}', 'TrainerController@getOne')->where('id', '[0-9]+');
            Route::delete('trainer/{id}', 'TrainerController@destroy')->where('id', '[0-9]+');

            Route::get('programSchedules/{id}', 'ProgramController@scheduleIndex')->where('id', '[0-9]+');
            Route::get('schedule/list/{id}', 'ProgramController@scheduleList')->where('id', '[0-9]+');
            Route::post('schedule', 'ProgramController@scheduleSave');
            Route::get('schedule/{id}', 'ProgramController@scheduleGetOne')->where('id', '[0-9]+');
            Route::delete('schedule/{id}', 'ProgramController@scheduleDestroy')->where('id', '[0-9]+');

            Route::get('programPhotos/{id}', 'ProgramController@programPhotoIndex')->where('id', '[0-9]+');
            Route::get('programPhoto/list/{id}', 'ProgramController@programPhotoList')->where('id', '[0-9]+');
            Route::post('programPhoto', 'ProgramController@programPhotoSave');
            Route::get('programPhoto/{id}', 'ProgramController@programPhotoGetOne')->where('id', '[0-9]+');
            Route::delete('programPhoto/{id}', 'ProgramController@programPhotoDestroy')->where('id', '[0-9]+');

        });
    });
});

Auth::routes();