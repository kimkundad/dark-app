<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleContactController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PipeLineController;
use App\Http\Controllers\LeadImportController;
use App\Http\Controllers\CrmLeadListController;
use App\Http\Controllers\crmLeadFollowController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\TambonController;

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

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('api/provinces', [App\Http\Controllers\TambonController::class , 'getProvinces' ]);
Route::get('api/amphoes', [App\Http\Controllers\TambonController::class , 'getAmphoes' ]);
Route::get('api/tambons', [App\Http\Controllers\TambonController::class , 'getTambons' ]);
Route::get('api/zipcodes', [App\Http\Controllers\TambonController::class, 'getZipcodes'] );

Route::get('check_follows', [App\Http\Controllers\TambonController::class, 'check_follows'] );

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

    Route::post('file-import', [LeadImportController::class, 'fileImport'])->name('file-import');

    Route::resource('/admin/pipeline', PipeLineController::class);
    Route::post('/api/api_post_status_pipeline', [App\Http\Controllers\PipeLineController::class, 'api_post_status_pipeline']);
    Route::get('api/del_pipeline/{id}', [App\Http\Controllers\PipeLineController::class, 'del_pipeline']);
    Route::post('/admin/change_pipe', [App\Http\Controllers\CrmLeadListController::class, 'change_pipe']);
    Route::post('/admin/add_new_pipeline_edit/{id}', [App\Http\Controllers\CrmLeadListController::class, 'add_new_pipeline_edit']);
    Route::post('/admin/add_timeline_pipeline/{id}', [App\Http\Controllers\CrmLeadListController::class, 'add_timeline_pipeline']);

    Route::get('/api/del_fileup/{id}', [App\Http\Controllers\LeadImportController::class, 'del_fileup']);
    Route::get('/admin/lead_import', [App\Http\Controllers\LeadImportController::class, 'lead_import']);

    Route::get('/api/get_all_orders', [App\Http\Controllers\CrmLeadListController::class, 'get_all_orders']);
    Route::get('/admin/all_orders', [App\Http\Controllers\CrmLeadListController::class, 'all_orders']);
    Route::get('/admin/waiting_distribute_crm', [App\Http\Controllers\CrmLeadListController::class, 'waiting_distribute_crm']);
    Route::get('/admin/crm_lead_list', [App\Http\Controllers\CrmLeadListController::class, 'view']);

    Route::get('/api/get_crm_lead_list', [App\Http\Controllers\CrmLeadListController::class, 'get_crm_lead_list']);
    Route::get('/api/get_waiting_distribute_crm', [App\Http\Controllers\CrmLeadListController::class, 'get_waiting_distribute_crm']);

    Route::post('/admin/change_upsale_id_wait', [App\Http\Controllers\CrmLeadListController::class, 'change_upsale_id_wait']);

    Route::post('/admin/add_change_upsale/{id}', [App\Http\Controllers\CrmLeadListController::class, 'add_change_upsale']);

    Route::get('/admin/crm_lead_list_order', [App\Http\Controllers\CrmLeadListController::class, 'index']);

    Route::get('/admin/crm_lead_list_view2/{id}', [App\Http\Controllers\CrmLeadListController::class, 'crm_lead_list_view2']);

    Route::get('/admin/crm_lead_list_view/{id}', [App\Http\Controllers\CrmLeadListController::class, 'crm_lead_list_view']);

    Route::post('/api/api_post_status_follow', [App\Http\Controllers\crmLeadFollowController::class, 'api_post_status_follow']);
    Route::post('/admin/add_following_pipe/{id}', [App\Http\Controllers\crmLeadFollowController::class, 'add_following_pipe']);
    Route::get('/admin/crm_lead_follow/', [App\Http\Controllers\crmLeadFollowController::class, 'crm_lead_follow']);
    Route::get('/api/get_crm_lead_follow/', [App\Http\Controllers\crmLeadFollowController::class, 'get_crm_lead_follow']);
    // Route::get('/admin/crm_lead_follow', function () {
    //     return view('admin.crm_lead_follow.index');
    // });

    Route::post('/admin/post_new_lead/', [App\Http\Controllers\OrderListController::class, 'post_new_lead']);
    Route::get('/admin/create_lead/', [App\Http\Controllers\OrderListController::class, 'create_lead']);
    Route::post('/admin/post_new_order/{id}', [App\Http\Controllers\OrderListController::class, 'post_new_order']);
    Route::get('/admin/add_order_list/{id}', [App\Http\Controllers\OrderListController::class, 'add_order_list']);

    Route::get('/admin/crm_lead_status', [App\Http\Controllers\CrmLeadListController::class, 'crm_lead_status']);

    Route::get('api/get_user_manager', [App\Http\Controllers\MyUserController::class, 'get_user_manager']);
    Route::resource('/admin/user_manager', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);
    Route::get('admin/users_search/', [App\Http\Controllers\MyUserController::class, 'users_search']);

    Route::get('api/get_customer', [App\Http\Controllers\CustomerController::class, 'get_customer']);
    Route::resource('/admin/customer_manager', CustomerController::class);
    Route::post('/api/api_post_status_customer', [App\Http\Controllers\CustomerController::class, 'api_post_status_customer']);
    Route::get('api/del_customer/{id}', [App\Http\Controllers\CustomerController::class, 'del_MyUser']);


    Route::resource('/admin/product_manager', ProductController::class);
    Route::post('/api/api_post_status_product_manager', [App\Http\Controllers\ProductController::class, 'api_post_status_product_manager']);
    Route::get('api/del_product_manager/{id}', [App\Http\Controllers\ProductController::class, 'del_product_manager']);

    Route::resource('/admin/category', CategoryController::class);
    Route::post('/api/api_post_status_category', [App\Http\Controllers\CategoryController::class, 'api_post_status_category']);
    Route::get('api/del_cat/{id}', [App\Http\Controllers\CategoryController::class, 'del_cat']);

    Route::resource('/admin/sale_contact', SaleContactController::class);
    Route::post('/api/api_post_status_sale_contact', [App\Http\Controllers\SaleContactController::class, 'api_post_status_sale_contact']);
    Route::get('api/del_sale_contact/{id}', [App\Http\Controllers\SaleContactController::class, 'del_sale_contact']);

    Route::resource('/admin/transport', TransportController::class);
    Route::post('/api/api_post_status_transport', [App\Http\Controllers\TransportController::class, 'api_post_status_transport']);
    Route::get('api/del_transport/{id}', [App\Http\Controllers\TransportController::class, 'del_transport']);

});
