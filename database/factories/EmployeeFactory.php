<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    private $departmentIds;
    private $cityIds;
    private $countryIds;
    private $stateIds;

    public function __construct()
    {
        $this->departmentIds = \App\Models\Department::all()->pluck('id');
        $this->cityIds = \App\Models\City::all()->pluck('id');
        $this->countryIds = \App\Models\Country::all()->pluck('id');
        $this->stateIds = \App\Models\State::all()->pluck('id');
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'hired_date' => fake()->date(),
            'department_id' => fake()->randomElement($this->departmentIds),
            'city_id' => fake()->randomElement($this->cityIds),
            'address' => fake()->address(),
            'zip_code' => fake()->postcode(),
            'country_id' => fake()->randomElement($this->countryIds),
            'state_id' => fake()->randomElement($this->stateIds),
            'date_of_birth' => fake()->date(),
        ];
    }
}
