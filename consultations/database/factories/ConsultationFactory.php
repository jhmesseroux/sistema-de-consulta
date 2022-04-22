<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $table->id();
        // $table->foreignId('teacher_id')->constrained('users')->default(null);
        // $table->foreignId('admin_id')->nullable()->constrained('users');
        // $table->foreignId('subject_id')->constrained('subjects');
        // $table->string('alternative')->nullable();
        // $table->boolean('active')->default(true);
        // $table->string('dayOfWeek');
        // $table->string('link')->nullable();
        // $table->string('place')->nullable();
        // $table->string('reasonCancel')->nullable();
        // $table->time('time');
        // $table->string('type');
        // $table->timestamps();
        return [
            'teacher_id' => User::factory(),
            'dayOfWeek' => $this->faker->dayOfWeek(),
            'subject_id' => Subject::factory(),
            'time' => $this->faker->time(),
            'type' => $this->faker->word(),
        ];
    }
}