<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AffiliationController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Client\BuildingEvaluationController;
use App\Http\Controllers\Client\HygieneController;
use App\Http\Controllers\Client\CollegeRegistrationFreshController;
use App\Http\Controllers\Client\CollegeRegistrationRenewalController;
use App\Http\Controllers\Client\FederalBoardRegistrationRenewalController;
use App\Http\Controllers\Client\FederalBoradAffiliationFreshController;
use App\Http\Controllers\Client\Ngo_RegistrationController;
use App\Http\Controllers\Client\Rawalpindi_affiliation_freshController;
use App\Http\Controllers\Client\RawalpindiBoradAffiliationRenewalController;
use App\Http\Controllers\Client\SchoolRegistrationFreshController;
use App\Http\Controllers\Client\SchoolRegistrationRenewalController;
use App\Models\FederalBoardAffiliationFresh;

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
        // school Renewal data routes
        Route::get('/dashboard/school_registration_renewal',[DashboardController::class,'get_school_registration_renewal'])->name('get.school.registration.renewal.info');
        Route::get('/dashboard/school_registration_renewal-update/{id}',[DashboardController::class,'school_registration_renewal_update'])->name('get.school.registration.renewal.update');
        Route::put('/dashboard/school_registration_renewal-edit/{id}',[DashboardController::class,'school_registration_renewal_edit'])->name('get.school.registration.renewal.edit');

        // School Fresh Data Routes
        Route::get('/dashboard/school_registration_fresh',[DashboardController::class,'get_school_registration_fresh'])->name('get.school.registration.fresh.info');
        Route::get('/dashboard/school_registration_fresh-edit/{id}',[DashboardController::class,'get_school_registration_fresh_edit'])->name('get.school.registration.fresh.edit');
        Route::put('/dashboard/school_registration_fresh-update/{id}',[DashboardController::class,'get_school_registration_fresh_update'])->name('get.school.registration.fresh.update');

        // Federal Board Affiliation Fresh Routes
        Route::get('/dashboard/federal_affiliation_fresh',[DashboardController::class,'federal_affiliation_fresh'])->name('federal.board.affiliation.fresh.info');
        Route::get('/dashboard/federal_affiliation_fresh-edit/{id}',[DashboardController::class,'federal_affiliation_fresh_edit'])->name('federal.board.affiliation.fresh.edit');
        Route::put('/dashboard/federal_affiliation_fresh-update/{id}',[DashboardController::class,'federal_affiliation_fresh_update'])->name('federal.board.affiliation.fresh.update');

        // Federal Board Affiliation Renewal Route
        Route::get('/dashboard/federal_affiliation_renewal',[DashboardController::class,'federal_affiliation_renewal'])->name('federal.board.affiliation.renewal.info');
        Route::get('/dashboard/federal_affiliation_renewal-edit/{id}',[DashboardController::class,'federal_affiliation_renewal_edit'])->name('federal.board.affiliation.renewal.edit');
        Route::put('/dashboard/federal_affiliation_renewal-update/{id}',[DashboardController::class,'federal_affiliation_renewal_update'])->name('federal.board.affiliation.renewal.update');


        // Rawalpindi Board Affiliation for Fresh
        Route::get('/dashboard/rawalpindi_affiliation_fresh',[DashboardController::class,'rawalpindi_affiliation_fresh'])->name('rawalpindi.board.affiliation.fresh.info');
        Route::get('/dashboard/rawalpindi_affiliation_fresh-edit/{id}',[DashboardController::class,'rawalpindi_affiliation_fresh_edit'])->name('rawalpindi.board.affiliation.fresh.edit');
        Route::put('/dashboard/rawalpindi_affiliation_fresh-update/{id}',[DashboardController::class,'rawalpindi_affiliation_fresh_update'])->name('rawalpindi.board.affiliation.fresh.update');

        // Rawalpindi Board Affiliation for Renewal
        Route::get('/dashboard/rawalpindi_affiliation_renewal',[DashboardController::class,'rawalpindi_affiliation_renewal'])->name('rawalpindi.board.affiliation.renewal.info');
        Route::get('/dashboard/rawalpindi_affiliation_renewal-edit/{id}',[DashboardController::class,'rawalpindi_affiliation_renewal_edit'])->name('rawalpindi.board.affiliation.renewal.edit');
        Route::put('/dashboard/rawalpindi_affiliation_renewal-update/{id}',[DashboardController::class,'rawalpindi_affiliation_renewal_update'])->name('rawalpindi.board.affiliation.renewal.update');

         // College Registration for Fresh
         Route::get('/dashboard/college_registration_fresh',[DashboardController::class,'get_college_registration_fresh'])->name('get.college.registration.fresh.info');
         Route::get('/dashboard/college_registration_fresh-edit/{id}',[DashboardController::class,'get_college_registration_fresh_edit'])->name('get.college.registration.fresh.edit');
         Route::put('/dashboard/college_registration_fresh-update/{id}',[DashboardController::class,'get_college_registration_fresh_update'])->name('get.college.registration.fresh.update');


         // College Registration for Renewal
         Route::get('/dashboard/college_registration_renewal',[DashboardController::class,'get_college_registration_renewal'])->name('get.college.registration.renewal.info');
         Route::get('/dashboard/college_registration_renewal-edit/{id}',[DashboardController::class,'get_college_registration_renewal_edit'])->name('get.college.registration.renewal.edit');
         Route::put('/dashboard/college_registration_renewal-update/{id}',[DashboardController::class,'get_college_registration_renewal_update'])->name('get.college.registration.renewal.update');

         // Hygeine Certificate
         Route::get('/dashboard/hygeine_certificate',[DashboardController::class,'hygeine_certificate'])->name('hygeine.certificate.info');
         Route::get('/dashboard/hygeine_certificate-edit/{id}',[DashboardController::class,'hygeine_certificate_edit'])->name('hygeine.certificate.edit');
         Route::put('/dashboard/hygeine_certificate-update/{id}',[DashboardController::class,'hygeine_certificate_update'])->name('hygeine.certificate.update');


         // Building Certificate
         Route::get('/dashboard/building_certificate',[DashboardController::class,'building_certificate'])->name('building.certificate.info');
         Route::get('/dashboard/building_certificate-edit/{id}',[DashboardController::class,'building_certificate_edit'])->name('building.certificate.edit');
         Route::put('/dashboard/building_certificate-update/{id}',[DashboardController::class,'building_certificate_update'])->name('building.certificate.update');


         // Ngo Registration
         Route::get('/dashboard/ngo_registration',[DashboardController::class,'ngo_registration'])->name('ngo.registration.info');
         Route::get('/dashboard/ngo_registration-edit/{id}',[DashboardController::class,'ngo_registration_edit'])->name('ngo.registration.edit');
         Route::put('/dashboard/ngo_registration-update/{id}',[DashboardController::class,'ngo_registration_update'])->name('ngo.registration.update');




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
        Route::get('/locations/edit/{province_id}/{district_id}/{tehsil_id}/{city_id}/{area_id}/{subarea_id}', [App\Http\Controllers\Admin\LocationController::class, "edit_view"])->name("admin.location.edit");
        Route::put('/locations/update/province/{province_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_province'])->name("admin.location.update.province");
        Route::post('/locations/update/district/{district_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_district'])->name("admin.location.update.district");
        Route::post('/locations/update/tehsil/{tehsil_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_tehsil'])->name("admin.location.update.tehsil");
        Route::post('/locations/update/city/{city_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_city'])->name("admin.location.update.city");
        Route::post('/locations/update/area/{area_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_area'])->name("admin.location.update.area");
        Route::post('/locations/update/subarea/{subarea_id}', [App\Http\Controllers\Admin\LocationController::class, 'update_subarea'])->name("admin.location.update.subarea");
        // Route::delete('/locations/delete/{id}', [App\Http\Controllers\Admin\LocationController::class, 'delete_location'])->name('admin.location.delete');



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
Route::get('/school-app-registration', [App\Http\Controllers\Client\SchoolController::class, "index"])->name("client.school");
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
Route::get('/affiliation-form', [AffiliationController::class, 'showForm'])->name('affiliation.form');
Route::get('/ngo-registration', [Ngo_RegistrationController::class, 'ngo_registartion'])->name('ngo_registartion.form');
Route::get('/affiliation-app-form', [AffiliationController::class, 'showForm'])->name('affiliation.form');
Route::post('/affiliation-form', [AffiliationController::class, 'submitForm'])->name('affiliation.submit');
Route::post('/ngo-registration', [Ngo_RegistrationController::class, 'ngo_registartion_submit'])->name('ngo_registartion.submit');
//Route::get('/affiliation-form', [AffiliationController::class, 'showForm']);
Route::get('/get-affiliation-data-json', [AffiliationController::class, 'getAffiliationData']);


