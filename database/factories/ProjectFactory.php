<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_status_type_id' => 1,
            'project_name' => 'Test Project',
            'client_name' => fake()->name(),
            'description' => 'lorem ibsum dollar sit amet curn...',
        ];
    }
}
