<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Traininganswer;
use Livewire\Attributes\Locked;

class TrainingView extends Component
{
    public $trainingData;
    public $index;
    public $preTestAnswerExists;
    public $postTestAnswerExists;

    #[Locked]
    public $is_head;

    public function mount($index){
        $this->index = $index;
        $this->trainingData = Training::findOrFail($index);
        $loggedInUser = auth()->user();
        $employeeData = Employee::select('is_department_head_or_dean')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first();
        $head = explode(',', $employeeData->is_department_head_or_dean[0] ?? ' ');
        $this->is_head = $head[0] == 1 || $head[1] == 1 || $loggedInUser->is_admin ? true : false;
        $this->preTestAnswerExists = Traininganswer::where('employee_id', $loggedInUser->employeeId)
            ->whereNotNull('pre_test_answers')
            ->where('id', $this->trainingData->id)
            ->exists();
        $this->postTestAnswerExists = Traininganswer::where('employee_id', $loggedInUser->employeeId)
            ->whereNotNull('post_test_answers')
            ->where('id', $this->trainingData->id)
            ->exists();
        // dd($this->activityData->poster);
    }

    public function render()
    {
      
        return view('livewire.trainings.training-view', [
            'TrainingData' => $this->trainingData,
            'PreTestAnswer' => $this->preTestAnswerExists
        ])->extends('layouts.app');
    }
}
