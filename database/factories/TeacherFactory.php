<?php

namespace Database\Factories;

use App\Models\academic_background_info;
use App\Models\employee;
use App\Models\Teacher;
use App\Models\training_institution_info;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $employee = employee::all();
        foreach($employee as $teacher){
            
            $setBack = new academic_background_info();
            $setBack->field_of_study =  $this->faker->randomElement(['Applied','Food Eng','Comp']);
            $setBack->place_of_study = $this->faker->randomElement(['BDU','ASTU','AASTU']);
            $setBack->date_of_study =  $this->faker->date();;
            $setBack->save();

            $setTra = new training_institution_info();
            $setTra->teacher_traning_program = $this->faker->randomElement(['Dgree','Ms','Dr']);
            $setTra->teacher_traning_year =  $this->faker->date();
            $setTra->teacher_traning_institute = $this->faker->randomElement(['BDU','ASTU','AASTU']);
            $setTra->save();

            $set = new teacher();
            $set->id = $teacher->id;
            $set->academic_background_id  = $setBack->id;
            $set->teacher_training_info_id = $setTra->id;
            $set->debut_as_a_teacher = $this->faker->date();
            $set->save();
        }
        return [
            //
        ];
    }
}
