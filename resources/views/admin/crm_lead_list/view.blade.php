@extends('layouts.template')

@section('title')
    <title>รายการติดตามทั้งหมด</title>
@stop
@section('stylesheet')

<style>
    .hidden{
        display: none !important;
    }
</style>

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
                        <a href="{{ url('admin/create_lead') }}" class="btn btn-sm btn-success btn-flex" >
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

                        <div class="table-responsive">
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
                                    <th class="min-w-175px">ชื่อลูกค้า</th>
                                    <th class="min-w-100px">ช่องทาง</th>
                                    <th class="text-end min-w-100px">เบอร์ติดต่อ</th>
                                    <th class="text-end min-w-100px">ผู้ดูแล</th>
                                    <th class="text-end min-w-100px">Pipeline</th>
                                    <th class="text-end min-w-100px">สถานะ</th>
                                    <th class="text-end min-w-100px">วันหมดอายุ</th>
                                    <th class="text-end min-w-100px">สร้างเมื่อ</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                <!--begin::Table row-->
                                @isset($objs)
                                @foreach ($objs as $u)
                                <tr id="{{$u->id_q}}">
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    
                                    <!--begin::Customer=-->
                                    <td class=" pe-0">
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-35px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="{{ url('images/dark-app/avatar/'.$u->avatars) }}" alt="{{ $u->fullname }}" class="w-100" />
                                                    </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <div>
                                                <!--begin::Title-->
                                                <a class="text-gray-800 text-hover-primary fw-bold" style="font-size: 12px;">{{ $u->fullname }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <!--end::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-35px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="{{ url('images/dark-app/saleContact/'.$u->sale_img) }}" alt="{{ $u->salename }}" class="w-100">
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >{{ $u->phones }}</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0">
                                        @if($u->upsale_id == 0)
                                        ยังไม่ระบุ
                                        @else
                                        <span >{{ $u->names }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">{{ $u->pipe_name }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Modified=-->
                                    
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">ว่างๆ</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end" data-order="2022-10-05">
                                        <span style="font-size: 12px;">{{ $u->end_date }}</span>
                                    </td>
                                    <td class="text-end" data-order="2022-10-05">
                                        <span style="font-size: 12px;">{{ $u->created_ats }}</span>
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
                                                <a href="{{ url('admin/crm_lead_list_view/'.$u->id_q) }}" class="menu-link px-3">ดูรายละเอียด</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="javascript:void(0)" data-id="{{$u->id_q}}" data-pipe="{{$u->pipe_name}}" class="menu-link px-3 openModal" >ย้าย Pipline</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" >ยกเลิกติดตาม</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                @endforeach
                                @endisset
                                
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        </div>
                        @include('admin.pagination.default', ['paginator' => $objs])
                    </div>
                        
                </div>
                    <!--begin::Body-->
            </div>
                
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
</div>


<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h2 class="mb-3">ย้าย Pipline</h2>
                    <!--end::Title-->
                    <!--begin::Description-->
                    
                    <!--end::Description-->
                </div>
                <div>
                    <input type="hidden" name="idx" id="docterId" />
                    <div class="text-left">
                        <div class="fs-3 fw-bold text-dark">ต้นทาง Pipeline</div>
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7" id="pipe_name"></p>
                    </div>
                    <!--begin::Alert-->
                    <div class="alert alert-success d-flex align-items-center p-5 hidden" id="el">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column">
                            <!--begin::Title-->
                            <h4 class="mb-1 text-dark">ยินดีด้วย</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>ระบบได้ทำการอัพเดทข้อมูลของคุณเรียบร้อยแล้วครับ</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
                    <div>
                        <select class="form-select" aria-label="Select example" id="ddlViewBy">
                            <option value="">เลือก Pipeline</option>
                                @isset($pipe)
                                    @foreach($pipe as $u)
                                    <option value="{{$u->id}}">{{ $u->pipe_name }}</option>
                                    @endforeach
                                @endisset
                        </select>
                    </div>

                    <br>
                    <div class="text-center">
                        <a href="#" id="addAppointment" class="btn btn-sm fw-bold btn-primary">บันทึก</a>
                    </div>
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

@endsection

@section('scripts')

<script >

    $(document).on('click', '.openModal', function () {
        var id = $(this).data('id');
        var pipe_name = $(this).data('pipe');
        $("#pipe_name").text(pipe_name);

        $('#docterId').val(id);
         $('#kt_modal_view_users').modal('show');
    })

    $('a#addAppointment').on('click', function(e) {
        e.preventDefault();
        var id = $('#docterId').val();
        var e = document.getElementById("ddlViewBy");
        var value = e.value;

        if(value){
            console.log('value', value);

            $.ajax({
            url: "{{url('admin/change_pipe')}}",
            type:"POST",
            data:{
                pipe:value,
                id:id,
                _token:'{{ csrf_token() }}',
            },
            success:function(response){
                if(response){
                    console.log('response', response);
                    const el = document.querySelector('#el');
                    el.classList.remove("hidden");

                    setTimeout(function(){ 

                        var d = document.getElementById("el");
                        d.className += " hidden";

                     }, 2000);

                     setTimeout(function(){ 

                        window.location.reload();

                    }, 2500);

                     
                }
            }
        });
        }

        

    });

</script>


@stop('scripts')
