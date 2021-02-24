<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
          //
          'product_name'=> $this->faker->sentence(),
          'price' => $this->faker->numberBetween($min = 1,$max=20),
          'qty' => $this->faker->numberBetween($min = 1,$max=10),
          'total' => $this->faker->numberBetween($min = 100,$max=200),
          'user_id' =>$this->faker->numberBetween($min = 1,$max=5),
      ];
    }
}
