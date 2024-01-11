@extends('admin.employee.layouts.template')

@section('title')
    <title>คำสั่งซื้อทั้งหมด</title>
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">คำสั่งซื้อทั้งหมด</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    {{-- <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-success btn-flex" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
<!--end::Svg Icon-->
                        ติดตามลูกค้าใหม่</a>
                        
                    </div> --}}
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
            <div id="kt_app_content_container" class="app-container container-xxl">


                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" id="search_name" name="search_name" class="form-control form-control-solid w-250px ps-14" placeholder="ค้นหาลูกค้า" />
                            </div>
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


                        <!--begin::Table-->
                        {{-- <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
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
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                <!--begin::Table row-->
                                @isset($objs)
                                @foreach ($objs as $u)
                                <tr id="{{$u->id_q}}">
                                    
                                    <td class="" >
                                        {{ number_format($u->sum_price_final,2) }}
                                    </td>
                                    <td class="" data-order="2022-10-05">
                                        <span style="font-size: 12px;">{{ $u->order_date }}</span>
                                    </td>
                                    <!--begin::Customer=-->
                                    <td class=" pe-0">
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-35px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="{{ url('images/dark-app/avatar/'.$u->avatars) }}" alt="{{ $u->fullname }}" class="w-100" />
                                                    </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <div>
                                                <!--begin::Title-->
                                                <a href="" class="text-gray-800 text-hover-primary fw-bold" style="font-size: 12px;">{{ $u->fullname }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" pe-0">
                                        <span >{{ $u->phones }}</span>
                                    </td>
                                    <!--begin::Status=-->
                                    
                                    <!--end::Status=-->
                                    <!--begin::Total=-->
                                    <td class=" pe-0">
                                        @if($u->upsale_id == 5)
                                        ยังไม่ระบุ ( {{ $u->upsale_name }} )
                                        @else
                                        <span >{{ $u->names }}</span>
                                        @endif
                                    </td>
                                    <td class=" pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        @if($u->pro_idx == 0)
                                        <div class="badge badge-light-warning">(ยังไม่มีสินค้าในระบบ)</div>
                                        @else
                                        <div class="badge badge-light-warning">{{ $u->pro_name }}</div>
                                        @endif
                                        
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Total=-->
                                    <!--begin::Date Modified=-->
                                    
                                    <td class="pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        @if($u->lead_lists_statusx == 0)
                                        <div class="badge badge-light-primary">รอจับคู่</div>
                                        @else
                                        <div class="badge badge-light-danger">จับคู่แล้ว</div>
                                        @endif
                                        
                                        <!--end::Badges-->
                                    </td>
                                    <td class="pe-0" data-order="Completed">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">{{ $u->lead_lists_status_sale }}</div>
                                        
                                        <!--end::Badges-->
                                    </td>
                                    
                                    <!--end::Date Modified=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2tx m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                                        </svg>
                                        </span></a>
                                        <!--begin::Menu-->
                                        {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ url('admin/crm_lead_list_view/'.$u->id_q) }}" class="menu-link px-3">ดูรายละเอียด</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="javascript:void(0)" data-id="{{$u->id_q}}" data-pipe="{{$u->pipe_name}}" class="menu-link px-3 openModal" >ย้าย Pipline</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" >ยกเลิกติดตาม</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div> --}}
                                        <!--end::Menu-->
                                    {{-- </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                @endforeach
                                @endisset
                                
                            </tbody>
                            <!--end::Table body-->
                        </table> --}} 
                        <!--end::Table-->
                        </div>
                        {{-- @include('admin.pagination.default', ['paginator' => $objs]) --}}
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
              url: "{{ url('api/get_all_orders_em') }}",
              data:function (d) {
                  d.search_name = document.getElementById("search_name").value;
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
