@extends('layouts.template')

@section('title')
    <title>รายการแจ้งเตือนติดตามลูกค้าอ</title>
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
                        <li class="breadcrumb-item text-muted">รายการติดตามลูกค้า</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">รายการแจ้งเตือนติดตามลูกค้า</li>
                        <!--end::Item-->
                    </ul>
                    <div><span class="badge badge-primary">จำนวน {{ $count  }} รายการ</span></div>
                    
                </div>
                <!--end::Page title-->
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
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Flatpickr-->
                            <div class="input-group w-250px">
                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="วันที่เริ่มต้น" id="kt_datepicker_2" />
                                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor"></path>
                                                            <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor"></path>
                                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <div class="input-group w-250px">
                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="วันที่สิ้นสุด" id="kt_ecommerce_sales_flatpickr" />
                                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor"></path>
                                                            <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor"></path>
                                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
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
                            <!--end::Flatpickr-->
                            <!--begin::Flatpickr-->
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="สถานะผู้ติดตาม" data-kt-ecommerce-order-filter="status">
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
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="สถานะ" data-kt-ecommerce-order-filter="status">
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
                                    <th>วันที่แจ้งเตือน</th>
                                    <th>รายการ LEAD</th>
                                    <th class="text-end ">Pipeline</th>
                                    <th class="text-end ">สถานะ</th>
                                    <th class="text-end min-w-175px">หมายเหตุ</th>
                                    <th class="text-end ">สถานะการติดตาม</th>
                                    <th class="text-end ">สถานะแจ้งเตือน</th>
                                    <th class="text-end ">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                <!--begin::Table row-->

                                @if(isset($objs))
                                @foreach($objs as $u)
                                <tr id="{{ $u->id_f }}">
                                    
                                    <td class="text-start" data-order="2022-10-05">
                                        <span class="fw-bold">{{ $u->date_follow }}</span>
                                    </td>

                                    <td>
                                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $u->lead_name }}</a>
                                                    <span class="text-muted fw-semibold d-block fs-7">โดย {{ $u->name }}</span>
                                                </td>
                                    <!--begin::Status=-->
                                    <td class="text-end pe-0">
                                        <span >{{ $u->pipe_name }}</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">{{ $u->sub_namex }}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <span >{{ $u->notes }}</span>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <td class="text-end pe-0">
                                        @if($u->follow_pipes_status == 1)
                                        <a class="clickme">
                                        <span class="badge py-3 px-4 fs-7 badge-light-success">
                                            <span class="svg-icon svg-icon-1 svg-icon-success"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
                                            </svg>
                                            </span> ติดตามแล้ว</span>
                                        </a>
                                        @else
                                        <a class="clickme">
                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor"/>
                                            </svg>
                                            </span> รอติดตาม
                                        </span>
                                        </a>
                                        @endif
                                    </td>
                                    
                                    <td class="text-end pe-0" data-order="Completed">
                                        @if($u->date_follow < date('Y-m-d'))
                                            <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>
                                        @else
                                            <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ใช้งานได้</span></a>
                                        @endif
                                    </td>
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                @endforeach
                                @endif
                                <!--begin::Table row-->
                              
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
$("#kt_datepicker_2").flatpickr();
$("#kt_ecommerce_sales_flatpickr").flatpickr();
</script>


<script type="text/javascript">
    $(document).ready(function(){
      $(".clickme").on('click', function() {
        var user_id = $(this).closest('tr').attr('id');
        console.log('user_id', user_id)
        $.ajax({
                type:'POST',
                url:'{{url('api/api_post_status_follow')}}',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "user_id" : user_id },
                success: function(data){
                  if(data.data.success === 200){
    
                    console.log('data.success', data.data.stat)

                    Swal.fire({
                        text: "ระบบได้ทำการอัพเดทข้อมูลสำเร็จ!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                    $('.clickme').html("");

                    if(data.data.stat === 1){

                        var cols = '<span class="badge py-3 px-4 fs-7 badge-light-success"><span class="svg-icon svg-icon-1 svg-icon-success"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/><path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/></svg></span> ติดตามแล้ว</span>';
                        $('.clickme').prepend(cols);

                    }else{

                        var cols = '<span class="badge py-3 px-4 fs-7 badge-light-danger"><span class="svg-icon svg-icon-1 svg-icon-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor"/><path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor"/></svg></span> รอติดตาม</span>';
                        $('.clickme').prepend(cols);

                    }
    
    
    
                  }
                }
            });
        });
    });
    </script>


@stop('scripts')
