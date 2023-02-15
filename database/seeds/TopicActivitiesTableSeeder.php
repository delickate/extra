<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('topic_activities')->delete();
        
        \DB::table('topic_activities')->insert(array (
            0 => 
            array (
                'activity_id' => 1,
                'activity_name' => 'History and Motivation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'In 1936, Howard Aiken had proposed his idea to build a giant calculating machine to the Physics Department, He was told by the chairman, Frederick Saunders, that a lab technician, Carmelo Lanza, had told him about a similar contraption already stored up in the Science Center attic.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 44,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            1 => 
            array (
                'activity_id' => 2,
                'activity_name' => 'Third generation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
                'activity_text' => 'In 1969, Data General introduced the Nova and shipped 
a total of 50,000 at $8,000 each. The popularity of 16-bit computers, such as the 
Hewlett-Packard 21xx series and the Data General Nova, led the way toward word lengths that were 
multiples of the 8-bit byte. The Nova was first to employ medium-scale integration (MSI) circuits 
from Fairchild Semiconductor, with subsequent models using large-scale integrated (LSI) circuits. 
Also notable was that the entire central processor was contained on one 15-inch printed circuit board.',
                'activity_link' => '200px-Data_General_NOVA_System.jpeg',
                'content_level' => 'Easy',
                'content_level_value' => 57,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            2 => 
            array (
                'activity_id' => 3,
                'activity_name' => 'Fundamental Concepts of OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'video',
                'activity_text' => 'Object-oriented approaches to software development are an important expansion of procedural approaches. Java explicitly supports both approaches, but you should focus on the object-oriented approach. This article compares the two approaches and explains the fundamentals of each.',
                'activity_link' => 'https://www.youtube.com/embed/xFjsIWrRftE',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            3 => 
            array (
                'activity_id' => 4,
                'activity_name' => 'Using Java for OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'A class represents a set of objects which share the same structure and behaviors. The class determines the structure of objects by specifying variables that are contained in each instance of the class, and it determines behavior by providing the instance methods that express the behavior of the objects. This is a powerful idea. However, something like this can be done in most programming languages. The central new idea in object-oriented programming -- the idea that really distinguishes it from traditional programming -- is to allow classes to express the similarities among objects that share some, but not all, of their structure and behavior. Such similarities can be expressed using inheritance and polymorphism.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 97,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            4 => 
            array (
                'activity_id' => 5,
                'activity_name' => 'Working with Classes',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
            'activity_text' => 'The name of the class (and therefore the name of the file) is up to you. In programming, the name for something is called an identifier. An identifier is one or more characters long.The first character of an identifier cannot be a digit. The remaining characters can be a mix of alphabetic characters, digits, underscore, and dollar sign $. No spaces are allowed inside an identifier.
It is conventional for a class name to start with a capital letter, but this is not required by the compiler. However, follow this convention so your programs are easier to understand. A source file should always end with .java in lower case.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 22,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            5 => 
            array (
                'activity_id' => 6,
                'activity_name' => 'Importing Libraries',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Java comes with a rich set of pre-written classes that a programmer can use while developing Java programs. These classes are organized into packages. The following are just a few of the large number of different packages in Java at Oracles Java API Specifications:
java.applet: The applet package provides the classes necessary to create an applet and the classes an applet uses to communicate with its applet context.
java.awt: The awt package contains all of the classes for creating user interfaces and for painting graphics and images.
java.lang: The lang package provides classes that are fundamental to the design of the Java programming language.
In order to use a Java class declared in these packages, you need to include an import statement before class declaration in your program. The import statement starts with the keyword import, followed by the name of the java package.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 17,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            6 => 
            array (
                'activity_id' => 7,
                'activity_name' => 'Physics and Technology.',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Some areas of technology that requires knowledge of physics are X-rays, lasers, scanners which are applications of physics are used in diagnosis and treatment of diseases.
Satellite communication, internet, fibre optics are applications of internet which requires strong foundation in physics.
In the area of defense, physics has many applications e.g. war planes, laser-guided bombs which have high level accuracy.
In entrainment industry, knowledge of physics has use in mixing various colours to bring out the desirable stage effects',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 21,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            7 => 
            array (
                'activity_id' => 8,
                'activity_name' => 'Pressure',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
            'activity_text' => 'The SI unit of pressure is newton per square metre (N/m2). Pressure can also be expressed in pascals (Pa);
1N/m2=1Pa
Atmospheric pressure is sometimes expressed as mmHg, cmHg or atmospheres.
For a given amount of force, the smaller the area of contact the greater the pressure exerted. 
This explains why it would be easier for a sharp pin to penetrate a piece of cardboard than a blunt 
one when the same force is used.A solid resting on a horizontal surface exerts a normal contact force 
equals to its weight. The pressure of the solid on the surface depends on the area of contact.
The pressure between two solid surfaces depends on two things:
(a) the force between the surfaces
(b) the area of contact between the two surfaces.',
                'activity_link' => 'pressure.gif',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            8 => 
            array (
                'activity_id' => 9,
                'activity_name' => 'Introduction to Vectors',
                'topic_idFK' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Zadie lives in Chicago and decides to go on vacation, so she gets on a plane and flies 200 miles. 
Where did she end up?
You can\'t know where she ends up without first knowing what direction she flew in, right? This is an 
example of a vector, which is a quantity that has both a magnitude and a direction. In order to know 
where Zadie went on her vacation, you need to know both how far she went and in what direction.
Many other physical quantities, such as force, velocity, and momentum, are also vectors. Vectors may be 
either two dimensional or three dimensional, depending on the situation.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 5,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            9 => 
            array (
                'activity_id' => 10,
                'activity_name' => 'Two-Dimensional Vectors',
                'topic_idFK' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
            'activity_text' => 'One way to represent a two-dimensional vector is with vector components, which simply tell you how far the vector goes in each direction. For example, a vector with an x-component of 4 and a y-component of 3 that started at the origin would end at coordinates (4,3).',
                'activity_link' => '2d_vector_coordinates.png',
                'content_level' => 'Easy',
                'content_level_value' => 63,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            10 => 
            array (
                'activity_id' => 11,
                'activity_name' => 'The Law of Ellipses',
                'topic_idFK' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
            'activity_text' => 'An ellipse is a special curve in which the sum of the distances from every point on the curve to two other points is a constant. The two other points (represented here by the tack locations) are known as the foci of the ellipse. The closer together that these points are, the more closely that the ellipse resembles the shape of a circle. In fact, a circle is the special case of an ellipse in which the two foci are at the same location. Kepler\'s first law is rather simple - all planets orbit the sun in a path that resembles an ellipse, with the sun being located at one of the foci of that ellipse',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 1,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            11 => 
            array (
                'activity_id' => 12,
                'activity_name' => 'The Law of Equal Areas',
                'topic_idFK' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Kepler\'s second law - sometimes referred to as the law of equal areas - describes the speed at which any given planet will move while orbiting the sun. The speed at which any planet moves through space is constantly changing. A planet moves fastest when it is closest to the sun and slowest when it is furthest from the sun. Yet, if an imaginary line were drawn from the center of the planet to the center of the sun, that line would sweep out the same area in equal periods of time.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 16,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            12 => 
            array (
                'activity_id' => 14,
                'activity_name' => 'First activity',
                'topic_idFK' => 1,
                'created_at' => '2023-01-17 19:56:05',
                'updated_at' => '2023-01-17 19:56:05',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is first activity added using a text editor.</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 74,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            13 => 
            array (
                'activity_id' => 15,
                'activity_name' => 'Activity 2',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 11:59:15',
                'updated_at' => '2023-01-18 11:59:15',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is second content</p>',
                'activity_link' => NULL,
                'content_level' => 'Medium',
                'content_level_value' => 20,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            14 => 
            array (
                'activity_id' => 16,
                'activity_name' => 'Activity 3',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 12:00:40',
                'updated_at' => '2023-01-18 12:00:40',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>My activity is 3</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 81,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Multi-structure',
                'score' => 0,
            ),
            15 => 
            array (
                'activity_id' => 17,
                'activity_name' => 'Activity 4',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 12:05:08',
                'updated_at' => '2023-01-18 12:05:08',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This content is good</p>',
                'activity_link' => NULL,
                'content_level' => 'Medium',
                'content_level_value' => 42,
                'taxonomy_type' => 'Solo',
                'bloom_type' => 'K',
                'solo_type' => 'Relational',
                'score' => 0,
            ),
            16 => 
            array (
                'activity_id' => 18,
                'activity_name' => 'The one 1',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 16:48:26',
                'updated_at' => '2023-01-18 16:48:26',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>The new one two.</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 68,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            17 => 
            array (
                'activity_id' => 19,
                'activity_name' => 'This is best activity',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 19:15:47',
                'updated_at' => '2023-01-18 19:15:47',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is best activity</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 14,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            18 => 
            array (
                'activity_id' => 20,
                'activity_name' => 'tesin',
                'topic_idFK' => 1,
                'created_at' => '2023-02-07 10:58:28',
                'updated_at' => '2023-02-07 10:58:28',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'test',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 66,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            19 => 
            array (
                'activity_id' => 21,
                'activity_name' => 'jjhjhk',
                'topic_idFK' => 1,
                'created_at' => '2023-02-07 11:02:58',
                'updated_at' => '2023-02-07 11:02:58',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>jhkhkj</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 88,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            20 => 
            array (
                'activity_id' => 22,
                'activity_name' => 'History and Motivation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'In 1936, Howard Aiken had proposed his idea to build a giant calculating machine to the Physics Department, He was told by the chairman, Frederick Saunders, that a lab technician, Carmelo Lanza, had told him about a similar contraption already stored up in the Science Center attic.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 44,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            21 => 
            array (
                'activity_id' => 23,
                'activity_name' => 'Third generation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
                'activity_text' => 'In 1969, Data General introduced the Nova and shipped 
a total of 50,000 at $8,000 each. The popularity of 16-bit computers, such as the 
Hewlett-Packard 21xx series and the Data General Nova, led the way toward word lengths that were 
multiples of the 8-bit byte. The Nova was first to employ medium-scale integration (MSI) circuits 
from Fairchild Semiconductor, with subsequent models using large-scale integrated (LSI) circuits. 
Also notable was that the entire central processor was contained on one 15-inch printed circuit board.',
                'activity_link' => '200px-Data_General_NOVA_System.jpeg',
                'content_level' => 'Easy',
                'content_level_value' => 57,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            22 => 
            array (
                'activity_id' => 24,
                'activity_name' => 'Fundamental Concepts of OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'video',
                'activity_text' => 'Object-oriented approaches to software development are an important expansion of procedural approaches. Java explicitly supports both approaches, but you should focus on the object-oriented approach. This article compares the two approaches and explains the fundamentals of each.',
                'activity_link' => 'https://www.youtube.com/embed/xFjsIWrRftE',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            23 => 
            array (
                'activity_id' => 25,
                'activity_name' => 'Using Java for OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'A class represents a set of objects which share the same structure and behaviors. The class determines the structure of objects by specifying variables that are contained in each instance of the class, and it determines behavior by providing the instance methods that express the behavior of the objects. This is a powerful idea. However, something like this can be done in most programming languages. The central new idea in object-oriented programming -- the idea that really distinguishes it from traditional programming -- is to allow classes to express the similarities among objects that share some, but not all, of their structure and behavior. Such similarities can be expressed using inheritance and polymorphism.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 97,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            24 => 
            array (
                'activity_id' => 26,
                'activity_name' => 'Working with Classes',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
            'activity_text' => 'The name of the class (and therefore the name of the file) is up to you. In programming, the name for something is called an identifier. An identifier is one or more characters long.The first character of an identifier cannot be a digit. The remaining characters can be a mix of alphabetic characters, digits, underscore, and dollar sign $. No spaces are allowed inside an identifier.
It is conventional for a class name to start with a capital letter, but this is not required by the compiler. However, follow this convention so your programs are easier to understand. A source file should always end with .java in lower case.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 22,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            25 => 
            array (
                'activity_id' => 27,
                'activity_name' => 'Importing Libraries',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Java comes with a rich set of pre-written classes that a programmer can use while developing Java programs. These classes are organized into packages. The following are just a few of the large number of different packages in Java at Oracles Java API Specifications:
java.applet: The applet package provides the classes necessary to create an applet and the classes an applet uses to communicate with its applet context.
java.awt: The awt package contains all of the classes for creating user interfaces and for painting graphics and images.
java.lang: The lang package provides classes that are fundamental to the design of the Java programming language.
In order to use a Java class declared in these packages, you need to include an import statement before class declaration in your program. The import statement starts with the keyword import, followed by the name of the java package.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 17,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            26 => 
            array (
                'activity_id' => 28,
                'activity_name' => 'Physics and Technology.',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Some areas of technology that requires knowledge of physics are X-rays, lasers, scanners which are applications of physics are used in diagnosis and treatment of diseases.
Satellite communication, internet, fibre optics are applications of internet which requires strong foundation in physics.
In the area of defense, physics has many applications e.g. war planes, laser-guided bombs which have high level accuracy.
In entrainment industry, knowledge of physics has use in mixing various colours to bring out the desirable stage effects',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 21,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            27 => 
            array (
                'activity_id' => 29,
                'activity_name' => 'Pressure',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
            'activity_text' => 'The SI unit of pressure is newton per square metre (N/m2). Pressure can also be expressed in pascals (Pa);
1N/m2=1Pa
Atmospheric pressure is sometimes expressed as mmHg, cmHg or atmospheres.
For a given amount of force, the smaller the area of contact the greater the pressure exerted. 
This explains why it would be easier for a sharp pin to penetrate a piece of cardboard than a blunt 
one when the same force is used.A solid resting on a horizontal surface exerts a normal contact force 
equals to its weight. The pressure of the solid on the surface depends on the area of contact.
The pressure between two solid surfaces depends on two things:
(a) the force between the surfaces
(b) the area of contact between the two surfaces.',
                'activity_link' => 'pressure.gif',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            28 => 
            array (
                'activity_id' => 30,
                'activity_name' => 'Introduction to Vectors',
                'topic_idFK' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Zadie lives in Chicago and decides to go on vacation, so she gets on a plane and flies 200 miles. 
Where did she end up?
You can\'t know where she ends up without first knowing what direction she flew in, right? This is an 
example of a vector, which is a quantity that has both a magnitude and a direction. In order to know 
where Zadie went on her vacation, you need to know both how far she went and in what direction.
Many other physical quantities, such as force, velocity, and momentum, are also vectors. Vectors may be 
either two dimensional or three dimensional, depending on the situation.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 5,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            29 => 
            array (
                'activity_id' => 31,
                'activity_name' => 'Two-Dimensional Vectors',
                'topic_idFK' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
            'activity_text' => 'One way to represent a two-dimensional vector is with vector components, which simply tell you how far the vector goes in each direction. For example, a vector with an x-component of 4 and a y-component of 3 that started at the origin would end at coordinates (4,3).',
                'activity_link' => '2d_vector_coordinates.png',
                'content_level' => 'Easy',
                'content_level_value' => 63,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            30 => 
            array (
                'activity_id' => 32,
                'activity_name' => 'The Law of Ellipses',
                'topic_idFK' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
            'activity_text' => 'An ellipse is a special curve in which the sum of the distances from every point on the curve to two other points is a constant. The two other points (represented here by the tack locations) are known as the foci of the ellipse. The closer together that these points are, the more closely that the ellipse resembles the shape of a circle. In fact, a circle is the special case of an ellipse in which the two foci are at the same location. Kepler\'s first law is rather simple - all planets orbit the sun in a path that resembles an ellipse, with the sun being located at one of the foci of that ellipse',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 1,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            31 => 
            array (
                'activity_id' => 33,
                'activity_name' => 'The Law of Equal Areas',
                'topic_idFK' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Kepler\'s second law - sometimes referred to as the law of equal areas - describes the speed at which any given planet will move while orbiting the sun. The speed at which any planet moves through space is constantly changing. A planet moves fastest when it is closest to the sun and slowest when it is furthest from the sun. Yet, if an imaginary line were drawn from the center of the planet to the center of the sun, that line would sweep out the same area in equal periods of time.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 16,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            32 => 
            array (
                'activity_id' => 34,
                'activity_name' => 'First activity',
                'topic_idFK' => 1,
                'created_at' => '2023-01-17 19:56:05',
                'updated_at' => '2023-01-17 19:56:05',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is first activity added using a text editor.</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 74,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            33 => 
            array (
                'activity_id' => 35,
                'activity_name' => 'Activity 2',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 11:59:15',
                'updated_at' => '2023-01-18 11:59:15',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is second content</p>',
                'activity_link' => NULL,
                'content_level' => 'Medium',
                'content_level_value' => 20,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            34 => 
            array (
                'activity_id' => 36,
                'activity_name' => 'Activity 3',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 12:00:40',
                'updated_at' => '2023-01-18 12:00:40',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>My activity is 3</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 81,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Multi-structure',
                'score' => 0,
            ),
            35 => 
            array (
                'activity_id' => 37,
                'activity_name' => 'Activity 4',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 12:05:08',
                'updated_at' => '2023-01-18 12:05:08',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This content is good</p>',
                'activity_link' => NULL,
                'content_level' => 'Medium',
                'content_level_value' => 42,
                'taxonomy_type' => 'Solo',
                'bloom_type' => 'K',
                'solo_type' => 'Relational',
                'score' => 0,
            ),
            36 => 
            array (
                'activity_id' => 38,
                'activity_name' => 'The one 1',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 16:48:26',
                'updated_at' => '2023-01-18 16:48:26',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>The new one two.</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 68,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            37 => 
            array (
                'activity_id' => 39,
                'activity_name' => 'This is best activity',
                'topic_idFK' => 1,
                'created_at' => '2023-01-18 19:15:47',
                'updated_at' => '2023-01-18 19:15:47',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>This is best activity</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 14,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            38 => 
            array (
                'activity_id' => 40,
                'activity_name' => 'tesin',
                'topic_idFK' => 1,
                'created_at' => '2023-02-07 10:58:28',
                'updated_at' => '2023-02-07 10:58:28',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'test',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 66,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            39 => 
            array (
                'activity_id' => 41,
                'activity_name' => 'jjhjhk',
                'topic_idFK' => 1,
                'created_at' => '2023-02-07 11:02:58',
                'updated_at' => '2023-02-07 11:02:58',
                'created_by' => 49,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => '<p>jhkhkj</p>',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 88,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 50,
            ),
            40 => 
            array (
                'activity_id' => 42,
                'activity_name' => 'History and Motivation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'In 1936, Howard Aiken had proposed his idea to build a giant calculating machine to the Physics Department, He was told by the chairman, Frederick Saunders, that a lab technician, Carmelo Lanza, had told him about a similar contraption already stored up in the Science Center attic.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 44,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            41 => 
            array (
                'activity_id' => 43,
                'activity_name' => 'Third generation',
                'topic_idFK' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
                'activity_text' => 'In 1969, Data General introduced the Nova and shipped 
a total of 50,000 at $8,000 each. The popularity of 16-bit computers, such as the 
Hewlett-Packard 21xx series and the Data General Nova, led the way toward word lengths that were 
multiples of the 8-bit byte. The Nova was first to employ medium-scale integration (MSI) circuits 
from Fairchild Semiconductor, with subsequent models using large-scale integrated (LSI) circuits. 
Also notable was that the entire central processor was contained on one 15-inch printed circuit board.',
                'activity_link' => '200px-Data_General_NOVA_System.jpeg',
                'content_level' => 'Easy',
                'content_level_value' => 57,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            42 => 
            array (
                'activity_id' => 44,
                'activity_name' => 'Fundamental Concepts of OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'video',
                'activity_text' => 'Object-oriented approaches to software development are an important expansion of procedural approaches. Java explicitly supports both approaches, but you should focus on the object-oriented approach. This article compares the two approaches and explains the fundamentals of each.',
                'activity_link' => 'https://www.youtube.com/embed/xFjsIWrRftE',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            43 => 
            array (
                'activity_id' => 45,
                'activity_name' => 'Using Java for OO Programming',
                'topic_idFK' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'A class represents a set of objects which share the same structure and behaviors. The class determines the structure of objects by specifying variables that are contained in each instance of the class, and it determines behavior by providing the instance methods that express the behavior of the objects. This is a powerful idea. However, something like this can be done in most programming languages. The central new idea in object-oriented programming -- the idea that really distinguishes it from traditional programming -- is to allow classes to express the similarities among objects that share some, but not all, of their structure and behavior. Such similarities can be expressed using inheritance and polymorphism.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 97,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            44 => 
            array (
                'activity_id' => 46,
                'activity_name' => 'Working with Classes',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
            'activity_text' => 'The name of the class (and therefore the name of the file) is up to you. In programming, the name for something is called an identifier. An identifier is one or more characters long.The first character of an identifier cannot be a digit. The remaining characters can be a mix of alphabetic characters, digits, underscore, and dollar sign $. No spaces are allowed inside an identifier.
It is conventional for a class name to start with a capital letter, but this is not required by the compiler. However, follow this convention so your programs are easier to understand. A source file should always end with .java in lower case.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 22,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            45 => 
            array (
                'activity_id' => 47,
                'activity_name' => 'Importing Libraries',
                'topic_idFK' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Java comes with a rich set of pre-written classes that a programmer can use while developing Java programs. These classes are organized into packages. The following are just a few of the large number of different packages in Java at Oracles Java API Specifications:
java.applet: The applet package provides the classes necessary to create an applet and the classes an applet uses to communicate with its applet context.
java.awt: The awt package contains all of the classes for creating user interfaces and for painting graphics and images.
java.lang: The lang package provides classes that are fundamental to the design of the Java programming language.
In order to use a Java class declared in these packages, you need to include an import statement before class declaration in your program. The import statement starts with the keyword import, followed by the name of the java package.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 17,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            46 => 
            array (
                'activity_id' => 48,
                'activity_name' => 'Physics and Technology.',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Some areas of technology that requires knowledge of physics are X-rays, lasers, scanners which are applications of physics are used in diagnosis and treatment of diseases.
Satellite communication, internet, fibre optics are applications of internet which requires strong foundation in physics.
In the area of defense, physics has many applications e.g. war planes, laser-guided bombs which have high level accuracy.
In entrainment industry, knowledge of physics has use in mixing various colours to bring out the desirable stage effects',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 21,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            47 => 
            array (
                'activity_id' => 49,
                'activity_name' => 'Pressure',
                'topic_idFK' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'image',
            'activity_text' => 'The SI unit of pressure is newton per square metre (N/m2). Pressure can also be expressed in pascals (Pa);
1N/m2=1Pa
Atmospheric pressure is sometimes expressed as mmHg, cmHg or atmospheres.
For a given amount of force, the smaller the area of contact the greater the pressure exerted. 
This explains why it would be easier for a sharp pin to penetrate a piece of cardboard than a blunt 
one when the same force is used.A solid resting on a horizontal surface exerts a normal contact force 
equals to its weight. The pressure of the solid on the surface depends on the area of contact.
The pressure between two solid surfaces depends on two things:
(a) the force between the surfaces
(b) the area of contact between the two surfaces.',
                'activity_link' => 'pressure.gif',
                'content_level' => 'Easy',
                'content_level_value' => 54,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
            48 => 
            array (
                'activity_id' => 50,
                'activity_name' => 'Introduction to Vectors',
                'topic_idFK' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'activity_type' => 'text',
                'activity_text' => 'Zadie lives in Chicago and decides to go on vacation, so she gets on a plane and flies 200 miles. 
Where did she end up?
You can\'t know where she ends up without first knowing what direction she flew in, right? This is an 
example of a vector, which is a quantity that has both a magnitude and a direction. In order to know 
where Zadie went on her vacation, you need to know both how far she went and in what direction.
Many other physical quantities, such as force, velocity, and momentum, are also vectors. Vectors may be 
either two dimensional or three dimensional, depending on the situation.',
                'activity_link' => NULL,
                'content_level' => 'Easy',
                'content_level_value' => 5,
                'taxonomy_type' => 'Bloom',
                'bloom_type' => 'K',
                'solo_type' => 'Pre-structure',
                'score' => 0,
            ),
        ));
        
        
    }
}