<?php

namespace App\Livewire\Approverequests\Studypermit;

use Livewire\Component;
use App\Models\Studypermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Employee;

class ApproveStudyPermitTable extends Component
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
        return view('livewire.approverequests.studypermit.approve-study-permit-table', [
            'StudyPermitData' => Studypermit::where('department_name', $departmentName)->paginate(10),
        ]);

    }

}
