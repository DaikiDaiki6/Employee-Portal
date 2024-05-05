<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Training;
use App\Models\Traininganswer;

class TrainingView extends Component
{
    public $trainingData;
    public $index;
    public $preTestAnswerExists;
    public $postTestAnswerExists;

    public function mount($index){

        $this->trainingData = Training::findOrFail($index);
        $loggedInUser = auth()->user();
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
