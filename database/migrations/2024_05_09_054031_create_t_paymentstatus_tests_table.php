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
            $table->integer('merchant_id')->nullable()->comment('マーチャント ID');
            $table->integer('service_id')->nullable()->comment('サービス ID');
            $table->string('cust_code')->nullable()->comment('顧客 ID');
            $table->integer('sps_cust_no')->nullable()->comment('SBPS 顧客 ID');
            $table->integer('sps_payment_no')->nullable()->comment('SBPS 支払方法管理番号');
            $table->string('order_id')->nullable()->comment('購入 ID');
            $table->string('item_id')->nullable()->comment('商品 ID');
            $table->string('pay_item_id')->nullable()->comment('外部決済機関商品 ID');
            $table->string('item_name')->nullable()->comment('商品名称');
            $table->integer('tax')->nullable()->comment('税額');
            $table->integer('amount')->nullable()->comment('金額（税込）');
            $table->integer('pay_type')->nullable()->comment('購入タイプ');
            $table->integer('auto_charge_type')->nullable()->comment('自動課金タイプ');
            $table->integer('service_type')->nullable()->comment('サービスタイプ');
            $table->integer('div_settele')->nullable()->comment('決済区分');
            $table->integer('last_charge_month')->nullable()->comment('最終課金月');
            $table->integer('camp_type')->nullable()->comment('キャンペーンタイプ');
            $table->string('tracking_id')->nullable()->comment('トラッキング ID');
            $table->integer('terminal_type')->nullable()->comment('顧客利用端末タイプ');
            $table->string('free1')->nullable()->comment('自由欄１');
            $table->string('free2')->nullable()->comment('自由欄２');
            $table->string('free3')->nullable()->comment('自由欄３');
            $table->integer('request_date')->nullable()->comment('リクエスト日時');
            $table->string('res_pay_method')->nullable()->comment('処理結果 支払方法');
            $table->string('res_result')->nullable()->comment('処理結果ステータス');
            $table->string('res_tracking_id')->nullable()->comment('処理トラッキング ID');
            $table->integer('res_sps_cust_no')->nullable()->comment('処理 SBPS 顧客 ID');
            $table->integer('res_sps_payment_no')->nullable()->comment('処理 SBPS 支払方法管理番号');
            $table->string('res_payinfo_key')->nullable()->comment('顧客決済情報');
            $table->integer('res_payment_date')->nullable()->comment('完了処理日時');
            $table->string('res_err_code')->nullable()->comment('エラーコード');
            $table->integer('res_date')->nullable()->comment('レスポンス日時');
            $table->integer('limit_second')->nullable()->comment('レスポンス許容時間');
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
