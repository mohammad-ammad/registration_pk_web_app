<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    
    Route::get('/login', [App\Http\Controllers\Auth\AuthenticationController::class, "index"])->name("auth.index");
    Route::post('/login', [App\Http\Controllers\Auth\AuthenticationController::class, "login"])->name("auth.login");

    Route::middleware('auth.custom')->group(function(){
        // * dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, "index"])->name("admin.dashboard");
        Route::get('/dashboard/school_level/ajax/{level}', [App\Http\Controllers\Admin\DashboardController::class, "get_schools_by_level_ajax"])->name("admin.dashboard_school_level_ajax");
        Route::get('/dashboard/school_affiliated/ajax/{affiliated}', [App\Http\Controllers\Admin\DashboardController::class, "get_schools_by_affiliated_ajax"])->name("admin.dashboard_school_affiliated_ajax");
        Route::get('/dashboard/school_type/ajax/{type}', [App\Http\Controllers\Admin\DashboardController::class, "get_schools_by_type_ajax"])->name("admin.dashboard_school_type_ajax");
        Route::get('/dashboard/master/search/sr/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_sr_ajax"]);
        Route::get('/dashboard/master/search/province/list/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_province_list_ajax"]);
        Route::get('/dashboard/master/search/district/list/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_district_list_ajax"]);
        Route::get('/dashboard/master/search/tehsil/list/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_tehsil_list_ajax"]);
        Route::get('/dashboard/master/search/pr/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_pr_ajax"]);
        Route::get('/dashboard/master/search/ds/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_ds_ajax"]);
        Route::get('/dashboard/master/search/ts/ajax', [App\Http\Controllers\Admin\DashboardController::class, "get_master_search_by_ts_ajax"]);


        Route::get('/logout', [App\Http\Controllers\Auth\AuthenticationController::class, "logout"])->name("admin.logout");

        // * geo locator
        Route::get('/geolocator', [App\Http\Controllers\Admin\GeoLocatorController::class, "index"])->name("admin.geolocator");
        Route::get('/geolocator/map/ajax', [App\Http\Controllers\Admin\GeoLocatorController::class, "get_map_locations_ajax"])->name("admin.geolocator_map_ajax");

        // * school
        Route::get('/school', [App\Http\Controllers\Admin\SchoolController::class, "index"])->name("admin.school");
        Route::get('/school/add', [App\Http\Controllers\Admin\SchoolController::class, "add_view"])->name("admin.school.add");
        Route::post('/school/add', [App\Http\Controllers\Admin\SchoolController::class, "add_school"])->name("admin.school.store");
        Route::post('/school/add/branch', [App\Http\Controllers\Admin\SchoolController::class, "add_school_branch"])->name("admin.school.store_branch");
        Route::get('/school/get/school/ajax', [App\Http\Controllers\Admin\SchoolController::class, "get_all_school_ajax"])->name("admin.school.get_school_ajax");
        Route::get('/school/get/district/ajax/{province_id}', [App\Http\Controllers\Admin\SchoolController::class, "get_all_districts_fk_provinces_ajax"])->name("admin.school.get_district_ajax");
        Route::get('/school/get/tehsil/ajax/{district_id}', [App\Http\Controllers\Admin\SchoolController::class, "get_all_tehsils_fk_district_ajax"])->name("admin.school.get_tehsil_ajax");
        Route::get('/school/get/cities/ajax/{tehsil_id}', [App\Http\Controllers\Admin\SchoolController::class, "get_all_cities_fk_tehsil_ajax"])->name("admin.school.get_cities_ajax");
        Route::get('/school/{id}', [App\Http\Controllers\Admin\SchoolController::class, "edit_view"])->name("admin.school.edit");
        Route::post('/school/edit/{id}', [App\Http\Controllers\Admin\SchoolController::class, "edit_school"])->name("admin.school.update");
        Route::get('/school/delete/{id}/{brId}', [App\Http\Controllers\Admin\SchoolController::class, "delete_school"])->name("admin.school.delete");

        // * locations
        Route::get('/locations', [App\Http\Controllers\Admin\LocationController::class, "index"])->name("admin.location");
        Route::get('/locations/add', [App\Http\Controllers\Admin\LocationController::class, "add_view"])->name("admin.location.add");
        Route::post('/locations/add', [App\Http\Controllers\Admin\LocationController::class, "add_province"])->name("admin.location.store");
        Route::post('/locations/add/district', [App\Http\Controllers\Admin\LocationController::class, "add_district"])->name("admin.location.store_district");
        Route::post('/locations/add/tehsil', [App\Http\Controllers\Admin\LocationController::class, "add_tehsil"])->name("admin.location.store_tehsil");
        Route::post('/locations/add/city', [App\Http\Controllers\Admin\LocationController::class, "add_city"])->name("admin.location.store_cities");
        Route::post('/locations/add/area', [App\Http\Controllers\Admin\LocationController::class, "add_area"])->name("admin.location.store_area");
        Route::post('/locations/add/subarea', [App\Http\Controllers\Admin\LocationController::class, "add_subarea"])->name("admin.location.store_subarea");
        Route::get('/location/edit/{province_id}/{district_id}/{tehsil_id}/{city_id}/{area_id}/{subarea_id}', [App\Http\Controllers\Admin\LocationController::class, "edit_view"])->name("admin.location.edit");
        Route::post('/location/edit/{id}' , [App\Http\Controllers\Admin\LocationController::class, "edit_location"])->name("admin.location.update");
    });
    
});

Route::get('/', function () {
    return view('client.pages.index');
});

Route::get('/about-us', function () {
    return view('client.pages.about');
});

Route::get('/teacher-training', function () {
    return view('client.pages.teacher-training');
});

Route::get('/school-registration', [App\Http\Controllers\Client\SchoolController::class, "index"])->name("client.school");
Route::post('/school-registration', [App\Http\Controllers\Client\SchoolController::class, "store"])->name("client.add_school");

// CLEAR CACHE
Route::get('/artisan/clear-cache', function() {
    Artisan::call('config:cache');
    return "Done - Config cache cleared";
});

// CLEAR ROUTES
Route::get('/artisan/route-cache', function() {
    Artisan::call('route:cache');
    return "Done - routes cache are cleared";
});
