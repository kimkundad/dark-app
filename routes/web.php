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
use App\Http\Controllers\PipeLineEmController;
use App\Http\Controllers\CustomerEmController;
use App\Http\Controllers\PipeLineHeController;
use App\Http\Controllers\CustomerHeController;

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

Route::group(['middleware' => ['UserRole:admin']], function() {

  Route::get('/admin/head_dashboard', [App\Http\Controllers\HeDashboardController::class, 'index']);
  Route::resource('/admin/pipeline_he', PipeLineHeController::class);
  Route::post('/api/api_post_status_pipeline_he', [App\Http\Controllers\PipeLineHeController::class, 'api_post_status_pipeline']);
  Route::get('api/del_pipeline_he/{id}', [App\Http\Controllers\PipeLineHeController::class, 'del_pipeline']);

  Route::post('/admin/post_new_lead_he/', [App\Http\Controllers\OrderListHeController::class, 'post_new_lead']);
  Route::get('/admin/create_lead_he/', [App\Http\Controllers\OrderListHeController::class, 'create_lead']);
  Route::post('/admin/post_new_order_he/{id}', [App\Http\Controllers\OrderListHeController::class, 'post_new_order']);
  Route::get('/admin/add_order_list_he/{id}', [App\Http\Controllers\OrderListHeController::class, 'add_order_list']);

  Route::get('/admin/crm_lead_list_he', [App\Http\Controllers\CrmLeadListHeController::class, 'view']);
  Route::get('/api/get_crm_lead_list_he', [App\Http\Controllers\CrmLeadListHeController::class, 'get_crm_lead_list']);
  Route::get('/admin/crm_lead_list_view2_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'crm_lead_list_view2']);

    Route::get('/admin/crm_lead_list_view_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'crm_lead_list_view']);

    Route::get('/api/get_all_orders_he', [App\Http\Controllers\CrmLeadListHeController::class, 'get_all_orders']);
    Route::get('/admin/all_orders_he', [App\Http\Controllers\CrmLeadListHeController::class, 'all_orders']);

    Route::get('/admin/crm_lead_follow_he/', [App\Http\Controllers\crmLeadFollowHeController::class, 'crm_lead_follow']);
    Route::get('/api/get_crm_lead_follow_he/', [App\Http\Controllers\crmLeadFollowHeController::class, 'get_crm_lead_follow']);

    Route::post('/api/api_post_status_follow_he', [App\Http\Controllers\crmLeadFollowHeController::class, 'api_post_status_follow']);
    Route::post('/admin/add_following_pipe_he/{id}', [App\Http\Controllers\crmLeadFollowHeController::class, 'add_following_pipe']);
    

    Route::post('/admin/change_pipe_he', [App\Http\Controllers\CrmLeadListHeController::class, 'change_pipe']);
    Route::post('/admin/add_new_pipeline_edit_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'add_new_pipeline_edit']);
    Route::post('/admin/add_timeline_pipeline_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'add_timeline_pipeline']);

    Route::get('/admin/crm_order_view_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'crm_order_view']);

    Route::post('/admin/add_change_upsale_he/{id}', [App\Http\Controllers\CrmLeadListHeController::class, 'add_change_upsale']);
    Route::get('api/get_customer_he', [App\Http\Controllers\CustomerHeController::class, 'get_customer']);
    Route::resource('/admin/customer_manager_he', CustomerHeController::class);
    Route::get('admin/customer_manager_his_he/{id}', [App\Http\Controllers\CustomerHeController::class, 'customer_manager_his']);
    Route::get('api/get_customer_manager_his_he/{id}', [App\Http\Controllers\CustomerHeController::class, 'get_customer_manager_his']);

    Route::get('/admin/waiting_distribute_crm_he', [App\Http\Controllers\CrmLeadListHeController::class, 'waiting_distribute_crm']);
    Route::get('/api/get_waiting_distribute_crm_he', [App\Http\Controllers\CrmLeadListHeController::class, 'get_waiting_distribute_crm']);

});

Route::group(['middleware' => ['UserRole:user']], function() {

  Route::get('/admin/employee_dashboard', [App\Http\Controllers\EmDashboardController::class, 'index']);
  Route::resource('/admin/pipeline_em', PipeLineEmController::class);
  Route::post('/api/api_post_status_pipeline_em', [App\Http\Controllers\PipeLineEmController::class, 'api_post_status_pipeline']);
  Route::get('api/del_pipeline_em/{id}', [App\Http\Controllers\PipeLineEmController::class, 'del_pipeline']);

  Route::post('/admin/post_new_lead_em/', [App\Http\Controllers\OrderListEmController::class, 'post_new_lead']);
  Route::get('/admin/create_lead_em/', [App\Http\Controllers\OrderListEmController::class, 'create_lead']);
  Route::post('/admin/post_new_order_em/{id}', [App\Http\Controllers\OrderListEmController::class, 'post_new_order']);
  Route::get('/admin/add_order_list_em/{id}', [App\Http\Controllers\OrderListEmController::class, 'add_order_list']);

  Route::get('/admin/crm_lead_list_em', [App\Http\Controllers\CrmLeadListEmController::class, 'view']);
  Route::get('/api/get_crm_lead_list_em', [App\Http\Controllers\CrmLeadListEmController::class, 'get_crm_lead_list']);
  Route::get('/admin/crm_lead_list_view2_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'crm_lead_list_view2']);

    Route::get('/admin/crm_lead_list_view_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'crm_lead_list_view']);

    Route::get('/api/get_all_orders_em', [App\Http\Controllers\CrmLeadListEmController::class, 'get_all_orders']);
    Route::get('/admin/all_orders_em', [App\Http\Controllers\CrmLeadListEmController::class, 'all_orders']);

    Route::get('/admin/crm_lead_follow_em/', [App\Http\Controllers\crmLeadFollowEmController::class, 'crm_lead_follow']);
    Route::get('/api/get_crm_lead_follow_em/', [App\Http\Controllers\crmLeadFollowEmController::class, 'get_crm_lead_follow']);

    Route::post('/api/api_post_status_follow_em', [App\Http\Controllers\crmLeadFollowEmController::class, 'api_post_status_follow']);
    Route::post('/admin/add_following_pipe_em/{id}', [App\Http\Controllers\crmLeadFollowEmController::class, 'add_following_pipe']);
    Route::get('/admin/crm_lead_follow_em/', [App\Http\Controllers\crmLeadFollowEmController::class, 'crm_lead_follow']);
    Route::get('/api/get_crm_lead_follow_em/', [App\Http\Controllers\crmLeadFollowEmController::class, 'get_crm_lead_follow']);

    Route::post('/admin/change_pipe_em', [App\Http\Controllers\CrmLeadListEmController::class, 'change_pipe']);
    Route::post('/admin/add_new_pipeline_edit_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'add_new_pipeline_edit']);
    Route::post('/admin/add_timeline_pipeline_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'add_timeline_pipeline']);

    Route::get('/admin/crm_order_view_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'crm_order_view']);

    Route::post('/admin/add_change_upsale_em/{id}', [App\Http\Controllers\CrmLeadListEmController::class, 'add_change_upsale']);
    Route::get('api/get_customer_em', [App\Http\Controllers\CustomerEmController::class, 'get_customer']);
    Route::resource('/admin/customer_manager_em', CustomerEmController::class);
    Route::get('admin/customer_manager_his_em/{id}', [App\Http\Controllers\CustomerEmController::class, 'customer_manager_his']);
    Route::get('api/get_customer_manager_his_em/{id}', [App\Http\Controllers\CustomerEmController::class, 'get_customer_manager_his']);

});

Route::group(['middleware' => ['UserRole:superadmin']], function() {

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
    Route::get('/admin/crm_order_view/{id}', [App\Http\Controllers\CrmLeadListController::class, 'crm_order_view']);

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


    Route::post('/admin/post_user_employee_create', [App\Http\Controllers\MyUserController::class, 'post_user_employee_create']);
    Route::get('admin/user_employee_create/{id}', [App\Http\Controllers\MyUserController::class, 'user_employee_create']);
    Route::get('api/get_employee_manager/{id}', [App\Http\Controllers\MyUserController::class, 'get_employee_manager']);
    Route::get('api/get_user_manager', [App\Http\Controllers\MyUserController::class, 'get_user_manager']);
    Route::resource('/admin/user_manager', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);
    Route::get('admin/employee/{id}', [App\Http\Controllers\MyUserController::class, 'employee']);

    Route::get('admin/users_search/', [App\Http\Controllers\MyUserController::class, 'users_search']);

    Route::get('api/get_customer', [App\Http\Controllers\CustomerController::class, 'get_customer']);
    Route::resource('/admin/customer_manager', CustomerController::class);
    Route::get('admin/customer_manager_his/{id}', [App\Http\Controllers\CustomerController::class, 'customer_manager_his']);
    Route::get('api/get_customer_manager_his/{id}', [App\Http\Controllers\CustomerController::class, 'get_customer_manager_his']);

    Route::post('/api/api_post_status_customer', [App\Http\Controllers\CustomerController::class, 'api_post_status_customer']);
    Route::get('api/del_customer/{id}', [App\Http\Controllers\CustomerController::class, 'del_MyUser']);


    Route::resource('/admin/product_manager', ProductController::class);
    Route::post('/api/api_post_status_product_manager', [App\Http\Controllers\ProductController::class, 'api_post_status_product_manager']);
    Route::get('api/del_product_manager/{id}', [App\Http\Controllers\ProductController::class, 'del_product_manager']);
    Route::get('admin/add_same_product/{name}/create/{price}', [App\Http\Controllers\ProductController::class, 'add_same_product']);
    Route::post('/admin/post_same_product', [App\Http\Controllers\ProductController::class, 'post_same_product']);
    

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
