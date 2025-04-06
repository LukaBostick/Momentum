<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Tests\TestCase;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        dump(get_class($this->faker)); // Check the class of $this->faker
        dump(method_exists($this->faker, 'sentence')); // Check if the sentence() method exists
        return [
            'body' => $faker->sentence,
            'project_id' => Project::factory(),
        ];
    }
}
