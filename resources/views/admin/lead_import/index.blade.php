@extends('layouts.template')

@section('title')
    <title>นำเข้า Lead จากคำสั่งซื้อ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('stylesheet')

<style>

    .hidden{
        display: none !important;
    }
    .dropzone .dz-preview.dz-success .dz-success-mark{
        color: aqua;
    }
</style>

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

                          
                                <div class="col-12 hidden" id="hidden">
                                    <!--begin::Alert-->
                                    <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr016.svg-->
                                        <span class="svg-icon text-success svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"/>
                                            <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"/>
                                            </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column" style="margin-left:10px">
                                            <!--begin::Title-->
                                            <h4 class="mb-1 text-dark">อัพโหลดข้อมูลสำเร็จ</h4>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <span>ระบบได้ทำการอัพโหลดข้อมูลจากไฟล์เข้าไปในระบบเรียบร้อยแล้ว.</span>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Alert-->
                                </div>
                       
                                {{-- <div class="col-6 mb-10">
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
                                </div> --}}
                                <div class="col-12 d-flex justify-content-center">
                                    <!--begin::Form-->
                                    <form class="form" action="#" method="post">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/files/fil018.svg-->
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"/>
                                                            <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor"/>
                                                            <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 1 files</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
             
                        
                    </div>
                    <!--begin::Body-->
                </div>

                <br>

                <div class="card mb-5 mb-xl-8 ">

                    <div class="card-header ">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h3 class="fw-bold mb-1">ประวัติการนำเข้าข้อมูล</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
            
                    <!--begin::Body-->
                    <div class="card-body py-3" >
                        <div class="table-responsive">

                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>ชื่อไฟล์</th>
                                        <th>นำเข้าสำเร็จ</th>
                                        <th>ผู้นำเข้า</th>
                                        <th>วันที่นำเข้า</th>
                                        <th>action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Table row-->
                                    @isset($objs)
                                    @foreach ($objs as $u)
                                    <tr >
                                        <td>
                                            <a href="{{ url('import/csv/'.$u->file_name) }}" target="_blank">{{ $u->file_name }}</a>
                                        </td>
                                        <td>
                                        {{ number_format($u->success_num,0) }}
                                        </td>
                                        <td>
                                        {{ $u->name }}
                                        </td>
                                        <td>
                                        {{ $u->created_ats }}
                                        </td>
                                        <td>
                                        <a href="{{ url('api/del_fileup/'.$u->id_q) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <!--end::Table row-->
                                    @endforeach
                                    @endisset
                                    
                                </tbody>
                                <!--end::Table body-->
                            </table>

                        </div>
                        @include('admin.pagination.default', ['paginator' => $objs])
                    </div>

                </div>
                
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
  
</div>


<!--begin::Toast-->
<div id="kt_docs_toast_stack_container" class="toast-container position-fixed top-0 end-0 p-3 z-index-3">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-kt-docs-toast="stack">
        <div class="toast-header">
            <i class="ki-duotone ki-abstract-23 fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
            <strong class="me-auto">Keenthemes</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<!--end::Toast-->

@endsection

@section('scripts')

<script >
$("#kt_datepicker_1").flatpickr();

var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
    url: "{{ url('/file-import') }}", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    accept: function(file, done) {
        if (file.name == "wow.jpg") {
            done("Naha, you don't.");
        } else {
            done();

            console.log('done-->', done);

            const el = document.querySelector('#hidden');
            el.classList.remove("hidden");

            setTimeout(function(){ 
                
                var d = document.getElementById("hidden");
                d.className += " hidden";

             }, 5000);
        }
    }
});

</script>


@stop('scripts')
