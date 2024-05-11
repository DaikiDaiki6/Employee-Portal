<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Dailytimerecord;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 275; $i++) {
            $randomLate = rand(0, 1); // Random late status (0 or 1)
            $randomHour = rand(0, 23); // Random hour (0 to 23)
            $randomMinute = rand(0, 59); // Random minute (0 to 59)
            $randomMonth = rand(1, 12); // Random month (1 to 12)
            $randomDay = rand(1, 28); // Random day (assuming all months have max 28 days)
            $attendanceDate = Carbon::createFromDate(2024, $randomMonth, $randomDay);
            
            Dailytimerecord::create([
                'employee_id' => '202132321',
                'attendance_date' => $attendanceDate,
                'time_in' => sprintf("%02d:%02d", $randomHour, $randomMinute), // Format hour and minute
                'time_out' => sprintf("%02d:%02d", $randomHour, $randomMinute), // Use same random time for time_out
                'late' => $randomLate,
                'status' => 1,
            ]);
        }
    }
}
