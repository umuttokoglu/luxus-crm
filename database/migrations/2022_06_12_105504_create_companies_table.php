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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('official')->nullable(false)
                ->comment('It is a text field for now. After adding auth for companies this field will change to accept id.');
            $table->string('phone_number', 18)->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('tax_no')->nullable(false);
            $table->string('tax_administration')->nullable(false);
            $table->string('billing_type')->default(1)->comment('1 => E-Arşiv, 2 => E-Fatura')->nullable(false);
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
        Schema::dropIfExists('companies');
    }
};
