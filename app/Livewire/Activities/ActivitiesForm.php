<?php

namespace App\Livewire\Activities;

use App\Models\Activities;
use Livewire\Component;
use Livewire\WithFileUploads;

class ActivitiesForm extends Component
{
    use WithFileUploads;

    public $type;
    public $title;
    public $description;
    public $poster;
    public $date;
    public $start;
    public $end;
    public $host;
    public $is_featured;
    public $visible_to_list;

   

    public function submit(){

        $activitydata = new Activities();

        $activitydata->type = $this->type;
        $activitydata->type = $this->type;
        $activitydata->title = $this->title;
        $activitydata->description = $this->description;
        if($this->type == "Announcement"){
            $activitydata->poster = $this->poster->store('photos/activities/announcement', 'public');
        }
        else if($this->type == "Event"){
            $activitydata->poster = $this->poster->store('photos/activities/event', 'public');
        }
        else if($this->type == "Seminar"){
            $activitydata->poster = $this->poster->store('photos/activities/seminar', 'public');
        }
        else if($this->type == "Training"){
            $activitydata->poster = $this->poster->store('photos/activities/training', 'public');
        }
        else if($this->type == "Others"){
            $activitydata->poster = $this->poster->store('photos/activities/others', 'public');
        }
        $activitydata->date = $this->date;
        $activitydata->start = $this->start;
        $activitydata->end = $this->end;
        $activitydata->host = $this->host;
        $activitydata->is_featured = $this->is_featured;
        $activitydata->visible_to_list = $this->visible_to_list;

        $this->js("alert('Activity Created!')"); 
        $activitydata->save();
        return redirect()->to(route('ActivitiesGallery'));
    }

  
    public function render()
    {
        return view('livewire.activities.activities-form')->extends('layouts.app');
    }
}
