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
            $table->string('pay_method')->nullable()->comment('支払方法');
            $table->string('cust_code')->nullable()->comment('顧客 ID');  
            $table->string('order_id')->nullable()->comment('購入 ID');
            $table->string('item_id')->nullable()->comment('商品 ID');
            $table->string('pay_item_id')->nullable()->comment('外部決済機関商品 ID');
            $table->string('item_name')->nullable()->comment('商品名称');
            $table->string('tracking_id')->nullable()->comment('トラッキング ID');
            $table->string('free1')->nullable()->comment('自由欄１');
            $table->string('free2')->nullable()->comment('自由欄２');
            $table->string('free3')->nullable()->comment('自由欄３');
            $table->string('res_pay_method')->nullable()->comment('処理結果 支払方法');
            $table->string('res_result')->nullable()->comment('処理結果ステータス');
            $table->string('res_tracking_id')->nullable()->comment('処理トラッキング ID');
            $table->string('res_payinfo_key')->nullable()->comment('顧客決済情報');
            $table->string('res_err_code')->nullable()->comment('エラーコード');
            $table->string('sps_hashcode')->nullable()->comment('チェックサム');            
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