//Hygiene Routes
// Route::get('/home/hygienic-form', [HygieneController::class, 'showForm'])->name('hygeinic-app-form');
// Route::post('/home/hygienic-form', [HygieneController::class, 'store'])->name('hygiene-application-submit');


// Rawalpindi affiliation routes
Route::get('/rawalpindi-affiliation-fresh',[Rawalpindi_affiliation_freshController::class,'rwp_affiliation_fresh'])->name('rwp_affiliation.fresh');
Route::post('/rawalpindi-affiliation-fresh',[Rawalpindi_affiliation_freshController::class,'rwp_affiliation_fresh_submit'])->name('rwp_affiliation.fresh.submit');



// hygeine
Route::get('/home/hygienic-form',[HygieneController::class,'showForm'])->name('hygiene-app-form');
Route::post('/home/hygienic-form',[HygieneController::class,'store'])->name('hygiene-application-submit');
// school renewal
Route::get('/school-registration-renewal',[SchoolRegistrationRenewalController::class,'school_registration_renewal'])->name('school_registration_renewal');
Route::post('/school-registration-renewal',[SchoolRegistrationRenewalController::class,'school_registration_renewal_submit'])->name('school_registration_renewal.submit');

// building evaluation
Route::get('/building-evaluation',[BuildingEvaluationController::class,'building_evaluation'])->name('building_evaluation');
Route::post('/building-evaluation',[BuildingEvaluationController::class,'building_evaluation_submit'])->name('building_evaluation.submit');

