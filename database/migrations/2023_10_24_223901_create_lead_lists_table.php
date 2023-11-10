<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0'); // user id
            $table->integer('pip_id')->default('0'); // pipeline id
            $table->integer('lead_lists_channels')->default('0'); //ช่องทางการขาย
            $table->string('type_sale_lead_lists')->nullable(); // ประเภทคำสั่งซื้อ
            $table->string('type_pro_lead_lists')->nullable(); // ประเภทสินค้า
            $table->string('code_lead_lists')->nullable(); // เลขที่คำสั่งซื้อ
            $table->string('lead_lists_status')->nullable(); 
            $table->double('sun_upsale', 8, 2)->default('0.00'); // ยอดขายอัพเซล
            $table->string('lead_lists_status_sale')->nullable(); // สถานะคำสั่งซื้อ
            $table->string('lead_lists_payment_type')->nullable(); // การชำระเงิน
            $table->string('lead_lists_payment_status')->nullable(); // สถานะการชำระเงิน
            $table->string('tracking_no')->nullable(); // หมายเลขพัสดุ
            $table->integer('tran_id')->default('0'); // ขนส่ง id
            $table->string('invoid_no')->nullable(); // เลขที่ใบแจ้งหนี้
            $table->double('price_pro', 8, 2)->default('0.00'); // ราคาต่อชิ้น
            $table->integer('total_sale')->default('0'); // จำนวนสินค้า
            $table->double('discount_pro', 8, 2)->default('0.00'); // ส่วนลดต่อชิ้น
            $table->double('sum_price_pro', 8, 2)->default('0.00'); // ยอดรวมสินค้า
            $table->double('sum_order_pro', 8, 2)->default('0.00'); // ยอดรวมสินค้า
            $table->double('sum_discount_buy_cus', 8, 2)->default('0.00'); // ส่วนลดคำสั่งซื้อด้วยตนเอง
            $table->double('sum_price_shipping', 8, 2)->default('0.00'); // ค่าส่ง
            $table->double('sum_price_cod', 8, 2)->default('0.00'); // ค่าบริการเก็บเงินปลายทาง
            $table->double('sum_price_final', 8, 2)->default('0.00'); // ยอดสุทธิ
            $table->double('sum_tax', 8, 2)->default('0.00'); // ภาษี (7%)
            $table->double('sum_price_final2', 8, 2)->default('0.00'); // รวมทั้งสิ้น
            $table->string('tag')->nullable(); // แท็ก
            $table->text('note')->nullable(); // โน๊ต
            $table->string('sale_employee')->nullable(); // พนักงานขาย
            $table->string('upsale_name')->nullable(); // พนักงานอัพเซล
            $table->string('order_date')->nullable(); // วันที่สั่งซื้อ
            $table->string('pay_date')->nullable(); // วันที่ชำระเงิน
            $table->integer('upsale_id')->default('0'); // id พนักงานอัพเซล
            $table->integer('lead_main_id')->default('0'); // id พนักงานอัพเซล 
            $table->integer('pro_id')->default('0'); // pro_id
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_lists');
    }
};
