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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->unique();
            $table->string('bcolor', 7)->default('#89e690');
            $table->string('tcolor', 7)->default('#ffffff');
            $table->timestamps();
        });

        Schema::create('label_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->unique();
            $table->unsignedBigInteger('label_id');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('label_id')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_task');
        Schema::dropIfExists('labels');
    }
};
