<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_verifications', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('status', 255); // Allow NULL values
            // $table->foreign('status')
            //       ->references('product_name')
            //       ->on('products')
            //       ->onDelete('cascade');
                  
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total', 10, 2)->default(0.00);
            $table->string('inputvat', 10, 2)->default(0.00);
            $table->string('vat', 10, 2)->default(0.00);
            $table->decimal('sub_total', 10, 2);
            $table->decimal('grand_total', 10, 2)->default(0.00);
            $table->json('dynamic_data')->nullable();
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
        Schema::dropIfExists('user_verifications');
    }
};
