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

        /*
        Tasks
        ID: UnsignedBigInteger(10), PK, NOT NULL, AUTO_INCREMENT - идентификатор задания
        Title: varchar(255) NOT NULL - заголовок задачи.
        Description: text, NULLABLE - необязательное поле подробного описания задачи
        user_id: UnsignedBigInteger(10), NOT NULL - обязательное поле идентификатора постановщика задачи.
        is_active: boolean | tiny int -> default(1) - флаг активности задачи (Завершено задание или активно).
        timestamp - поля с датами создания и изменения.
        */

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->boolean('is_active')->default(1);
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('tasks');
    }
};
