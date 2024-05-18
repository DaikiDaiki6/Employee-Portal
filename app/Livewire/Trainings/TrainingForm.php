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
    }

    public function removePostTestQuestion($index){
        unset($this->postTest[$index]);
    }

    protected $rules = [
        'training_title' => 'required|max:150',
        'training_information' => 'required|max:1024',
        'training_photo' => 'required|mimes:jpg,png|extensions:jpg,png',
        // 'pre_test_title' => 'required|max:150',
        // 'post_test_title' => 'required|max:150',
        // 'preTest' => 'required|array|min:1|max:100',
        // 'preTest.*.question'  => 'required|required_with:preTest.*.answer|min:5|max:1024',
        // 'preTest.*.answer'  => 'required|required_with:preTest.*.question|min:5|max:1024',
        // 'postTest' => 'required|array|min:1|max:100',
        // 'postTest.*.question'  => 'required|required_with:postTest.*.answer|min:5|max:1024',
        // 'postTest.*.answer'  => 'required|required_with:postTest.*.question|min:5|max:1024',
        // 'pre_test_description' => 'required|max:1024',
        // 'post_test_description' => 'required|max:1024',
        'is_featured' => 'required|boolean',
        'host' => 'required|in:College of Information System and Technology Management,College of Engineering,College of Business Administration,College of Liberal Arts,College of Sciences,College of Education,Finance Department,Human Resources Department,Information Technology Department,Legal Department',
        'visible_to_list' => 'required|array',
        'visible_to_list.*' => 'required|in:College of Information System and Technology Management,College of Engineering,College of Business Administration,College of Liberal Arts,College of Sciences,College of Education,Finance Department,Human Resources Department,Information Technology Department,Legal Department',
    ];

    protected $validationAttributes = [
        'preTest.*.question' => 'Pre-Test Question',
        'preTest.*.answer' => 'Pre-Test Answer',
        'postTest.*.question' => 'Post-Test Question',
        'postest.*.answer' => 'Post-Test Answer',
    ];

    public function submit(){
        $this->validate();
        $trainingdata = new Training();
        $trainingdata->training_title = $this->training_title;
        $trainingdata->training_information = $this->training_information;
        // $trainingdata->pre_test_title = $this->pre_test_title;
        // $trainingdata->post_test_title = $this->post_test_title;
        // $trainingdata->pre_test_description = $this->pre_test_description;
        // $trainingdata->post_test_description = $this->post_test_description;
        $trainingdata->host = $this->host;
        $trainingdata->is_featured = $this->is_featured;
        $trainingdata->visible_to_list = $this->visible_to_list;

        // foreach($this->preTest as $data){
        //     $jsonPreTestData[] = [
        //         'question' => $data['question'],
        //         'answer' => $data['answer'],
        //     ];
        // }

        // foreach($this->postTest as $data){
        //     $jsonPostTestData[] = [
        //         'question' => $data['question'],
        //         'answer' => $data['answer'],
        //     ];
        // }

        // $jsonPreTestData = json_encode($jsonPreTestData);
        // $jsonPostTestData = json_encode($jsonPostTestData);


        // $trainingdata->pre_test_questions = $jsonPreTestData;
        // $trainingdata->post_test_questions = $jsonPostTestData;

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
