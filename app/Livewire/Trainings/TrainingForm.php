<?php

namespace App\Livewire\Trainings;

use Livewire\Component;
use App\Models\Training;
use Livewire\WithFileUploads;

class TrainingForm extends Component
{

    use WithFileUploads;
    
    public $preTest = [];
    public $postTest = [];
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


    public function mount(){
        $this->preTest = [
            ['question' => '', 'answer' => '']
        ];
        $this->postTest = [
            ['question' => '', 'answer' => '']
        ];
    }

    public function addPreTestQuestion(){
        $this->preTest[] = ['question' => '', 'answer' => ''];
        ;
    }

    public function addPostTestQuestion(){
            $this->postTest[] = ['question' => '', 'answer' => ''];
    }

    public function removePreTestQuestion($index){
        unset($this->preTest[$index]);
        $this->preTest = array_values($this->preTest);
    }

    public function removePostTestQuestion($index){
        unset($this->postTest[$index]);
        $this->postTest = array_values($this->postTest);
    }

    public function submit(){
        $trainingdata = new Training();
        $trainingdata->training_title = $this->training_title;
        $trainingdata->training_information = $this->training_information;
        $trainingdata->pre_test_title = $this->pre_test_title;
        $trainingdata->post_test_title = $this->post_test_title;
        $trainingdata->pre_test_description = $this->pre_test_description;
        $trainingdata->post_test_description = $this->post_test_description;
        $trainingdata->host = $this->host;
        $trainingdata->is_featured = $this->is_featured;
        $trainingdata->visible_to_list = $this->visible_to_list;

        foreach($this->preTest as $data){
            $jsonPreTestData[] = [
                'question' => $data['question'],
                'answer' => $data['answer'],
            ];
        }

        foreach($this->postTest as $data){
            $jsonPostTestData[] = [
                'question' => $data['question'],
                'answer' => $data['answer'],
            ];
        }

        $jsonPreTestData = json_encode($jsonPreTestData);
        $jsonPostTestData = json_encode($jsonPostTestData);


        $trainingdata->pre_test_questions = $jsonPreTestData;
        $trainingdata->post_test_questions = $jsonPostTestData;

        $trainingdata->training_photo = $this->training_photo->store('photos/trainings/training_photos', 'public');

        $trainingdata->save();

        $this->js("alert('Training Created!')"); 


        return redirect()->to(route('TrainingGallery'));
    }

    public function render()
    {
        return view('livewire.trainings.training-form')->extends('layouts.app');
    }
}
