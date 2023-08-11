<?php

namespace Database\Factories;

use App\Models\ApplicationStatus;
use App\Models\UserApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserApplication>
 */
class UserApplicationFactory extends Factory
{
    protected $model = UserApplication::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'application_status' => 'Не прочитано',
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'country' => 'united_kingdom',
            'visa_types' => '["Tourism"]',
        ];
    }
}
