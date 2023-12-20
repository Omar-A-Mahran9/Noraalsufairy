<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_approvals', function (Blueprint $table) {
            $table->id();
            $table->date('approval_date');
            $table->float('approval_amount');
            $table->float('tax_discount');
            $table->float('discount_percent');
            $table->float('discount_amount');
            $table->float('cashback_percent');
            $table->float('cashback_amount');
            $table->float('cost');
            $table->float('plate_no_cost');
            $table->float('insurance_cost');
            $table->float('delivery_cost');
            $table->float('commission')->nullable();
            $table->float('profit');
            $table->text('extra_details')->nullable();
            $table->foreignId('delegate_id')->constrained('delegates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('finance_approvals');
    }
}