// fresh college registration
Route::get('/college-registration-fresh',[CollegeRegistrationFreshController::class,'college_registration'])->name('college_registration_fresh');
Route::post('/college-registration-fresh',[CollegeRegistrationFreshController::class,'college_registration_submit'])->name('college_registration.submit');



// Federal Board Registration
Route::get('/federal-board-affiliation-fresh',[FederalBoradAffiliationFreshController::class,'federal_affiliation'])->name('federal_affiliation_fresh');
 Route::post('/federal-board-affiliation-fresh',[FederalBoradAffiliationFreshController::class,'federal_affiliation_submit'])->name('federal_affiliation.submit');

//  Rawalpindi Board Renewal
Route::get('/rawalpindi-board-affiliation-renewal',[RawalpindiBoradAffiliationRenewalController::class,'rawalpindi_affiliation_renewal'])->name('rawalpindi_affiliation_renewal');
Route::post('/rawalpindi-board-affiliation-renewal',[RawalpindiBoradAffiliationRenewalController::class,'rawalpindi_affiliation_renewal_submit'])->name('rawalpindi_affiliation.submit');


// shcool Registration Fresh
Route::get('/school-registration-fresh',[SchoolRegistrationFreshController::class,'school_registration_fresh'])->name('school_registration_fresh');
Route::post('/school-registration-fresh',[SchoolRegistrationFreshController::class,'school_registration_fresh_submit'])->name('school_registration_fresh.submit');

// Renewal college registration
Route::get('/college-registration-renewal',[CollegeRegistrationRenewalController::class,'college_renewal'])->name('college_registration_renewal');
Route::post('/college-registration-renewal',[CollegeRegistrationRenewalController::class,'college_renewal_submit'])->name('college_registration_renewal.submit');



// Federal Board Registration Renewal
Route::get('/federal-board-affiliation-renewal',[FederalBoardRegistrationRenewalController::class,'federal_affiliation_renewal'])->name('federal_affiliation_renewal');
Route::post('/federal-board-affiliation-renewal',[FederalBoardRegistrationRenewalController::class,'federal_affiliation_renewal_submit'])->name('federal_affiliation_renewal.submit');

