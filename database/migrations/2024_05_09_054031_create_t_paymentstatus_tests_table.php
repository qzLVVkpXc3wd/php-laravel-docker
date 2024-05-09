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
