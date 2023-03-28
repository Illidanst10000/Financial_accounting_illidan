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
        Schema::dropIfExists('user_balances');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('user_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('balance');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
