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
        $loggedInUser = auth()->user();
        
        $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        $head = explode(',', $loggedInEmployeeData->is_department_head_or_dean[0] ?? ' ');
        $departmentHeadId = $loggedInEmployeeData->department_id;
        $collgeDeanId = $loggedInEmployeeData->dean_id;

        // Check if condition for department head is true
        if ($head[0] == 1 && $head[1] == 1){
            $studyPermitData = Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('studypermits.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($head[0] == 1) {
            $studyPermitData= Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('studypermits.*') // Select only Studypermit columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $studyPermitData = Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('studypermits.*') // Select only Studypermit columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($loggedInUser->is_admin == 1) {
            $studyPermitData = Studypermit::paginate(10);
        } 
        else{
            abort(404);
        }

        return view('livewire.approverequests.studypermit.approve-study-permit-table', [
            'StudyPermitData' => $studyPermitData,
        ]);

    }

}
