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
            $table->unsignedBigInteger('user_id');
            $table->string('s_name');
            $table->string('s_phone');
            $table->string('s_address');
            $table->string('s_landmark')->nullable();
            $table->string('s_city');
            $table->string('s_country');
            $table->string('s_state');
            $table->string('s_zip');
            $table->json('products');
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_status')->default('Pending');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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