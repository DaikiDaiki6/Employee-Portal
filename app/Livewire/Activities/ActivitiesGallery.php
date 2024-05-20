<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use Livewire\Attributes\Locked;

class ActivitiesGallery extends Component
{   
    public $filter;

    #[Locked]
    public $is_head;


    public function mount(){
        $loggedInUser = auth()->user();
        $employeeData = Employee::select('department_id', 'dean_id', 'is_department_head_or_dean')
                    ->where('employee_id', $loggedInUser->employee_id)
                    ->first();
        $head = explode(',', $employeeData->is_department_head_or_dean[0] ?? ' ');
        $this->is_head = $head[0] == 1 || $head[1] == 1 || $loggedInUser->is_admin  ? true : false;
    }

    public function filterListener(){
        $loggedInUser = auth()->user();
        $departmentName = Employee::where('employee_id', $loggedInUser->employee_id)
                                ->value('department_name');
        if($this->filter == "Announcement"){
                return Activities::whereJsonContains('visible_to_list', $departmentName)
                        ->where('type', 'Announcement') // Add additional conditions if needed
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }
        else if($this->filter == "Event"){
                return Activities::whereJsonContains('visible_to_list', $departmentName)
                        ->where('type', 'Event') // Add additional conditions if needed
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }
        else if($this->filter == "Seminar"){
                return Activities::whereJsonContains('visible_to_list', $departmentName)
                        ->where('type', 'Seminar') // Add additional conditions if needed
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }
        else if($this->filter == "Training"){
            return Activities::whereJsonContains('visible_to_list', $departmentName)
                    ->where('type', 'Training') // Add additional conditions if needed
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }
        else if($this->filter == "Others"){
            return Activities::whereJsonContains('visible_to_list', $departmentName)
                    ->where('type', 'Others') // Add additional conditions if needed
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }
        else{
            return Activities::whereJsonContains('visible_to_list', $departmentName)->orderBy('created_at', 'desc')->paginate(10);
        }
    }

    public function fillerSetter($type){
       return $this->filter = $type;
    }
    
    public function render()
    {
        return view('livewire.activities.activities-gallery', [
            'ActivitiesData' => $this->filterListener(),
        ])->extends('layouts.app');
    }
}
