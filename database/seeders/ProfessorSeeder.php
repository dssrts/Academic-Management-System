<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Number of professors to seed
        $numProfessors = 250;

        // Pronouns options
        $pronouns = ['he/him', 'she/her', 'they/them'];

        // Generate and insert professors
        for ($i = 1; $i <= $numProfessors; $i++) {
            $lastName = Str::random(10);
            $firstName = Str::random(10);
            $middleName = Str::random(10);
            $email = Str::random(10) . '@plm.edu.ph';
            $selectedPronouns = $pronouns[array_rand($pronouns)];

            DB::table('professors')->insert([
                'last_name' => $lastName,
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'pronouns' => $selectedPronouns,
                'plm_email' => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info("Successfully seeded $numProfessors professors.");
    }
}
