<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->default(null);
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->string('alternative')->default(null);
            $table->boolean('active')->default(true);
            $table->string('dayOfWeek');
            $table->string('link_place')->default(null);
            $table->string('reasonCancel')->default(null);
            $table->time('time');
            $table->string('type');
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
        Schema::dropIfExists('consultations');
    }
}