<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;
use App\Models\Employee;
use Livewire\Attributes\Locked;

class SidebarView extends Component
{   
    #[Locked]
    public $role;

    public $employeeImage;
    public function mount(){
        $loggedInUser = auth()->user()->employeeId;
        $this->role = (int) Employee::where('employee_id', $loggedInUser)->value('employee_role');
        $employee = Employee::where('employee_id', $loggedInUser)->first(); // Replace $employeeId with the actual employee ID
        $this->employeeImage = $employee->emp_image;
    }

    public function render()
    {
        return view('livewire.sidebar.sidebar-view');
    }
}
