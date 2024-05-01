<?php

namespace App\Livewire\Approverequests\Teachpermit;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveTeachPermitTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $loggedInUser = auth()->user()->employeeId;
        $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        return view('livewire.approverequests.teachpermit.approve-teach-permit-table', [
            'TeachPermitData' => Teachpermit::where('department_name', $departmentName)->paginate(10),
        ]);

    }   
}
