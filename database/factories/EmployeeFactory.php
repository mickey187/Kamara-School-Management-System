<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male','female']);
        $education_status = $this->faker->randomElement(['degree','masters']);
        $marriage_status = $this->faker->randomElement(['married','divorced','single']);
        $special_skill = $this->faker->randomElement(['sign language','magician','circus']);
        $teacher_training = $this->faker->randomElement(['TTI','Kotebe Teaching']);
        return [
            //
            'role_id' => 3,
            'employee_id' => $this->faker->numerify('#########'),
            'employee_job_position_id' => 1,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' =>$this->faker->lastName(),
            'gender' => $gender,
            'birth_date' => $this->faker->date(),
            'hired_date' => $this->faker->date(),
            'education_status' => $education_status,
            'marrage_status' => $marriage_status,
            'previous_employment' => 'Saint Joseph School',
            'special_skill' => $special_skill,
            'net_salary' => rand(5000,10000),
            'job_trainning' => $teacher_training,
            'nationality' => 'Ethiopian',
            'hire_type' => 'permanent',
            

        ];
    }
}
