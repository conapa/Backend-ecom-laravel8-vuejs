<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $title = $this->faker->sentence();
      return [
          //
          'title'=> $title,
          'slug'=> Str::slug($title),
          'description' => $this->faker->paragraph,
          'price' => $this->faker->numberBetween($min = 1,$max=20),
          'image' =>$this->faker->imageUrl($width=640,$height=480),
          'category_id' =>$this->faker->numberBetween($min = 1,$max=5)
      ];
    }
}
