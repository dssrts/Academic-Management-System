<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;
use App\Models\StudentRecord;
use App\Models\Professor;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class ClassModelSeeder extends Seeder
{
    /**
     * Array of predefined class titles.
     *
     * @var array
     */
    protected $classTitles = [
        'Mathematics',
        'Physics',
        'Biology',
        'Chemistry',
        'English Literature',
        'History',
        'Computer Science',
        'Psychology',
        'Sociology',
        'Economics',
        'Political Science',
        'Philosophy',
        'Anthropology',
        'Art History',
        'Geography',
        'Environmental Science',
        'Engineering',
        'Business Administration',
        'Marketing',
        'Accounting',
        'Finance',
        'Management',
        'Human Resources',
        'Information Technology',
        'Health Sciences',
        'Nursing',
        'Medicine',
        'Dentistry',
        'Pharmacy',
        'Biomedical Engineering',
        'Agricultural Science',
        'Architecture',
        'Urban Planning',
        'Linguistics',
        'Foreign Languages',
        'Education',
        'Music',
        'Drama/Theater',
        'Film Studies',
        'Communication Studies',
        'Journalism',
        'Law',
        'Criminal Justice',
        'Public Administration',
        'Social Work',
        'Religious Studies',
        'Physical Education',
        'Nutrition',
        'Hospitality Management',
        'Culinary Arts',
        'Astronomy',
        'Astrophysics',
        'Biochemistry',
        'Biotechnology',
        'Botany',
        'Cell Biology',
        'Cognitive Science',
        'Data Science',
        'Demography',
        'Ecology',
        'Ethics',
        'Forensic Science',
        'Genetics',
        'Gerontology',
        'Healthcare Administration',
        'Immunology',
        'Kinesiology',
        'Library Science',
        'Marine Biology',
        'Materials Science',
        'Microbiology',
        'Neuroscience',
        'Oceanography',
        'Paralegal Studies',
        'Peace Studies',
        'Public Health',
        'Quantitative Analysis',
        'Radiology',
        'Robotics',
        'Statistics',
        'Theatre Arts',
        'Urban Studies',
        'Veterinary Science',
        'Zoology',
        'Actuarial Science',
        'Astrobiology',
        'Behavioral Science',
        'Bioinformatics',
        'Cartography',
        'Criminology',
        'Developmental Psychology',
        'Endocrinology',
        'Entomology',
        'Epidemiology',
        'Ethnography',
        'Fashion Design',
        'Game Design',
        'Geology',
        'Horticulture',
        'Industrial Engineering',
        'Inorganic Chemistry',
        'International Relations',
        'Landscape Architecture',
        'Mechanical Engineering',
        'Meteorology',
        'Molecular Biology',
        'Nanotechnology',
        'Operations Research',
        'Paleontology',
        'Petroleum Engineering',
        'Political Economy',
        'Quantum Mechanics',
        'Renewable Energy',
        'Semiotics',
        'Structural Engineering',
        'Systems Engineering',
        'Tax Law',
        'Textile Design',
        'Transportation Engineering',
        'Wildlife Biology',
        'Xenobiology',
        'Yoga Studies',
        'Zeitgeist Studies'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Fetch all student records
        $studentRecords = StudentRecord::all();

        // Fetch all professor ids
        $professorIds = Professor::pluck('id')->toArray();

        // Buildings
        $buildings = ['GV', 'GEE', 'GL', 'GCA', 'GK'];

        // Predefined start and end times with 2-hour gaps
        $timeSlots = [
            ['start' => '00:00', 'end' => '02:00'],
            ['start' => '02:00', 'end' => '04:00'],
            ['start' => '04:00', 'end' => '06:00'],
            ['start' => '06:00', 'end' => '08:00'],
            ['start' => '08:00', 'end' => '10:00'],
            ['start' => '10:00', 'end' => '12:00'],
            ['start' => '12:00', 'end' => '14:00'],
            ['start' => '14:00', 'end' => '16:00'],
            ['start' => '16:00', 'end' => '18:00'],
            ['start' => '18:00', 'end' => '20:00'],
            ['start' => '20:00', 'end' => '22:00'],
            ['start' => '22:00', 'end' => '00:00']
        ];

        // Set to keep track of used class codes and subjects per student
        $usedClassCodes = [];
        $studentSubjects = [];

        // Ensure each student record is used 12-20 times
        foreach ($studentRecords as $studentRecord) {
            $usageCount = rand(12, 20);

            // Initialize the student's subjects set
            if (!isset($studentSubjects[$studentRecord->id])) {
                $studentSubjects[$studentRecord->id] = [];
            }

            for ($i = 0; $i < $usageCount; $i++) {
                do {
                    $classTitle = $faker->randomElement($this->classTitles);
                    $classCode = strtoupper(substr(str_replace(' ', '', $classTitle), 0, 3)) . $faker->numberBetween(0, 9999);
                } while (in_array($classCode, $usedClassCodes) || in_array($classTitle, $studentSubjects[$studentRecord->id]));

                $usedClassCodes[] = $classCode;
                $studentSubjects[$studentRecord->id][] = $classTitle;

                $day = $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
                $units = $faker->numberBetween(1, 5);
                $room = $faker->numberBetween(100, 500);
                $building = $faker->randomElement($buildings);
                $timeSlot = $faker->randomElement($timeSlots);

                // Create a description related to the class title, day, units, room, and building
                $description = "This $classTitle class is held on $day in room $room of the $building building. The course is worth $units units and provides a comprehensive overview of the subject.";

                ClassModel::create([
                    'student_record_id' => $studentRecord->id,
                    'professor_id' => $this->getRandomProfessorId($professorIds),
                    'code' => $classCode,
                    'section' => $faker->randomElement(['1', '2', '3', '4', '5']),
                    'name' => $classTitle,
                    'description' => $description,
                    'units' => $units,
                    'day' => $day,
                    'start_time' => $timeSlot['start'],
                    'end_time' => $timeSlot['end'],
                    'building' => $building,
                    'room' => $room,
                    'type' => $faker->randomElement(['Lecture', 'Lab']),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * Get a random professor ID from the list of professor IDs
     *
     * @param array $professorIds
     * @return int
     */
    private function getRandomProfessorId(array $professorIds)
    {
        return $professorIds[array_rand($professorIds)];
    }
}
