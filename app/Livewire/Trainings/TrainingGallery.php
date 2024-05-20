<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use Livewire\Attributes\Locked;

class TrainingGallery extends Component
{
    public $training_title;
    public $training_information;
    public $training_photo;
    public $pre_test_title;
    public $post_test_title;
    public $pre_test_description;
    public $post_test_description;
    public $pre_test_questions;
    public $post_test_questions;
    public $pre_test_rating;
    public $post_test_rating;
    public $host;
    public $is_featured;
    public $visible_to_list;

    public $department_name;


    public $filter;

    #[Locked]
    public $is_head;

    public function filterListener(){
        $loggedInUser = auth()->user();
        $employeeData = Employee::select('department_id', 'dean_id', 'is_department_head_or_dean', 'department_name')
                    ->where('employee_id', $loggedInUser->employee_id)
                    ->first();
        $head = explode(',', $employeeData->is_department_head_or_dean[0] ?? ' ');
        $this->is_head = $head[0] == 1 || $head[1] == 1 || $loggedInUser->is_admin ? true : false;
        $this->department_name = $employeeData->department_name;
        if($this->filter != "All" && $this->filter != null){
            return Training::whereJsonContains('visible_to_list', $employeeData->department_name)
                        ->whereJsonContains('visible_to_list', $this->filter)
                        ->paginate(10);
        }
        else {
            return Training::whereJsonContains('visible_to_list', $employeeData->department_name)->orderBy('created_at', 'desc')->paginate(10);
        }

    }

    public function fillerSetter($type){
        return $this->filter = $type;
     }

    public function render()
    {
        return view('livewire.trainings.training-gallery', [
            // 'ActivitiesData' => $this->filterListener(),
            'TrainingData' => $this->filterListener(),

        ])->extends('layouts.app');
    }
}
