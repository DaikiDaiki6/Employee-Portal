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

    public $head;

    public $departmentHeadId ;

    public $collgeDeanId;

    public $is_admin;
    public function mount(){
        $loggedInUser = auth()->user();
        $this->is_admin = $loggedInUser->is_admin;
        // $this->role = (int) Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_role');
        $employee = Employee::where('employee_id', $loggedInUser->employee_id)->first(); 
        // dd($this->role);
        $this->employeeImage = $employee->emp_image;
        $this->employeeName = $employee->first_name. ' ' . $employee->middle_name . ' ' . $employee->last_name;
        $this->employeeEmail = $loggedInUser->email;

        // $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        $this->head = explode(',', $employee->is_department_head_or_dean[0] ?? ' ') ?? [];
        // $departmentHeadId = $employee->department_id;
        // $collgeDeanId = $employee->dean_id;
    }

    public function render()
    {
        return view('livewire.sidebar.sidebar-view');
    }
}
