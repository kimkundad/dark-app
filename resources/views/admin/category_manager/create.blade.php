@extends('layouts.template')

@section('title')
    <title>สร้าง หมวดหมู่สินค้า</title>
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
                            สร้างหมวดหมู่สินค้า</h1>
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
                            <li class="breadcrumb-item text-muted">สร้างหมวดหมู่สินค้าใหม่</li>
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
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            
                            <div class="card-body border-top p-9">

                            
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อหมวดหมู่สินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="catname" class="form-control form-control-lg form-control-solid" placeholder="เศษเหล็ก อลูมิเนียม" value="{{old('catname') ? old('catname') : ''}}">
                                    
                                        @if ($errors->has('catname'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกชื่อหมวดหมู่สินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                

                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เปิดใช้งานทันที</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="status" checked="checked" value="1"/>
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
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


@stop('scripts')
