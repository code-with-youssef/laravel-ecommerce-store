<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            //order information
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['cash_on_delivery', 'credit_card']);
            $table->string('status')->default('جاري التوصيل');

            //client information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('city');
            $table->text('address');

            //additional information 
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
