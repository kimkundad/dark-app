@extends('layouts.template')

@section('title')
    <title>รายการติดตามทั้งหมด</title>
@stop
@section('stylesheet')

<style>

ol.stepper {
  --default-b: lightgrey;
  --default-c: black;
  --active-b: purple;
  --active-c: white;
  --circle: 45px; /* size of circle */
  --b: 2px; /* line thickness */
  
  display: flex;
  list-style: none;
  justify-content: space-between;
  background: 
    linear-gradient(var(--default-b) 0 0) no-repeat
    50% calc((var(--circle) - var(--b))/2)/100% var(--b);
  counter-reset: step;
  margin: 20px;
  padding: 0;
  font-size: 16px;
  font-weight: bold;
  counter-reset: step;
  overflow: hidden;
}
ol.stepper li {
  display: grid;
  place-items: center;
  gap: 5px;
  font-family: sans-serif;
  position: relative;
  font-size: 14px
}
ol.stepper li::before {
  content: counter(step) " ";
  counter-increment: step;
  display: grid;
  place-content: center;
  aspect-ratio: 1;
  height: var(--circle);
  border: 5px solid #fff;
  box-sizing: border-box;
  background: var(--active-b);
  color: var(--active-c);
  border-radius: 50%;
  font-family: monospace;
  z-index: 1;
}
ol.stepper li.active ~ li::before{
  background: var(--default-b);
  color: var(--default-c);
}
ol.stepper li.active::after {
  content: "";
  position: absolute;
  height: var(--b);
  right: 100%;
  top: calc((var(--circle) - var(--b))/2);
  width: 100vw;
  background: var(--default-b);
}

</style>

