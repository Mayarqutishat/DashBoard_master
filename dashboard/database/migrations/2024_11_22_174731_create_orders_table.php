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
            $table->id();
            $table->unsignedBigInteger('customer_id');
          
            $table->unsignedBigInteger('product_id');
            $table->decimal('total_price', 8, 2);
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->string('status');
            $table->timestamp('created_by');
            $table->timestamps();
            $table->softDeletes();
            
       
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
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
