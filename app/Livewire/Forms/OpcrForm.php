<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Opcr;
use Livewire\Attributes\Validate;

class OpcrForm extends Form
{
    #[Validate('required|min:5')]
    public $title = '';
 
    #[Validate('required|min:5')]
    public $content = '';

    public function store(){
        $this->validate();
        Opcr::create(
            $this->all()
        );
    }
}
