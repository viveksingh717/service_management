<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_id');
            $table->string('service_name');
            $table->string('service_slug')->unique();
            $table->string('tagline');
            $table->longText('description');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->enum('discount_type', ['fixed', 'percent'])->nullable();
            $table->string('service_image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('inclusion');
            $table->longText('exclusion');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('services');
    }
}
