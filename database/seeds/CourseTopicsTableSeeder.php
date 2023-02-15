<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseTopicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_topics')->delete();
        
        \DB::table('course_topics')->insert(array (
            0 => 
            array (
                'topic_id' => 1,
                'topic_name' => 'Introduction To Computer Science',
                'topic_text' => 'We begin this course by developing a motivation for learning programming concepts and by reviewing the history of computer programming languages, and show the connections between human thought and its expression in programming languages. We then discuss hardware – the physical devices that make up a computer – and software – operating systems and applications that run on the computer.',
                'course_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 1,
            ),
            1 => 
            array (
                'topic_id' => 2,
                'topic_name' => 'Object-Oriented Programming',
            'topic_text' => 'Java is an object-oriented programming language. Object-oriented (OO) programming has proven to be one of the most effective and flexible programming paradigms. This unit will begin with a discussion of what makes OO programming so unique, and why its advantages have made it the industry-standard paradigm for newly designed programs.',
                'course_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 2,
            ),
            2 => 
            array (
                'topic_id' => 3,
                'topic_name' => 'Java in Practice',
                'topic_text' => 'This topic discusses naming and coding conventions as well as reserved words in Java. When you go through this chapter, you\'ll get some hands-on experience with writing in Java.',
                'course_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 3,
            ),
            3 => 
            array (
                'topic_id' => 4,
                'topic_name' => 'Introduction to physics',
                'topic_text' => 'Physics is the branch of science which deals with matter and its relation to energy.
It involves study of physical and natural phenomena around us. Examples of these phenomena are formation of rainbow, occurrence eclipse, the fall of things from up to down, the cause of sunset and sunrise, formation of shadow and many more.',
                'course_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 1,
            ),
            4 => 
            array (
                'topic_id' => 5,
                'topic_name' => 'Vectors',
                'topic_text' => 'In mathematics and physics, vectors are measures that have both direction and size. Learn about vectors in two and three dimensions, and explore the steps for adding and subtracting both types of vectors.',
                'course_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 2,
            ),
            5 => 
            array (
                'topic_id' => 6,
                'topic_name' => 'Keplers Laws',
                'topic_text' => 'In the early 1600s, Johannes Kepler proposed three laws of planetary motion. Kepler was able to summarize the carefully collected data of his mentor - Tycho Brahe - with three statements that described the motion of planets in a sun-centered solar system',
                'course_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'topic_level_id' => 3,
            ),
            6 => 
            array (
                'topic_id' => 9,
                'topic_name' => 'New Topic1',
                'topic_text' => 'New Topic2',
                'course_idFK' => 1,
                'created_at' => '2023-01-11 10:52:38',
                'updated_at' => '2023-01-11 10:52:38',
                'created_by' => 49,
                'updated_by' => NULL,
                'topic_level_id' => 4,
            ),
            7 => 
            array (
                'topic_id' => 10,
                'topic_name' => 'The Physics Topic',
                'topic_text' => 'My Physics topic',
                'course_idFK' => 2,
                'created_at' => '2023-01-18 13:27:02',
                'updated_at' => '2023-01-18 13:27:02',
                'created_by' => 49,
                'updated_by' => NULL,
                'topic_level_id' => 4,
            ),
            8 => 
            array (
                'topic_id' => 11,
                'topic_name' => 'Topic for new course',
                'topic_text' => 'New course topic',
                'course_idFK' => 8,
                'created_at' => '2023-01-18 19:14:34',
                'updated_at' => '2023-01-18 19:14:34',
                'created_by' => 49,
                'updated_by' => NULL,
                'topic_level_id' => 1,
            ),
        ));
        
        
    }
}