@extends('layouts.template')

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
            <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">
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
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">ชื่อผู้ติดต่อ</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                            <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">นามสกุล</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">หมายเลขโทรศัพย์</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                            <!--end::Input-->
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
                            <textarea class="form-control form-control-solid" rows="5" name="notes"></textarea>
                            <!--end::Input-->
                        </div>

                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >ช่องทางการขาย</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>ไม่ระบุ</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >เลือก Pipeline</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>เลือก Pipeline</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >กำหนดผู้ดูแล Lead</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>เลือก พนักงาน</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >จำนวนวันที่หมดอายุ</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="1" />
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
                                <span >ที่อยู่</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="5" name="notes"></textarea>
                            <!--end::Input-->
                        </div>

                        <div class="row mb-10 fv-row fv-plugins-icon-container">
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >เลือกจังหวัด</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>กรุงเทพมหานคร</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >อำเภอ</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>อ.</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >ตำบล</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>ต.</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                            <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >รหัสไปรษณีย์</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                        <!--end::Svg Icon-->Back</button>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                            <span class="indicator-label">Submit
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-3 ms-2 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--></span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
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


@stop('scripts')
