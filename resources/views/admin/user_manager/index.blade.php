@extends('layouts.template')

@section('title')
    <title>ข้อมูลพนักงาน</title>
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ข้อมูลพนักงาน</h1>
                    <!--end::Title-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">แดชบอร์ด</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">ข้อมูลพนักงาน</li>
                        <!--end::Item-->
                    </ul>
                    
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="{{ url('admin/user_manager/create') }}" class="btn btn-sm btn-success btn-flex" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                            <!--end::Svg Icon-->
                            สร้างพนักงานใหม่
                        </a>
                        
                    </div>
                    <!--end::Primary button-->
                </div>
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
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="d-flex flex-row-fluid justify-content-end">
                        <form action="{{url('admin/users_search')}}" method="GET" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-toolbar gap-5">
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" name="search" class="form-control form-control-solid w-250px ps-14" placeholder="ค้นหาจาก ชื่อ-นามสกุล" />
                            </div>
                            <button type="submit" class="btn btn-primary" >ค้นหา</button>
                            <!--end::Add product-->
                            
                        </div>
                    </form>
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
                                    
                                    <th >ลำดับที่</th>
                                    <th >ชื่อเข้าใช้งาน</th>
                                    <th >ชื่อ-นามสกุล</th>
                                    <th >เบอร์ติดต่อ</th>
                                    <th >สิทธิ์การใช้งาน</th>
                                    <th >วันที่เพิ่ม</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @isset($objs)
                                            @foreach ($objs as $item)
                                <tr id="{{$item->id_q}}">
                                    <!--begin::Checkbox-->
                                    <td>
                                        1
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="{{ url('images/dark-app/avatar/'.$item->avatar) }}" alt="Ana Crown" class="w-100" />
                                                    </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $item->names }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td class=" pe-0">
                                        <span >{{ $item->fname }}</span>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class=" pe-0">
                                        <span >{{ $item->phone }}</span>
                                    </td>
                                    <!--end::Status=-->
                                    
                                    <td class=" pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">{{ $item->name1 }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    
                                    <!--begin::Date Modified=-->
                                    <td class="" data-order="2022-10-05">
                                        <span class="fw-bold">{{ $item->created_ats }}</span>
                                    </td>
                                    
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        
                                        <a href="{{url('admin/user_manager/'.$item->id_q.'/edit')}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a href="{{ url('api/del_MyUser/'.$item->id_q) }}" onclick="return confirm('Are you sure?')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                               
                                @endforeach
                                @endisset
                                
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        @include('admin.pagination.default', ['paginator' => $objs])
                    </div>
                    
                </div>
                    <!--begin::Body-->
            </div>
                
            </div>
        <!--end::Content-->
    </div>
</div>

@endsection

@section('scripts')

<script >
$("#kt_datepicker_2").flatpickr();

</script>


@stop('scripts')
