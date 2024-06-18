<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Staff;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'user_id' => '3',
            'picture' => $this->faker->imageUrl(640, 480, 'people'),
            'hometown' => $this->faker->city,
            'identification' => $this->faker->unique()->numerify('#########'),
            'residency' => $this->faker->address,
            'contact' => $this->faker->phoneNumber,
            'is_active' => $this->faker->boolean,
            'position' => $this->faker->jobTitle,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
