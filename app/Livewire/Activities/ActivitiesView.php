<?php

namespace App\Livewire\Activities;

use App\Models\Activities;
use Livewire\Component;

class ActivitiesView extends Component
{
    public $activityData;
    public $index;
    public function mount($index){
        $this->index = $index;

        $this->activityData = Activities::findOrFail($index);
        // dd($this->activityData->poster);
    }
    public function render()
    {
        return view('livewire.activities.activities-view', [
            'ActivityData' => $this->activityData,
        ])->extends('layouts.app');

    }
}
