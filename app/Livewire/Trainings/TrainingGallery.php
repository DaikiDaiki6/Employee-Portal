<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;

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

    public function filterListener(){
        $loggedInUser = auth()->user();
        $departmentName = Employee::where('employee_id', $loggedInUser->employee_id)
                                ->value('department_name');
        $this->department_name = $departmentName;
        if($this->filter != "All" && $this->filter != null){
            return Training::whereJsonContains('visible_to_list', $departmentName)
                        ->whereJsonContains('visible_to_list', $this->filter)
                        ->paginate(10);
                        // dd($this->filter);
        }
        else {
            // dd('seal');
            return Training::whereJsonContains('visible_to_list', $departmentName)->paginate(10);
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
