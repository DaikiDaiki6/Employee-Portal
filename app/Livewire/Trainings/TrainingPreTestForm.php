<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Traininganswer;

class TrainingPreTestForm extends Component
{
    public $trainingData;
    public $preTest;
    public $index;

    public function mount($index){
        $this->index = $index;
        $this->trainingData = Training::findOrFail($index);
        $this->trainingData->pre_test_questions = json_decode($this->trainingData->pre_test_questions);
        $dataArray = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
        $dataArray = $this->trainingData->pre_test_questions;
        // unset($dataArray[0]['answer']);
        foreach ($dataArray as $key => $question) {
           $dataArray[$key]['answer'] = '';
        } 
        $this->preTest = $dataArray;
    }

    public function submit(){
        $trainingData = new Traininganswer;
        $loggedInUser = auth()->user();

        $trainingData->employee_id = Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_id');
        $trainingData->training_id = $this->index;
        $preTestData = $this->preTest;
        foreach($preTestData as $data){
            $jsonPreTestData[] = [
                'answer' => $data['answer'],
            ];
        }
        $trainingData->pre_test_answers = $jsonPreTestData;
        $trainingData->save();

        $this->js("alert('Pre-Test Submitted!')"); 


        return redirect()->to(route('TrainingView', ['index' => $this->index]));


    }

    public function render()
    {
        return view('livewire.trainings.training-pre-test-form', [
            'TrainingData' => $this->trainingData,
        ])->extends('layouts.app');
    }
}