@stop('stylesheet')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ข้อมูล Lead</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">แดชบอร์ด</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            รายการติดตามทั้งหมด
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">รายละเอียด</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Title-->
                </div>

                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                   
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
            <div id="kt_app_content_container" class="app-container container-fluid">

                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-8 mb-md-5 mb-xl-10">
                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-body py-3">
                                <div class="d-flex justify-content-between">
                                    <div class="card-header">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">ชื่อ Lead</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->lead_name }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">แหล่ะที่มา</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->salename }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title align-items-start flex-column"> 
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">สร้างเมื่อวันที่</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->created_ats }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">ดูแลโดย</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->name }}</span>
                                        </h3>
                                    </div>
                                </div>

                                @if($objs->id_p == 4)
                                <div class="text-center mt-10 mb-10">
                                    <h5>ยังไม่ได้เลือก Pipeline</h5>
                                </div>
                                <form class="form" method="POST" action="{{ url('admin/add_new_pipeline_edit/'.$objs->id_q) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div>
                                        <div>
                                            <select class="form-select" aria-label="Select example" name="pipe_id">
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
                                            <button  type="submit" class="btn btn-sm fw-bold btn-primary">บันทึก</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                    <div class="mt-10">
                                        <ol class="stepper">
                                            @if(isset($sup_pipeline))
                                                @foreach($sup_pipeline as $u)
                                                    <li 
                                                    @if($timeline_check)
                                                    @if($timeline_check->sub_pipe_id == $u->id)
                                                    class="active"
                                                    @endif 
                                                    @else
                                                    class="active"
                                                    @endif 
                                                    >{{ $u->name }}</li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </div>

                                    <div class="mt-10">

                                        <form class="form" method="POST" action="{{ url('admin/add_timeline_pipeline/'.$objs->id_q) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <div class="d-flex align-items-center">
                                            <!--begin::Author-->
                                            <div class="symbol symbol-35px me-3">
                                                <img src="{{ url('admin/assets/media/avatars/300-3.jpg') }}" alt="" />
                                            </div>
                                            <!--end::Author-->
                                            <!--begin::Input group-->
                                            <div class="position-relative w-100">
                                                <!--begin::Input-->
                                                <textarea type="text" 
                                                class="form-control form-control-solid border ps-5" 
                                                rows="4" 
                                                name="note"
                                                data-kt-autosize="true" 
                                                placeholder="คำอธิบาย.."></textarea>
                                                <!--end::Input-->
                                            
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-between">
    
                                            <div style="max-width: 160px; margin-left: 45px">
                                                <select class="form-select" aria-label="Select example" name="sub_pipe_id">
                                                    <option value="">เลือกสถานะ</option>
                                                    @if(isset($sup_pipeline))
                                                        @foreach($sup_pipeline as $u)
                                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
    
                                            <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                                <span class="indicator-label">บันทึก</span>
                                            </button>
                                        </div>
                                        </form>
                                        <br>
                                        <div>


                                            @isset($time_line)
                                            @foreach($time_line as $u)


                                            <div class="d-flex pt-6">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    <img src="{{ url('admin/assets/media/avatars/300-3.jpg') }}" alt="" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-row-fluid">
                                                    <!--begin::Info-->
                                                    <div class="d-flex align-items-center flex-wrap mb-0">
                                                        <!--begin::Name-->
                                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">{{ $u->name }}</a>
                                                        <!--end::Name-->
                                                        <!--begin::Date-->
                                                        <span class="text-gray-400 fw-semibold fs-7 me-5">{{ $u->created_ats }}</span>
                                                        <!--end::Date-->
                                                        <!--begin::Reply-->
                                                        <span class="ms-auto badge py-3 px-4 fs-7 badge-light-success">{{ $u->namesub }}</span>
                                                        <!--end::Reply-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Text-->
                                                    <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $u->note }}</span>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>


                                            @endforeach
                                            @endisset

                                            {{-- <!--begin::Comment-->
                                            <div class="d-flex pt-6">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    <img src="{{ url('admin/assets/media/avatars/300-3.jpg') }}" alt="" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-row-fluid">
                                                    <!--begin::Info-->
                                                    <div class="d-flex align-items-center flex-wrap mb-0">
                                                        <!--begin::Name-->
                                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mr. Anderson</a>
                                                        <!--end::Name-->
                                                        <!--begin::Date-->
                                                        <span class="text-gray-400 fw-semibold fs-7 me-5">1 Day ago</span>
                                                        <!--end::Date-->
                                                        <!--begin::Reply-->
                                                        <a href="#" class="ms-auto text-gray-400 text-hover-primary fw-semibold fs-7">Reply</a>
                                                        <!--end::Reply-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Text-->
                                                    <span class="text-gray-800 fs-7 fw-normal pt-1">ขึ้นทะเบียนลูกค้ามือหนึ่ง</span>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div> --}}

                                            
                                        </div>
                                        <br>
                                    </div>
                                @endif
                                

                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-md-5 mb-xl-10">
                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark fs-6">ข้อมูลลูกค้า</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{ url('admin/customer_manager/11/edit') }}" class="btn btn-sm btn-light">แก้ไขข้อมูลลูกค้า</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <div class="card-body py-3">
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">ชื่อลูกค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $objs->fullname }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">เบอร์ติดต่อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $objs->phones }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">อีเมล</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $objs->emails }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">ที่อยู่</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $objs->address }} {{ $objs->Subdistrict }} {{ $objs->district }} {{ $objs->province }} {{ $objs->county }} {{ $objs->zip_code }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>

                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark fs-6">ประวัติการสั่งซื้อ</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">สร้างคำสั่งซื้อใหม่</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4" id="kt_security_license_usage_table">
                                        <!--begin::Thead-->
                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                            <tr>
                                                <th>เลขที่</th>
                                                <th>ชื่อสินค้า</th>
                                                <th>ราคา</th>
                                                <th>วันที่</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                            @isset($lead_list)
                                            @foreach($lead_list as $u)
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_{{ $u->id }}" class="text-hover-primary text-gray-600">{{ $u->code_lead_lists }} </a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ $u->pro_name }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ number_format($u->sum_price_final,2) }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ $u->created_ats }}</a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" tabindex="-1" id="kt_modal_stacked_{{ $u->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">เลขที่คำสั่งซื้อ #{{ $u->code_lead_lists }}</h3>
                                                
                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                
                                                        <div class="modal-body">

                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">สถานะคำสั่งซื้อ</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->lead_lists_status_sale }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">การชำระเงิน</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->lead_lists_payment_type }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">สถานะการชำระเงิน</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->lead_lists_payment_status }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">หมายเลขพัสดุ</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->tracking_no }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">เลขที่ใบแจ้งหนี้</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->invoid_no }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">จำนวนสินค้า</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->total_sale }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">รวมทั้งสิ้น</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ number_format($u->sum_price_final,2) }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">พนักงานขาย</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->sale_employee }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">พนักงานอัพเซล</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-6 text-gray-800">{{ $u->upsale_name }}</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                            @endforeach
                                            @endisset
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                        </div>

                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark fs-6">กำหนดการติดตาม</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">เพิ่มการติดตามใหม่</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4" id="kt_security_license_usage_table">
                                        <!--begin::Thead-->
                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                            <tr>
                                                <th>เลขที่</th>
                                                <th>แจ้งเตือนวันที่</th>
                                                <th>การติดตาม</th>
                                                <th>สถานะ</th>
                                                <th>เพิ่มโดย</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">1 </a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">20/11/2023 15:09</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ติดตามแล้ว</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">อ.อ้อม</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">1 </a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">20/11/2023 15:09</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ติดตามแล้ว</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">อ.อ้อม</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">1 </a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">20/11/2023 15:09</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ติดตามแล้ว</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">อ.อ้อม</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
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
