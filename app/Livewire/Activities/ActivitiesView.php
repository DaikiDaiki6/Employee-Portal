<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use Livewire\Attributes\Locked;

class ActivitiesView extends Component
{
    public $activityData;
    public $index;
    #[Locked]
    public $is_head;
    public function mount($index){
        $this->index = $index;
        $loggedInUser = auth()->user();
        $employeeData = Employee::select('is_department_head_or_dean')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first();
        $head = explode(',', $employeeData->is_department_head_or_dean[0] ?? ' ');
        $this->is_head = $head[0] == 1 || $head[1] == 1 || $loggedInUser->is_admin ? true : false;

        $this->activityData = Activities::findOrFail($index);
        // dd($this->activityData->poster);
    }
    public function render()
    {
        return view('livewire.activities.activities-view', [
            'ActivityData' => $this->activityData,
        ])->extends('layouts.app');

    }
}
