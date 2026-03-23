<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;
use App\Models\Professor;
use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Factories\Factory;
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

        // Ensure each student record is used 12-20 times
        foreach ($studentRecords as $studentRecord) {
            $usageCount = rand(12, 20);

            for ($i = 0; $i < $usageCount; $i++) {
                $classTitle = $faker->randomElement($this->classTitles);
                // Generate class code based on class title (example logic)
                $classCode = strtoupper(substr(str_replace(' ', '', $classTitle), 0, 3)) . $faker->numberBetween(0, 9999);

                ClassModel::create([
                    'student_record_id' => $studentRecord->id,
                    'professor_id' => $this->getRandomProfessorId($professorIds),
                    'code' => $classCode,
                    'section' => $faker->randomElement(['1', '2', '3', '4', '5']),
                    'name' => $classTitle,
                    'description' => $faker->paragraph,
                    'units' => $faker->numberBetween(1, 5),
                    'day' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']),
                    'start_time' => $faker->time(),
                    'end_time' => $faker->time(),
                    'building' => $faker->word,
                    'room' => $faker->numberBetween(100, 500),
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
