@extends('layouts.template')

@section('title')
    <title>ประวัติคำสั่งซื้อทั้งหมด </title>
@stop
@section('stylesheet')

<style>
    .hidden{
        display: none !important;
    }
    .table.gy-5 td, .table.gy-5 th {
        font-size: 12px;
}
.symbol.symbol-50px .symbol-label {
    width: 30px;
    height: 30px;
}
.symbol.symbol-45px>img {
    width: 30px;
    height: 30px;
}
</style>

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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-5 flex-column justify-content-center my-0">ประวัติคำสั่งซื้อทั้งหมด <span class="text-primary fs-3">{{ $objs->fullname }}</span></h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Filter menu-->
                        <div class="m-0">
                            <!--begin::Menu toggle-->
                            <a href="{{ url('admin/customer_manager/'.$objs->id.'/edit') }}" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" > ข้อมูลพนักงาน </a>
                            <a href="{{ url('admin/customer_manager_his/'.$objs->id) }}" class="btn btn-sm fw-bold btn-primary"> ประวัติคำสั่งซื้อ</a>
                        </div>
                    </div>
                <!--end::Actions-->
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
                        <div class="card-title">
                            <!--begin::Search-->
                            
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Flatpickr-->
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" id="search_status" name="search_status" data-control="select2" data-hide-search="true" data-placeholder="เลือกสถานะ" data-kt-ecommerce-order-filter="status">
                                    <option></option>
                                    <option value="3">ทั้งหมด</option>
                                    <option value="0">รอจับคู่</option>
                                    <option value="1">จับคู่แล้ว</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--begin::Add product-->
                            <a class="btn btn-primary filter">ค้นหา</a>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    
                    <div class="card-body pt-0">

                        <div class="table-responsive">

                            <table class="table align-middle table-row-dashed fs-6 gy-5 data-table" >
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">ลำดับที่</th>
                                        <th class="min-w-100px">รวมทั้งสิ้น </th>
                                        <th class="min-w-175px">วันที่สั่งซื้อ</th>
                                        <th class="min-w-200px">ชื่อลูกค้า</th>
                                        <th class="min-w-100px">เบอร์ติดต่อ</th>
                                        <th class="min-w-175px">พนักงาน sale crm</th>
                                        <th >ชื่อสินค้า</th>
                                        <th class="min-w-100px">สถานะ</th>
                                        <th class="min-w-100px">สถานะคำสั่งซื้อ</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>


                       
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


@endsection

@section('scripts')

<script >


$(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: "{{ url('api/get_customer_manager_his/'.$objs->id) }}",
              data:function (d) {
                  d.search_status = document.getElementById("search_status").value;
              }
          },
          columns: [
            { data: 'id_q', "render": function(data, type, row, meta){
            return meta.row + 1; // สร้างลำดับตั้งแต่ 1, 2, 3, …
            }},
              {data: 'sum_price_final', name : 'sum_price_final'},
              {data: 'order_date', name: 'order_date'},
              {data: 'user', name: 'user', orderable: false, searchable: false},
              {data: 'phones', name: 'phones'},
              {data: 'names', name: 'names'},
              {data: 'pro_name', name: 'pro_name'}, 
              {data: 'status_or', name: 'status_or', orderable: false, searchable: false}, 
              {data: 'status_salexx', name: 'status_salexx', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    
      $(".filter").click(function(){
          table.draw();
      });


    });

</script>


@stop('scripts')
