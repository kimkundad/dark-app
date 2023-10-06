@extends('layouts.template')

@section('title')
    <title>รายการติดตามทั้งหมด</title>
@stop
@section('stylesheet')

@stop('stylesheet')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">รายการติดตามทั้งหมด</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-success btn-flex" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
<!--end::Svg Icon-->
                        ติดตามลูกค้าใหม่</a>
                        
                    </div>
                    <!--end::Filter menu-->
                    <!--begin::Secondary button-->
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                        <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"/>
<path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor"/>
<path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor"/>
</svg>
</span>
นำเข้าทะเบียนลูกค้าใหม่</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">


                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="ค้นหาลูกค้า" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Flatpickr-->
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="วันหมดอายุ" data-kt-ecommerce-order-filter="status">
                                    <option></option>
                                    <option value="all">All</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Denied">Denied</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Refunded">Refunded</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Delivering">Delivering</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Flatpickr-->
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="เลือกผู้ดูแล" data-kt-ecommerce-order-filter="status">
                                    <option></option>
                                    <option value="all">All</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Denied">Denied</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Refunded">Refunded</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Delivering">Delivering</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--begin::Add product-->
                            <a class="btn btn-primary">ค้นหา</a>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-175px">ชื่อ-นามสกุล</th>
                                    <th class="min-w-175px">ที่อยู่</th>
                                    <th class="text-end min-w-100px">เบอร์ติดต่อ</th>
                                    <th class="text-end min-w-100px">ผู้ดูแล</th>
                                    <th class="text-end min-w-100px">Pipeline</th>
                                    <th class="text-end min-w-100px">วันหมดอายุ</th>
                                    <th class="text-end min-w-100px">สร้างเมื่อ</th>
                                    <th class="text-end min-w-100px">สถานะ</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class="text-end pe-0">
                                        <span >20/426 ถนน ราษฎร์พัฒนา แขวง สะพานสูง เขต สะพานสูง จังหวัด กรุงเทพมหานคร 10240</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >0958467417</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        <span >อ้อม สดใส</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">1 กล่อง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Added=-->
                                    <td class="text-end" data-order="2022-10-03">
                                        <div class="badge badge-light-success">ใช้งาน</div>
                                        <span class="fw-bold">03/10/2022</span>
                                    </td>
                                    <!--end::Date Added=-->
                                    <!--begin::Date Modified=-->
                                    <td class="text-end" data-order="2022-10-05">
                                        <span class="fw-bold">05/10/2022</span>
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">โทรถามว่าของถึง</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                        
                </div>
                    <!--begin::Body-->
            </div>
                
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
</div>

@endsection

@section('scripts')

<script >
$("#kt_datepicker_1").flatpickr();

</script>


@stop('scripts')
