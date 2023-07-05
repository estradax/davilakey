<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Robot>
 */
class RobotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagesUrls = [
            '/assets/robot-images/alex-knight.jpg',
            '/assets/robot-images/james-gibson.jpg',
            '/assets/robot-images/lenin-estrada.jpg',
            '/assets/robot-images/lukas-vanatko.jpg',
            '/assets/robot-images/lyman-hansel-gerona.jpg',
            '/assets/robot-images/maximalfocus2.jpg',
            '/assets/robot-images/maximalfocus.jpg',
            '/assets/robot-images/mech-mind2.jpg',
            '/assets/robot-images/mech-mind.jpg',
            '/assets/robot-images/michael-schiffer.jpg',
        ];

        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(100, 1000),
            'description' => fake()->text(30),
            'image_url' => $imagesUrls[fake()->numberBetween(0, count($imagesUrls) - 1)]
        ];
    }
}
