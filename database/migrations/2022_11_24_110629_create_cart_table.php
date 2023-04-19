<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('watch_id')->constrained();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('city');
            $table->string('status')->default('in_cart');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
