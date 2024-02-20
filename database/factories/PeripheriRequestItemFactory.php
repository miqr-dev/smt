<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Peripheri;
use App\Models\PeripheriRequest;
use App\Models\PeripheriRequestItem;

class PeripheriRequestItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PeripheriRequestItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'peripheri_id' => Peripheri::factory(),
            'peripheri_request_id' => PeripheriRequest::factory(),
        ];
    }
}
