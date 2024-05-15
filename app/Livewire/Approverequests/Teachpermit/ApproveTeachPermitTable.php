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
        $loggedInUser = auth()->user();
        
        $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        $head = explode(',', $loggedInEmployeeData->is_department_head_or_dean[0] ?? ' ');
        $departmentHeadId = $loggedInEmployeeData->department_id;
        $collgeDeanId = $loggedInEmployeeData->dean_id;

        // Check if condition for department head is true
        if ($head[0] == 1 && $head[1] == 1){
            $teachPermitData = Teachpermit::join('employees', 'employees.employee_id', 'teachpermits.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('teachpermits.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($head[0] == 1) {
            $teachPermitData = Teachpermit::join('employees', 'employees.employee_id', 'teachpermits.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('teachpermits.*') // Select only Teachpermit columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $teachPermitData = Teachpermit::join('employees', 'employees.employee_id', 'teachpermits.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('teachpermits.*') // Select only Teachpermit columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($loggedInUser->is_admin == 1) {
            $teachPermitData = Teachpermit::paginate(10);
        } 
        else{
            abort(404);
        }

        return view('livewire.approverequests.teachpermit.approve-teach-permit-table', [
            'TeachPermitData' => $teachPermitData,
        ]);

        // $loggedInUser = auth()->user()->employee_id;
        // $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        // return view('livewire.approverequests.teachpermit.approve-teach-permit-table', [
        //     'TeachPermitData' => Teachpermit::where('department_name', $departmentName)->paginate(10),
        // ]);

    }   
}
