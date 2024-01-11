@extends('admin.head.layouts.template')

@section('title')
    <title>สร้าง Lead ใหม่</title>
@stop
@section('stylesheet')

@stop('stylesheet')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex justify-content-center" >
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">สร้าง Lead ใหม่</h1>
                    <!--end::Title-->
                </div>
            </div>
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">


                <div class="card mb-5 mb-xl-8 ">
                    
                    <!--begin::Body-->
                    <div class="card-body py-3" style="padding-top: 20px;">
                        <div class="mt-10">

                            @if ($errors->has('lead_name'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณากรอกชื่อ Lead</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('fullname'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณากรอกชื่อ-นามสกุล</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('phone'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณากรอกหมายเลขโทรศัพย์</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('lead_lists_channels'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือกช่องทางการขาย</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('pip_id'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือก Pipeline</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('upsale_id'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณากำหนดผู้ดูแล Lead</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('end_date'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือก วันที่หมดอายุ</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('province'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือกจังหวัด</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('district'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือกเขต/อำเภอ</span>
                                </div>
                            </div>
                            @endif

                            @if ($errors->has('Subdistrict'))
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <div class="d-flex flex-column">
                                    <span>กรุณาเลือกแขวง/ตำบล</span>
                                </div>
                            </div>
                            @endif

                        </div>
                        <br><br>
    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper" data-kt-stepper="true">
        <!--begin::Aside-->
        <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
            <!--begin::Nav-->
            <div class="stepper-nav ps-lg-10">
                <!--begin::Step 1-->
                <div class="stepper-item current" data-kt-stepper-element="nav">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">1</span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">สร้าง Lead ใหม่</h3>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 1-->
                <!--begin::Step 2-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">2</span>
                        </div>
                        <!--begin::Icon-->
                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">ข้อมูล Lead</h3>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 2-->
                <!--begin::Step 3-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">3</span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">ข้อมูลที่อยู่ลูกค้า</h3>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 3-->
            </div>
            <!--end::Nav-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid py-lg-5 px-lg-15">
            <!--begin::Form-->
            <form class="form"  method="POST" action="{{ url('admin/post_new_lead_he') }}" id="kt_modal_create_app_form">
                
                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">
                    {{ csrf_field() }}
                    <div class="w-100">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">ชื่อ Lead</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="lead_name" value="{{old('lead_name') ? old('lead_name') : ''}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">ชื่อ-นามสกุล</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="fullname" value="{{old('fullname') ? old('fullname') : ''}}" />
                            <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="">ชื่อโซเชียล</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="nickname" value="{{old('nickname') ? old('nickname') : ''}}" />
                            <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span>อีเมล</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="email" value="{{old('email') ? old('email') : ''}}" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">หมายเลขโทรศัพย์ 1</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{old('phone') ? old('phone') : ''}}" />
                            <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="">หมายเลขโทรศัพย์ 2</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="phone2" value="{{old('phone2') ? old('phone2') : ''}}" />
                            <!--end::Input-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Step 1-->
                <!--begin::Step 2-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >คำอธิบาย</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="5" name="note">{{old('note') ? old('note') : ''}}</textarea>
                            <!--end::Input-->
                        </div>

                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">ช่องทางการขาย</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example" name="lead_lists_channels">
                                <option value="">เลือกช่องทางการขาย</option>
                                @if(isset($sale_contact))
                                    @foreach($sale_contact as $u)
                                        <option value="{{ $u->id }}">{{ $u->salename }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">เลือก Pipeline</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example" name="pip_id">
                                <option value="">เลือก Pipeline</option>
                                @if(isset($pipeline))
                                    @foreach($pipeline as $u)
                                        <option value="{{ $u->id }}">{{ $u->pipe_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">กำหนดผู้ดูแล Lead</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example" name="upsale_id">
                                <option>เลือก พนักงาน</option>
                                @if(isset($User))
                                    @foreach($User as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">วันที่หมดอายุ</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group ">
                                <input class="form-control form-control-solid rounded rounded-end-0" name="end_date" placeholder="วันที่หมดอายุ" id="kt_datepicker_1" />
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
                            <!--end::Input-->
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Step 2-->
                <!--begin::Step 3-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">ที่อยู่</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="5" name="address">{{old('address') ? old('address') : ''}}</textarea>
                            <!--end::Input-->
                        </div>

                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">กรุณาเลือกจังหวัด</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" id="input_province" name="province" aria-label="Select example">
                                <option value="">กรุณาเลือกจังหวัด</option>
                                @foreach($provinces as $item)
                                    <option value="{{ $item->province }}">{{ $item->province }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">กรุณาเลือกเขต/อำเภอ</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" id="input_amphoe" name="district" aria-label="Select example">
                                <option value="">กรุณาเลือกเขต/อำเภอ</option>
                                @foreach($amphoes as $item)
                                <option value="{{ $item->amphoe }}">{{ $item->amphoe }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">กรุณาเลือกแขวง/ตำบล</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" id="input_tambon" name="Subdistrict" aria-label="Select example">
                                <option value="">กรุณาเลือกแขวง/ตำบล</option>
                                @foreach($tambons as $item)
                                <option value="{{ $item->tambon }}">{{ $item->tambon }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">รหัสไปรษณีย์</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="input_zipcode" class="form-control form-control-lg form-control-solid" name="zip_code" placeholder="" value="{{old('zip_code') ? old('zip_code') : ''}}" />
                            <!--end::Input-->
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Step 3-->
            
                <!--begin::Actions-->
                <div class="d-flex flex-stack pt-10">
                    <!--begin::Wrapper-->
                    <div class="me-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-3 me-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->ย้อนกลับ</button>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div>
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                            <span class="indicator-label">บันทึกข้อมูล
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-3 ms-2 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                </svg>
                            </span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">ถัดไป
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-3 ms-1 me-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon--></button>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
                        
                        
                    </div>
                    <!--begin::Body-->
                </div>
                
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    
</div>

@endsection

@section('scripts')

<script >

    $("#kt_datepicker_1").flatpickr();
    var element = document.querySelector("#kt_modal_create_app_stepper");

    // Initialize Stepper
    var stepper = new KTStepper(element);

    // Handle next step
    stepper.on("kt.stepper.next", function (stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
    });

</script>


<script>   
    function showAmphoes() {
        let input_province = document.querySelector("#input_province");
        let url = "{{ url('/api/amphoes') }}?province=" + input_province.value;
        console.log(url);
        // if(input_province.value == "") return;
        fetch(url)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_amphoe = document.querySelector("#input_amphoe");
                input_amphoe.innerHTML = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    input_amphoe.appendChild(option);
                }
                //QUERY AMPHOES
                showTambons();
            });
    }
function showTambons() {
        let input_province = document.querySelector("#input_province");
        let input_amphoe = document.querySelector("#input_amphoe");
        let url = "{{ url('/api/tambons') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value;
        console.log(url);        
        // if(input_province.value == "") return;        
        // if(input_amphoe.value == "") return;
        fetch(url)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_tambon = document.querySelector("#input_tambon");
                input_tambon.innerHTML = '<option value="">กรุณาเลือกแขวง/ตำบล</option>';
                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.tambon;
                    option.value = item.tambon;
                    input_tambon.appendChild(option);
                }
                //QUERY AMPHOES
                showZipcode();
            });
    }
function showZipcode() {
        let input_province = document.querySelector("#input_province");
        let input_amphoe = document.querySelector("#input_amphoe");
        let input_tambon = document.querySelector("#input_tambon");
        let url = "{{ url('/api/zipcodes') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value + "&tambon=" + input_tambon.value;
        console.log(url);        
        // if(input_province.value == "") return;        
        // if(input_amphoe.value == "") return;     
        // if(input_tambon.value == "") return;
        fetch(url)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_zipcode = document.querySelector("#input_zipcode");
                input_zipcode.value = "";
                for (let item of result) {
                    input_zipcode.value = item.zipcode;
                    break;
                }
            });
}
//EVENTS
    document.querySelector('#input_province').addEventListener('change', (event) => {
        showAmphoes();
    });
    document.querySelector('#input_amphoe').addEventListener('change', (event) => {
        showTambons();
    });
    document.querySelector('#input_tambon').addEventListener('change', (event) => {
        showZipcode();
    });
</script>


@stop('scripts')
