<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all(); // Retrieve all users

        foreach ($users as $user) {
            $roleId = $this->getRoleIdByAccountType($user->account_type); // Get role ID based on account type
            if ($roleId) {
                DB::table('model_has_roles')->insert([
                    'model_id' => $user->id,
                    'role_id' => $roleId,
                    'model_type' => 'App\Models\User',
                ]);
            }
        }
    }

    /**
     * Get role ID based on account type.
     *
     * @param string $accountType
     * @return int|null
     */
    private function getRoleIdByAccountType(string $accountType): ?int
    {
        // Map account type to role ID
        $roleMap = [
            'Admin' => 1,
            'Chairperson' => 3,
            'Student' => 2,
            // Add more mappings if needed
        ];

        return $roleMap[$accountType] ?? null; // Return role ID or null if account type not found
    }
}
