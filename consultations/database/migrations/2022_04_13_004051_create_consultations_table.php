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
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('admin_id')->nullable()->constrained('users')->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->string('alternative')->nullable();
            $table->boolean('active')->default(true);
            $table->string('dayOfWeek');
            $table->string('link')->nullable();
            $table->string('place')->nullable();
            $table->string('reasonCancel')->nullable();
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