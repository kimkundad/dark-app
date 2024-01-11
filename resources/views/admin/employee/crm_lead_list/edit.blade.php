@extends('admin.employee.layouts.template')

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
.fs-5{
    font-size:12px !important;
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
                    <div class="col-md-6 col-lg-6 col-xl-8 col-xxl-8 mb-md-5 mb-xl-10">
                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-body py-3">
                                <div class="d-flex justify-content-between">
                                    <div class="card-header" style="padding: 0 ;">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-5">ชื่อ Lead</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->lead_name }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header" style="padding: 0 ;">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-5">แหล่ะที่มา</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->salename }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header" style="padding: 0 ;">
                                        <h3 class="card-title align-items-start flex-column"> 
                                            <span class="text-gray-400 mt-1 fw-semibold fs-5">สร้างเมื่อวันที่</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->created_ats }}</span>
                                        </h3>
                                    </div>
                                    <div class="card-header" style="padding: 0 ;">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-gray-400 mt-1 fw-semibold fs-5">ดูแลโดย</span>
                                            <span class="card-label fw-bold text-dark fs-5">{{ $objs->name }}</span>
                                        </h3>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_change_upsale" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 " style="margin-top: 20px">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>

                                        <div class="modal fade" tabindex="-1" id="kt_modal_change_upsale">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">เปลี่ยนผู้ดูแล</h3>
                                            
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <form class="form" method="POST" action="{{ url('admin/add_change_upsale_em/'.$objs->id_q) }}" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                    <div class="modal-body">
        
                                            
                                                        <select class="form-select" aria-label="Select example" name="upsale_id">
                                                            <option value="">เปลี่ยนผู้ดูแล</option>
                                                            @if(isset($user))
                                                                @foreach($user as $u)
                                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        
        
                                                    </div>
                                            
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
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

                                        @if ($errors->has('sub_pipe_id'))
                                        <!--begin::Alert-->
                                        <div class="alert alert-danger d-flex align-items-center p-5">

                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column">

                                                <!--begin::Content-->
                                                <span>กรุณาเลือกสถานะที่ต้องการบันทึก..!</span>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Alert-->
                                        @endif

                                        <form class="form" method="POST" action="{{ url('admin/add_timeline_pipeline_em/'.$objs->id_q) }}" enctype="multipart/form-data">
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
                                            <input type="hidden" name="cus_id" value="{{ $objs->user_id_cus }}" />
                                            <input type="hidden" name="upsale_idx" value="{{ $objs->upsale_idx }}" />
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
                                                    <img src="{{ url('admin/assets/media/avatars/'.$u->avatar) }}" alt="" />
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
                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark fs-5">ข้อมูลลูกค้า</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{ url('admin/customer_manager_he/'.$objs->id_q.'/edit') }}" class="btn btn-sm btn-light">แก้ไขข้อมูลลูกค้า</a>
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
                                        <span class="fw-bold fs-5 text-gray-800">{{ $objs->fullname }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">เบอร์ติดต่อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-5 text-gray-800">{{ $objs->phones }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">อีเมล</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-5 text-gray-800">{{ $objs->emails }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">ที่อยู่</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-5 text-gray-800">{{ $objs->addressx }} {{ $objs->Subdistrict }} {{ $objs->district }} {{ $objs->province }} {{ $objs->county }} {{ $objs->zip_code }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>

                        <div class="card mb-5 mb-xl-8 ">
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark fs-5">ประวัติการสั่งซื้อ</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{ url('admin/add_order_list_em/'.$objs->id_q) }}" class="btn btn-sm btn-light">สร้างคำสั่งซื้อใหม่</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-5 gy-5" id="kt_security_license_usage_table">
                                        <!--begin::Thead-->
                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                            <tr>
                                                <th>เลขที่</th>
                                                <th class="min-w-100px">ชื่อสินค้า</th>
                                                <th>ราคา</th>
                                                <th class="min-w-100px">วันที่</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                            @isset($lead_list)
                                            @foreach($lead_list as $u)
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_{{ $u->id }}" class="text-hover-primary text-gray-600 fs-5">{{ $u->code_lead_lists }} </a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600 fs-5">{{ $u->pro_name }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600 fs-5">{{ number_format($u->sum_price_final,2) }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600 fs-5">{{ $u->created_ats }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    @if($u->lead_lists_statusx == 1)
                                                    <a href="" class="text-hover-primary text-gray-600 fs-5"><span class="badge badge-light-success fs-7 fw-bold">สำเร็จ</span></a>
                                                    @else
                                                    <a href="" class="text-hover-danger text-gray-600 fs-5"><span class="badge badge-light-danger fs-7 fw-bold">รอยืนยัน</span></a>
                                                    @endif
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
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->lead_lists_status_sale }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">การชำระเงิน</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->lead_lists_payment_type }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">สถานะการชำระเงิน</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->lead_lists_payment_status }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">หมายเลขพัสดุ</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->tracking_no }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">เลขที่ใบแจ้งหนี้</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->invoid_no }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">จำนวนสินค้า</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->total_sale }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">รวมทั้งสิ้น</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ number_format($u->sum_price_final,2) }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">พนักงานขาย</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->sale_employee }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-7">
                                                                <label class="col-lg-4 fw-semibold text-muted">พนักงานอัพเซล</label>
                                                                <div class="col-lg-8">
                                                                    <span class="fw-bold fs-5 text-gray-800">{{ $u->upsale_name }}</span>
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
                                    <span class="card-label fw-bold text-dark fs-5">กำหนดการติดตาม</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_add_follow" class="btn btn-sm btn-light">เพิ่มการติดตามใหม่</a>
                                </div>

                                <div class="modal fade" tabindex="-1" id="kt_modal_add_follow">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">เพิ่มการติดตามใหม่</h3>
                                    
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <form class="form" method="POST" action="{{ url('admin/add_following_pipe_em/'.$objs->id_q) }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                            <div class="modal-body">

                                                <div class="d-flex flex-column mb-8">
                                                    <label class="fs-5 fw-semibold mb-2">คำอธิบาย</label>
                                                    <textarea class="form-control form-control-solid" rows="3" name="note" placeholder="คำอธิบาย..."></textarea>
                                                    <input type="hidden" name="cus_id" value="{{ $objs->user_id_cus }}" />
                                                    <input type="hidden" name="upsale_idx" value="{{ $objs->upsale_idx }}" />
                                                </div>

                                                <select class="form-select" aria-label="Select example" name="sub_pipe_id">
                                                    <option value="">เลือกสถานะ</option>
                                                    @if(isset($sup_pipeline))
                                                        @foreach($sup_pipeline as $u)
                                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <div class="input-group mt-10">
                                                    <input class="form-control form-control-solid rounded rounded-end-0" name="date_follow" placeholder="วันที่นัดหมาย" id="kt_datepicker_1" />
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
                                                

                                            </div>
                                    
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
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
                                                <th class="min-w-50px">เลขที่</th>
                                                <th class="min-w-100px">แจ้งเตือนวันที่</th>
                                                <th>การติดตาม</th>
                                                <th class="min-w-100px">สถานะ</th>
                                                <th>เพิ่มโดย</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fw-6 fw-semibold text-gray-600">

                                            @if(isset($follow_pipes))
                                            @foreach($follow_pipes as $u)
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ $u->id_f }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ $u->date_follow }}</a>
                                                </td>
                                                <td class="ps-0">
                                                    @if($u->follow_pipes_status == 1)
                                                        <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ติดตามแล้ว</span></a>
                                                    @else
                                                        <a href="" class="text-hover-danger text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">รอติดตาม</span></a>
                                                    @endif
                                                    
                                                </td>
                                                <td class="ps-0">
                                                    @if($u->date_follow < date('Y-m-d'))
                                                        <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>
                                                    @else
                                                        <a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ยังไม่หมดอายุ</span></a>
                                                    @endif
                                                    
                                                </td>
                                                <td class="ps-0">
                                                    <a href="" class="text-hover-primary text-gray-600">{{ $u->name }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
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
