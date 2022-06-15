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
        Schema::create('offer_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->float('width')->nullable(false);
            $table->float('height')->nullable(false);
            $table->smallInteger('fabric_type')->nullable(false);
            $table->smallInteger('motor_type')->nullable(false);
            $table->smallInteger('motor_direction')->nullable(false);
            $table->smallInteger('motor_quantity')->nullable(false);
            $table->smallInteger('remote_type')->nullable(false);
            $table->smallInteger('ral_code')->nullable(false);
            $table->double('product_price')->nullable(false);
            $table->boolean('is_warranty_applicable')->default(true);
            $table->boolean('is_logo')->default(false);
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
        Schema::dropIfExists('offer_products');
    }
};
