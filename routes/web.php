<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/images/{file}', function ($file) {
	$url = Storage::disk('do_spaces')->temporaryUrl(
	  $file,
	  date('Y-m-d H:i:s', strtotime("+5 min"))
	);
	if ($url) {
	   return Redirect::to($url);
	}
	return abort(404);
  })->where('file', '.+');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::get('/admin/pipeline', function () {
    return view('admin.pipeline.index');
    });

    Route::get('/admin/create_lead', function () {
        return view('admin.create_lead.index');
    });

    Route::get('/admin/lead_import', function () {
        return view('admin.lead_import.index');
    });

    Route::get('/admin/crm_lead_list', function () {
        return view('admin.crm_lead_list.index');
    });

    Route::get('/admin/crm_lead_follow', function () {
        return view('admin.crm_lead_follow.index');
    });

    Route::get('/admin/crm_lead_status', function () {
        return view('admin.crm_lead_status.index');
    });

    Route::resource('/admin/user_manager', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);
    Route::get('admin/users_search/', [App\Http\Controllers\MyUserController::class, 'users_search']);


    Route::resource('/admin/customer_manager', CustomerController::class);
    Route::post('/api/api_post_status_customer', [App\Http\Controllers\CustomerController::class, 'api_post_status_customer']);
    Route::get('api/del_customer/{id}', [App\Http\Controllers\CustomerController::class, 'del_MyUser']);

    Route::get('/admin/product_manager', function () {
        return view('admin.product_manager.index');
    });

    Route::resource('/admin/category', CategoryController::class);
    Route::post('/api/api_post_status_category', [App\Http\Controllers\CategoryController::class, 'api_post_status_category']);
    Route::get('api/del_cat/{id}', [App\Http\Controllers\CategoryController::class, 'del_cat']);

    Route::resource('/admin/sale_contact', SaleContactController::class);
    Route::post('/api/api_post_status_sale_contact', [App\Http\Controllers\SaleContactController::class, 'api_post_status_sale_contact']);
    Route::get('api/del_sale_contact/{id}', [App\Http\Controllers\SaleContactController::class, 'del_sale_contact']);
    


    Route::get('/admin/transport', function () {
        return view('admin.transport.index');
    });

});
