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

    public $employeeName;

    public $employeeEmail;
    public function mount(){
        $loggedInUser = auth()->user();
        $this->role = (int) Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_role');
        $employee = Employee::where('employee_id', $loggedInUser->employee_id)->first(); 
        // dd($this->role);
        $this->employeeImage = $employee->emp_image;
        $this->employeeName = $employee->first_name. ' ' . $employee->middle_name . ' ' . $employee->last_name;
        $this->employeeEmail = $loggedInUser->email;
    }

    public function render()
    {
        return view('livewire.sidebar.sidebar-view');
    }
}
