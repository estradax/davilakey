<?php

namespace Database\Factories;

use App\Http\Facades\ProductService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word();
        $folderName = ProductService::createFolderName($name);

        $photoUrl = Storage::disk('public')->putFile($folderName, $this->faker->image());
        if (!$photoUrl) {
            dd('error: cannot create photo');
        }

        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100, 5000),
            'photo_url' => $photoUrl
        ];
    }
}
