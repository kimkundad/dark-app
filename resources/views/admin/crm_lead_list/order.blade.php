@extends('layouts.template')

@section('title')
    <title>รายการสินค้า</title>
@stop
@section('stylesheet')

@stop('stylesheet')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            สร้างคำสั่งซื้อใหม่</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">สร้างคำสั่งซื้อใหม่</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    
                    
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ url('admin/post_new_order/'.$id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            
                            <div class="card-body border-top p-9">

                                

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">นำเข้า Lead </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $lead_main->lead_name }}" readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เลือกสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="pro_id">
                                            <option value="">กรุณาเลือกสินค้า</option>
                                            @isset($objs)
                                            @foreach($objs as $u)
                                            <option value="{{$u->id}}">{{$u->pro_name}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('pro_id'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกสินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ขนส่ง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="tran_id">
                                            <option value="">กรุณาเลือกขนส่ง</option>
                                            @isset($transport)
                                            @foreach($transport as $u)
                                            <option value="{{$u->id}}">{{$u->transportname}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('tran_id'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกขนส่ง</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">การชำระเงิน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="lead_lists_payment_type">
                                            <option value="">กรุณาเลือกการชำระเงิน</option>
                                            <option value="เก็บเงินปลายทาง">เก็บเงินปลายทาง</option>
                                            <option value="COD">COD</option>
                                            <option value="Cash on delivery">Cash on delivery</option>
                                            <option value="การโอนเงิน">การโอนเงิน</option>
                                            <option value="MIXEDCARD">MIXEDCARD</option>
                                            <option value="Mobile Banking">Mobile Banking</option>
                                            <option value="PAYMENT_ACCOUNT">PAYMENT_ACCOUNT</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        @if ($errors->has('lead_lists_payment_type'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกการชำระเงิน</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">สถานะการชำระเงิน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="lead_lists_payment_status">
                                            <option value="">กรุณาเลือกสถานะการชำระเงิน</option>
                                            <option value="รอการอนุมัติ">รอการอนุมัติ</option>
                                            <option value="ยืนยันแล้ว">ยืนยันแล้ว</option>
                                        </select>
                                        @if ($errors->has('lead_lists_payment_status'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกสถานะการชำระเงิน</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">รายละเอียดการสั่งซื้อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <textarea class="form-control form-control-lg form-control-solid" id="textareaAutosize" placeholder="รายละเอียดการสั่งซื้อ..." rows="4" name="note" >{{old('note') ? old('note') : ''}} </textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ส่วนลดต่อชิ้น</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="number" name="discount_pro" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกส่วนลดต่อชิ้น..." value="{{old('discount_pro') ? old('discount_pro') : 0}}">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">จำนวนที่สั่งซื้อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="number" name="total_sale" class="form-control form-control-lg form-control-solid" placeholder="จำนวนที่สั่งซื้อ..." value="{{old('total_sale') ? old('total_sale') : ''}}">
                                        @if ($errors->has('total_sale'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกจำนวนที่สั่งซื้อ...</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ยอดรวมทั้งสิ้น</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="number" name="sum_price_final2" class="form-control form-control-lg form-control-solid" placeholder="ยอดรวมทั้งสิ้น..." value="{{old('sum_price_final2') ? old('sum_price_final2') : ''}}">
                                        @if ($errors->has('sum_price_final2'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกยอดรวมทั้งสิ้น...</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">วันที่สั่งซื้อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="input-group ">
                                            <input class="form-control form-control-solid rounded rounded-end-0" name="order_date" placeholder="กรุณากรอกวันที่สั่งซื้อ" id="kt_datepicker_1" />
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
                                        @if ($errors->has('order_date'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกวันที่สั่งซื้อ...</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">วันที่ชำระเงิน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="input-group ">
                                            <input class="form-control form-control-solid rounded rounded-end-0" name="pay_date" placeholder="กรุณากรอกวันที่ชำระเงิน" id="kt_datepicker_2" />
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
                                        @if ($errors->has('pay_date'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกวันที่ชำระเงิน...</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                               
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เลขที่คำสั่งซื้อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="code_lead_lists" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกเลขที่คำสั่งซื้อ..." value="{{old('code_lead_lists') ? old('code_lead_lists') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">หมายเลขพัสดุ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="tracking_no" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกหมายเลขพัสดุ..." value="{{old('tracking_no') ? old('tracking_no') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                              
                             
                                
                            

                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')
<script >
    $("#kt_datepicker_1").flatpickr();
    $("#kt_datepicker_2").flatpickr();
    </script>

@stop('scripts')
