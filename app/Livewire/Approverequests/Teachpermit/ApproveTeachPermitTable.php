<?php

namespace App\Livewire\Approverequests\Teachpermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveTeachPermitTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    
    public $filterName;

    public $filter;

    public $search = "";

    
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
                ->orderBy('created_at', 'desc');
        }
        else if ($head[0] == 1) {
            $teachPermitData = Teachpermit::join('employees', 'employees.employee_id', 'teachpermits.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('teachpermits.*') // Select only Teachpermit columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $teachPermitData = Teachpermit::join('employees', 'employees.employee_id', 'teachpermits.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('teachpermits.*') // Select only Teachpermit columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($loggedInUser->is_admin == 1) {
            $teachPermitData = Teachpermit::orderBy('created_at', 'desc');
        } 
        else{
            abort(404);
        }

        switch ($this->filter) {
            case '1':
                $teachPermitData->whereDate('application_date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $teachPermitData->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $teachPermitData->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $teachPermitData->whereDate('application_date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $teachPermitData->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $teachPermitData->whereDate('application_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $teachPermitData->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
                // $teachPermitData->whereDate('application_date', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $teachPermitData = $teachPermitData->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc');
        } else {
            $teachPermitData = $teachPermitData->orderBy('application_date', 'desc');
        }

        return view('livewire.approverequests.teachpermit.approve-teach-permit-table', [
            'TeachPermitData' => $teachPermitData->paginate(5),
        ]);

        // $loggedInUser = auth()->user()->employee_id;
        // $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        // return view('livewire.approverequests.teachpermit.approve-teach-permit-table', [
        //     'TeachPermitData' => Teachpermit::where('department_name', $departmentName)->paginate(10),
        // ]);

    }   
}
