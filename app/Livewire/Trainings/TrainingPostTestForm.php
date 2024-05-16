<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Traininganswer;

class TrainingPostTestForm extends Component
{
    public $trainingData;
    public $postTest;
    public $index;

    public function mount($index){
        $this->index = $index;
        $this->trainingData = Training::findOrFail($index);
        $this->trainingData->post_test_questions = json_decode($this->trainingData->post_test_questions);
        $dataArray = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
        $dataArray = $this->trainingData->post_test_questions;
        // unset($dataArray[0]['answer']);
        foreach ($dataArray as $key => $question) {
           $dataArray[$key]['answer'] = '';
        } 
        $this->postTest = $dataArray;
    }

    public function submit(){
        $loggedInUser = auth()->user();
        $trainingData = Traininganswer::where('employee_id', $loggedInUser->employee_id)->where('training_id', $this->index)->first();
        $trainingData->employee_id = Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_id');
        $trainingData->training_id = $this->index;
        $postTestData = $this->postTest;
        foreach($postTestData as $data){
            $jsonpostTestData[] = [
                'answer' => $data['answer'],
            ];
        }
        $trainingData->post_test_answers = $jsonpostTestData;
        $trainingData->update();

        $this->js("alert('Pre-Test Submitted!')"); 


        return redirect()->to(route('TrainingView', ['index' => $this->index]));


    }

    public function render()
    {
        return view('livewire.trainings.training-post-test-form', [
            'TrainingData' => $this->trainingData,
        ])->extends('layouts.app');
    }
}
