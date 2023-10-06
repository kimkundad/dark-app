@extends('layouts.template')

@section('title')
    <title>นำเข้า Lead จากคำสั่งซื้อ</title>
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">นำเข้า Lead จากคำสั่งซื้อ</h1>
                    <!--end::Title-->
                </div>
            </div>
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">


                <div class="card mb-5 mb-xl-8 ">

                    <div class="card-header ">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">กำหนดรายการนำเข้าจาก คำสั่งซื้อ</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                    
                    <!--begin::Body-->
                    <div class="card-body py-3" >
                        
                        <div class="w-100">
                            <div class="row mb-10 fv-row fv-plugins-icon-container">
                                <div class="col-6 mb-10">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span >เลือกวันที่สั่งซื้อ</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" placeholder="เลือกวันที่สั่งซื้อ" id="kt_datepicker_1"/>
                            <!--end::Input-->
                            </div>
                                <div class="col-6 mb-10">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span >เลือกหมวดหมู่</span>
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
                                <span >เลือก PipeLine</span>
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
                                <span >เลือกผู้ดูแล Lead</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example">
                                <option>กำหนดจาก คำสั่งซื้อ</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!--end::Input-->
                            </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">จำนวนวันที่หมดอายุ</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="1" />
                                <!--end::Input-->
                                </div>
                                <div class="col-12 text-center">
                                    <a href="#" class="btn btn-success er fs-6 px-8 py-4">
                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/files/fil018.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"/>
                                            <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor"/>
                                            </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        นำเข้าข้อมูล</a>
                                </div>
                            </div>
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

</script>


@stop('scripts')
