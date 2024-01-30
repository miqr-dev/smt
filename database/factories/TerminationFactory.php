<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Termination;
use App\Models\User;

class TerminationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Termination::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->word(),
            'occupation' => $this->faker->word(),
            'note' => $this->faker->text(),
            'exit' => $this->faker->date(),
            'user_id' => User::factory(),
        ];
    }
}
