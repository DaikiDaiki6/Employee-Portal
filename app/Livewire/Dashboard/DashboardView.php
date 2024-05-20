<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use App\Models\Dailytimerecord;
use App\Models\Training;
use Illuminate\Support\Facades\DB;

class DashboardView extends Component
{
    public $activities;

    public $trainings;
    public $data;
    public $dateData = [];
    public $weeklyCountsArray = [];
    public $monthlyCountsArray = [];
    public $vacationCredits;
    public $sickCredits;

    public $filter = "Weekly";

    public $period;

    public $firstName;

    public $gender;

    public $currentHourMinuteSecond;

    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->employee_id;
        $employeeInformation = Employee::where('employee_id', $loggedInUser)
                                ->select('department_name', 'sick_credits', 'vacation_credits', 'first_name', 'gender')->get();
        $this->firstName = $employeeInformation[0]->first_name;
        $this->vacationCredits = $employeeInformation[0]->vacation_credits;
        $this->sickCredits = $employeeInformation[0]->sick_credits;
        $this->gender = $employeeInformation[0]->gender;
        $this->activities = Activities::whereJsonContains('visible_to_list', $employeeInformation[0]->department_name)->get();
        $this->trainings = Training::whereJsonContains('visible_to_list', $employeeInformation[0]->department_name)->get();

        $attendanceCount = Dailytimerecord::where('employee_id', $loggedInUser)->count();
        // $this->currentHourMinuteSecond = Carbon::now();
        $currentTime = Carbon::now();
        // Set the start and end times for each period
        $morningStart = Carbon::createFromTime(6, 0, 0); // 6:00 AM
        $afternoonStart = Carbon::createFromTime(12, 0, 0); // 12:00 PM (noon)
        $eveningStart = Carbon::createFromTime(18, 0, 0); // 6:00 PM

        // Compare the current time with the defined periods
        if ($currentTime->between($morningStart, $afternoonStart)) {
            // Current time is in the morning
            $this->period = 'Morning';
        } elseif ($currentTime->between($afternoonStart, $eveningStart)) {
            // Current time is in the afternoon
            $this->period = 'Afternoon';
        } else {
            // Current time is in the evening
            $this->period = 'Evening';
        }
        // dd($this->period);
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

    // Query to get the attendance count for each month in the current year
    $monthlyCounts = Dailytimerecord::select(
            DB::raw('MONTH(attendance_date) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->where('employee_id', $loggedInUser)
        // ->where('attendance_type', 'time-in')
        ->whereYear('attendance_date', $currentYear)
        ->groupBy(DB::raw('MONTH(attendance_date)'))
        ->get();

    // Query to get the attendance count for each week in the current month
    // $weeklyCounts = Dailytimerecord::select(
    //         DB::raw('WEEK(attendance_date) as week'),
    //         DB::raw('COUNT(*) as count')
    //     )
    //     ->where('employee_id', $loggedInUser)
    //     ->where('attendance_type', 'time-in')
    //     ->whereYear('attendance_date', $currentYear)
    //     ->whereMonth('attendance_date', $currentMonth)
    //     ->groupBy(DB::raw('WEEK(attendance_date)'))
    //     ->get();
    // dd($weeklyCounts[0], $monthlyCounts[0]);

    $weeklyCounts = Dailytimerecord::select(
        DB::raw('WEEK(attendance_date, 0) as week'), // Start the week on Sunday (0)
        DB::raw('COUNT(*) as count')
    )
    ->where('employee_id', $loggedInUser)
    // ->where('attendance_type', 'time-in')
    ->whereYear('attendance_date', $currentYear)
    ->whereMonth('attendance_date', $currentMonth)
    ->groupBy(DB::raw('WEEK(attendance_date, 0)'))
    ->get();

    // Initialize arrays to hold the counts for each month and week
    $monthlyCountsArray = [];
    $weeklyCountsArray = [];

    // dd($weeklyCounts);

    // Process monthly counts
    for ($i = 1; $i <= 12; $i++) {
        $found = false;
        foreach ($monthlyCounts as $count) {
            if ($count->month == $i) {
                $this->monthlyCountsArray[$i] = $count->count;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $this->monthlyCountsArray[$i] = 0;
        }
    }

    // for ($i = 1; $i <= 5; $i++) {
    //     $found = false;
    //     foreach ($weeklyCounts as $count) {
    //         if ($count->month == $i) {
    //             $this->weeklyCountsArray[$i] = $count->count;
    //             $found = true;
    //             break;
    //         }
    //     }
    //     if (!$found) {
    //         $this->weeklyCountsArray[$i] = 0;
    //     }
    // }


    foreach ($weeklyCounts as $count) {
        if($count->count != 0){
            $this->weeklyCountsArray[] = $count->count;
        }else {
            $this->weeklyCountsArray[] = 0;
        }
    }
    while (count($this->weeklyCountsArray) < 5) {
        $this->weeklyCountsArray[] = 0;
    }
    // dd($this->weeklyCountsArray);

    $this->data = array_values($this->weeklyCountsArray);
    
    }

   

    public function filter($filter){
        if($filter == 'weekly'){
            return [332, 321, 54, 32, 32];
            
        }
        else if ($filter == 'monthly'){
            // $this->dateData = $this->monthlyCountsArray;
            return [332, 321, 54, 32, 32];

        }
        $this->dispatch('$refresh');

    }

    public function setFilter($filter){
        if($filter == "weekly"){
            $this->filter = "Weekly";
                $this->dispatch('refresh-weekly-chart', data: array_values($this->weeklyCountsArray));
        }
        else{
            $this->filter = "Monthly";
            // dd($this->monthlyCountsArray );
            $this->dispatch('refresh-monthly-chart', data: array_values($this->monthlyCountsArray));
        }
        
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-view', [
            'data' => $this->filter($this->filter),
        ]);

      
    }
}
