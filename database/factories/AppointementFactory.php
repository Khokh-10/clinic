<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'subject' => $this->faker->sentence(3),
            'email' => $this->faker->unique()->safeEmail,
            'patient_id' => User::factory(), // Generates a new User as a patient
            'doctor_id' => User::factory(),
        ];
    }
}
