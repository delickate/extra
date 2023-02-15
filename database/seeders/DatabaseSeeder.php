<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CourseLevelsTableSeeder::class);
        $this->call(CourseTopicsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(DivisionTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(RegisteredStudentsTableSeeder::class);
        $this->call(RegisteredTeachersTableSeeder::class);
        $this->call(StudentAssessmentTestTableSeeder::class);
        $this->call(StudentCoursesTableSeeder::class);
        $this->call(StudentTestsTableSeeder::class);
        $this->call(StudentTestResultTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TopicActivitiesTableSeeder::class);
    }
}
