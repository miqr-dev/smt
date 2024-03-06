<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hardware;
use App\Models\HardwareRequest;
use App\Models\HardwareRequestItem;

class HardwareRequestItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HardwareRequestItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'hardware_id' => Hardware::factory(),
            'hardware_request_id' => HardwareRequest::factory(),
        ];
    }
}
