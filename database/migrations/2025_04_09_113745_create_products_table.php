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
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 50);
            $table->decimal('price', 10, 0);
            $table->integer('quantity');
            $table->text('description');
            $table->text('imagepath');
            $table->bigInteger('sales_count')->default(0);
            $table->bigInteger('search_count')->default(0);
            $table->bigInteger('category_id')->nullable()->index('category_id');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
