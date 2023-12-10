@extends('layouts.template')

@section('title')
    <title>รายละเอียดคำสั่งซื้อ</title>
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
.fs-6{
    font-size:12px!important;
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">รายละเอียดคำสั่งซื้อ #{{ $objs->code_lead_lists }}</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
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
                    
                    
                    <div class="card-body p-9">

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ชื่อลูกค้า</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->name_customer }}</span>
							</div>
						</div>

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">เบอร์ติดต่อ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->phone_customer }}</span>
							</div>
						</div>

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">pipeline</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->pipe_name }}</span>
							</div>
						</div>

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ช่องทางการขาย</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->salename }}</span>
							</div>
						</div>

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ประเภทคำสั่งซื้อ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->type_sale_lead_lists }}</span>
							</div>
						</div>

                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ประเภทสินค้า</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->type_pro_lead_lists }}</span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">เลขที่คำสั่งซื้อ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->code_lead_lists }}</span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ยอดขายอัพเซล</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sun_upsale,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">สถานะคำสั่งซื้อ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->lead_lists_status_sale }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">การชำระเงิน</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->lead_lists_payment_type }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">สถานะการชำระเงิน</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->lead_lists_payment_status }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">หมายเลขพัสดุ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->tracking_no }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ขนส่ง</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->transportname }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">เลขที่ใบแจ้งหนี้</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->invoid_no }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ราคาต่อชิ้น</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->price_pro,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">จำนวนสินค้า</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->total_sale,0) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ส่วนลดต่อชิ้น</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->discount_pro,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ยอดรวมสินค้า</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_price_pro,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ส่วนลดคำสั่งซื้อด้วยตนเอง</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_discount_buy_cus,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ค่าส่ง</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_price_shipping,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ค่าบริการเก็บเงินปลายทาง</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_price_cod,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ยอดสุทธิ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_price_final,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">ภาษี (7%)</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_tax,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">รวมทั้งสิ้น</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ number_format($objs->sum_price_final2,2) }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">แท็ก</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->tag }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">โน๊ต</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->note }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">พนักงานขาย</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->sale_employee }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">พนักงานอัพเซล</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->upsale_name }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">วันที่สั่งซื้อ</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->order_date }} </span>
							</div>
						</div>
                        <div class="row mb-7">
						    <label class="col-lg-4 fw-semibold text-muted">วันที่ชำระเงิน</label>
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">{{ $objs->pay_date }} </span>
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


@endsection

@section('scripts')


@stop('scripts')
