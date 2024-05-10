<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_paymentstatus_tests', function (Blueprint $table) {
            $table->id();
            $table->string('pay_method');
            $table->integer('merchant_id');
            $table->integer('service_id');
            $table->string('cust_code');
            $table->integer('sps_cust_no');
            $table->integer('sps_payment_no');
            $table->string('order_id');
            $table->string('item_id');
            $table->string('pay_item_id');
            $table->string('item_name');
            $table->integer('tax');
            $table->integer('amount');
            $table->integer('pay_type');
            $table->integer('auto_charge_type');
            $table->integer('service_type');
            $table->integer('div_settele');
            $table->integer('last_charge_month');
            $table->integer('camp_type');
            $table->string('tracking_id');
            $table->integer('terminal_type');
            $table->string('free1');
            $table->string('free2');
            $table->string('free3');
            $table->integer('dtl_rowno');
            $table->string('dtl_item_id');
            $table->string('dtl_item_name');
            $table->integer('dtl_item_count');
            $table->integer('dtl_tax');
            $table->integer('dtl_amount');
            $table->string('dtl_free1');
            $table->string('dtl_free2');
            $table->string('dtl_free3');
            $table->integer('request_date');
            $table->string('res_pay_method');
            $table->string('res_result');
            $table->string('res_tracking_id');
            $table->integer('res_sps_cust_no');
            $table->integer('res_sps_payment_no');
            $table->string('res_payinfo_key');
            $table->integer('res_payment_date');
            $table->string('res_err_code');
            $table->integer('res_date');
            $table->integer('limit_second');
            $table->string('sps_hashcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_paymentstatus_tests');
    }
};
