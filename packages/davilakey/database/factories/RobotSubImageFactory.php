<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RobotSubImage>
 */
class RobotSubImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_urls = [
            '/assets/robot-sub-images/andy-kelly-0E_vhMVqL9g-unsplash.jpg',
            '/assets/robot-sub-images/david-leveque-GpNOhig3LSU-unsplash.jpg',
            '/assets/robot-sub-images/elena-mozhvilo-lVGr-HFxAfE-unsplash.jpg',
            '/assets/robot-sub-images/erik-mclean-Cf-kY8HFJOs-unsplash.jpg',
            '/assets/robot-sub-images/mathew-schwartz-vZFJfIsEa0E-unsplash.jpg',
            '/assets/robot-sub-images/maximalfocus-0n4jhVGS4zs-unsplash.jpg',
            '/assets/robot-sub-images/osman-talha-dikyar-1MZ9JjAXg1E-unsplash.jpg',
            '/assets/robot-sub-images/possessed-photography-jIBMSMs4_kA-unsplash.jpg',
            '/assets/robot-sub-images/possessed-photography-JjGXjESMxOY-unsplash.jpg',
            '/assets/robot-sub-images/possessed-photography-rDxP1tF3CmA-unsplash.jpg',
            '/assets/robot-sub-images/thisisengineering-raeng-NaTaIvUFGtc-unsplash.jpg'
        ];

        return [
            'image_url' => $image_urls[rand(0, sizeof($image_urls) - 1)]
        ];
    }
}
