<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;

class DashboardView extends Component
{
    public $activities;
    public $data;
    public $dateData = [];
    public $weeklyCountsArray = [];
    public $monthlyCountsArray = [];
    public $vacationCredits;
    public $sickCredits;

    public $filter = "Weekly";

    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->employeeId;
        $employeeInformation = Employee::where('employee_id', $loggedInUser)
                                ->select('department_name', 'sick_credits', 'vacation_credits')->get();
        $this->vacationCredits = $employeeInformation[0]->vacation_credits;
        $this->sickCredits = $employeeInformation[0]->sick_credits;
        $this->activities = Activities::whereJsonContains('visible_to_list', $employeeInformation[0]->department_name)->get();
        $attendanceCount = Dailytimerecord::where('employee_id', $loggedInUser)->count();

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
    // foreach ($monthlyCounts as $count) {
        
    // }

    // Process weekly counts
    // foreach ($weeklyCounts as $count) {
    //     $weeklyCountsArray[] = $count->count;
    // }

    foreach ($weeklyCounts as $count) {
        $this->weeklyCountsArray[] = $count->count;
    }
   

    $this->data = $this->weeklyCountsArray;
    
    }

   

    public function filter($filter){
        if($filter == 'weekly'){
            return $this->weeklyCountsArray;
            
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
            // dd($this->weeklyCountsArray);
            $this->dispatch('refresh-weekly-chart', data: $this->weeklyCountsArray);
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
        ])->extends('layouts.app');

      
    }
}
