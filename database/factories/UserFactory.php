<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use App\Models\Department;
use App\Models\College;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDepartmentID = Department::inRandomOrder()->first()->id;
        // $randomDepartmentCollegeID =  Department::find($randomDepartmentID)->college_id;
    
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        $name = $firstName . ' ' . $lastName;
        $email = strtolower(str_replace(' ', '', $name)) . '@example.com';
        $password = bcrypt('password');
        $initials = strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1)); // Assuming you want the first letter of first name and last name
        $accountTypes = ['Student', 'Admin', 'Chairperson'];
        $accountType = $accountTypes[array_rand($accountTypes)];
    
        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => $password,
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'user_code' => $initials,
            'account_type' => $accountType,
            'college_id' => Department::find($randomDepartmentID)->college_id,
            'department_id' => $randomDepartmentID,
        ];
    }
    
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn(array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
