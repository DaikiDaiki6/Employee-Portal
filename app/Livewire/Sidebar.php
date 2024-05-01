<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class Sidebar extends Component
{
    public $employeeImage;

    public function mount(){
        $employee_id = auth()->user()->employeeId;
        $employee = Employee::where('employee_id', $employee_id)->value('emp_image');
        $this->employeeImage = $employee->emp_image;
    }
    public function render()
    {
        return view('livewire.sidebar',[
            'emp_image' => $this->employeeImage, 
        ]);
    }
}
