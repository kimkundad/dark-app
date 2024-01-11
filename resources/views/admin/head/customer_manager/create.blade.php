@extends('admin.head.layouts.template')

@section('title')
<title>สร้าง ข้อมูลพนักงาน ใหม่</title>
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
                            สร้าง ข้อมูลพนักงาน</h1>
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
                            <li class="breadcrumb-item text-muted">สร้าง ข้อมูลพนักงาน ใหม่</li>
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
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">รูปของลูกค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ url('admin/assets/media/svg/avatars/blank.svg') }}')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ url('admin/assets/media/svg/avatars/blank.svg') }})"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="เปลี่ยน รูปลูกค้า">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="ยกเลิก รูปลูกค้า">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="ลบ รูปลูกค้า">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อ - นามสกุล</label>
                                        <input type="text" name="fullname" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกชื่อ - นามสกุล..." value="{{old('fullname') ? old('fullname') : ''}}">
                                    
                                        @if ($errors->has('fullname'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('fullname') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">ชื่อโซเชียล</label>
                                        <input type="text" name="nickname" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกชื่อโซเชียล..." value="{{old('nickname') ? old('nickname') : ''}}">
                                    
                                    </div>
                                 
                                </div>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">เบอร์โทรศัพท์ </label>
                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกเบอร์ติดต่อ..." value="{{old('phone') ? old('phone') : ''}}">
                                    
                                        @if ($errors->has('phone'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('phone') }}</div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">เบอร์โทรศัพท์ 2</label>
                                        <input type="text" name="phone2" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกเบอร์ติดต่อ..." value="{{old('phone2') ? old('phone2') : ''}}">
                                    
                                    </div>

                                    
                                 
                                </div>


                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">วันเกิด </label>
                                        <div class="input-group ">
                                            <input class="form-control form-control-solid rounded rounded-end-0" name="hbd" placeholder="กรุณากรอกวันเกิด..." id="kt_datepicker_2" />
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
                                    
                                        @if ($errors->has('hbd'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('hbd') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">ไอดีไลน์</label>
                                        <input type="text" name="line" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกข้อมูลไลน์ไอดี..." value="{{old('line') ? old('line') : ''}}">
                                    
                                    </div>
                                 
                                </div>


                                <div class="row mb-6">

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">อีเมล</label>
                                        <input type="text" name="email" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกอีเมล..." value="{{old('email') ? old('email') : ''}}">
                                    
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ช่องทางการขาย </label>
                                        <select class="form-select" name="channels">
                                            @isset($cat)
                                            @foreach($cat as $u)
                                            <option value="{{$u->id}}">{{$u->salename}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                </div>


                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">เพศ </label>

                                        <div class="d-flex">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mr-15">
                                                <input class="form-check-input" type="radio" name="sex" checked  value="ไม่ระบุ" id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                    ไม่ระบุ
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mr-15">
                                                <input class="form-check-input" type="radio" name="sex" value="ชาย" id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                    ชาย
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mr-15">
                                                <input class="form-check-input" type="radio" name="sex" value="หญิง" id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                    หญิง
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mr-15">
                                                <input class="form-check-input" type="radio" name="sex" value="อื่นๆ" id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                    อื่นๆ
                                                </label>
                                            </div>
                                        </div>
                                    
                                        @if ($errors->has('sex'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('sex') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                 
                                </div>
                                <Br>
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ข้อมูลที่อยู่</h1>
                                <hr>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ประเภทที่อยู่อาศัย </label>
                                        <select class="form-select" name="type_address" aria-label="Select example">
                                            <option>กรุณาเลือกประเภทที่อยู่...</option>
                                            <option value="ไม่ระบุ">ไม่ระบุ</option>
                                            <option value="บ้านเดี่ยว">บ้านเดี่ยว</option>
                                            <option value="อาคารพาณิชย์ ">อาคารพาณิชย์ </option>
                                            <option value="ทาวน์เฮาส์ ">ทาวน์เฮาส์ </option>

                                            <option value="อพาร์ตเม้นต์ ">อพาร์ตเม้นต์  </option>
                                            <option value="คอนโดมิเนียม ">คอนโดมิเนียม </option>
                                            <option value="ออฟฟิศ">ออฟฟิศ </option>
                                            <option value="สถานที่ราชการ">สถานที่ราชการ </option>
                                            <option value="Single-Family Homes ">Single-Family Homes </option>
                                            <option value="Mobile House">Mobile House </option>
                                        </select>
                                    
                                
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่อยู่ลูกค้า</label>
                                        <input type="text" name="address" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกที่อยู่..." value="{{old('address') ? old('address') : ''}}">
                                        @if ($errors->has('address'))
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            <div>{{ $errors->first('address') }}</div>
                                        </div>
                                    @endif
                                    </div>
                                 
                                </div>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">แขวง/ ตำบล</label>
                                        <input type="text" name="Subdistrict" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกแขวง/ ตำบล..." value="{{old('Subdistrict') ? old('Subdistrict') : ''}}">
                                    
                                        @if ($errors->has('Subdistrict'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('Subdistrict') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">เขต/ อำเภอ</label>
                                        <input type="text" name="district" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกเขต/ อำเภอ..." value="{{old('district') ? old('district') : ''}}">
                                        @if ($errors->has('district'))
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            <div>{{ $errors->first('district') }}</div>
                                        </div>
                                    @endif
                                    </div>
                                 
                                </div>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">จังหวัด</label>
                                        <input type="text" name="province" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกจังหวัด..." value="{{old('province') ? old('province') : ''}}">
                                    
                                        @if ($errors->has('province'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('province') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">รหัสไปรษณีย์ </label>
                                        <input type="text" name="zip_code" class="form-control form-control-lg form-control-solid" placeholder="กรุณากรอกรหัสไปรษณีย์..." value="{{old('zip_code') ? old('zip_code') : ''}}">
                                        @if ($errors->has('zip_code'))
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            <div>{{ $errors->first('zip_code') }}</div>
                                        </div>
                                    @endif
                                    </div>
                                 
                                </div>

                                <div class="row mb-6">
                                   
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ประเทศ</label>
                                        <input type="text" name="county" class="form-control form-control-lg form-control-solid"  value="ประเทศไทย">
                                    
                                        @if ($errors->has('county'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('county') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                   
                                 
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
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')

<!-- Popperjs -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha256-BRqBN7dYgABqtY9Hd4ynE+1slnEw+roEPFzQ7TRRfcg=" crossorigin="anonymous"></script>
<!-- Tempus Dominus JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>

<!-- Tempus Dominus Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/css/tempus-dominus.min.css" crossorigin="anonymous">


<script>

$("#kt_datepicker_2").flatpickr();
    
    new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_custom_icons"), {
        localization: {
        locale: "de",
        startOfTheWeek: 1,
        format: "yyyy-MM-dd H:mm"
    },
    display: {
    icons: {
        time: "bi bi-alarm-fill fs-1",
        date: "bi bi-calendar-check fs-1",
        up: "bi bi-caret-up fs-1",
        down: "bi bi-caret-down fs-1",
        previous: "bi bi-arrow-left-circle-fill fs-1",
        next: "bi bi-arrow-right-circle-fill fs-1",
        today: "bi bi-calendar-heart fs-1",
        clear: "bi bi-trash3-fill fs-1",
        close: "bi bi-calendar-x fs-1",
    },
    buttons: {
        today: true,
        clear: true,
        close: true,
    },
    }
});

</script>


@stop('scripts')
