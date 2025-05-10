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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('orders_user_id_foreign');
            $table->decimal('total_amount', 10);
            $table->enum('payment_method', ['cash_on_delivery', 'credit_card']);
            $table->string('status')->default('جاري التوصيل');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('city');
            $table->text('address');
            $table->text('admin_notes')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->bigInteger('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
