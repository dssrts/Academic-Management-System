<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buildings = ['GV', 'GEE', 'GL', 'GCA', 'GK'];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $times = [
            '06:00:00', '08:00:00', '10:00:00', '12:00:00', '14:00:00', '16:00:00', '18:00:00', '20:00:00'
        ];

        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            // Randomly select building, day, and time
            $building = $buildings[array_rand($buildings)];
            $day = $days[array_rand($days)];
            $time = $times[array_rand($times)];

            // Try assigning room until there's no conflict
            $roomNumber = $this->assignRoom($building, $day, $time);

            // Generate status (Taken or Available)
            $status = rand(0, 1) ? 'Taken' : 'Available';
            $typeofroom = rand(0, 1) ? 'Lab' : 'Lec';

            // Create schedule
            Schedule::create([
                'building' => $building,
                'room_number' => $roomNumber,
                'type' => $typeofroom, // You need to replace 'Type' with the actual type
                'day' => $day,
                'time' => $time,
                'status' => $status,
                'subject_id' => $subject->id,
            ]);
        }
    }

    /**
     * Assign room number ensuring there's no conflict
     *
     * @param string $building
     * @param string $day
     * @param string $time
     * @return int
     */
    private function assignRoom(string $building, string $day, string $time): int
    {
        $roomNumber = rand(300, 312);

        // Ensure there is no conflicting schedule
        $conflictingSchedule = Schedule::where('building', $building)
            ->where('room_number', $roomNumber)
            ->where('day', $day)
            ->where('time', $time)
            ->exists();

        // If there is a conflicting schedule, try another room
        while ($conflictingSchedule) {
            $roomNumber = rand(300, 330);
            $conflictingSchedule = Schedule::where('building', $building)
                ->where('room_number', $roomNumber)
                ->where('day', $day)
                ->where('time', $time)
                ->exists();
        }

        return $roomNumber;
    }
}
