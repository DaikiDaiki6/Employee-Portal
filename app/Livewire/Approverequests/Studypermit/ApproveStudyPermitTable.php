<?php

namespace App\Livewire\Approverequests\Studypermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Studypermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveStudyPermitTable extends Component
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
            $studyPermitData = Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('studypermits.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($head[0] == 1) {
            $studyPermitData= Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('studypermits.*') // Select only Studypermit columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $studyPermitData = Studypermit::join('employees', 'employees.employee_id', 'studypermits.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('studypermits.*') // Select only Studypermit columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($loggedInUser->is_admin == 1) {
            $studyPermitData = Studypermit::orderBy('created_at', 'desc');
        } 
        else{
            abort(404);
        }

        switch ($this->filter) {
            case '1':
                $studyPermitData->whereDate('application_date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $studyPermitData->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $studyPermitData->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $studyPermitData->whereDate('application_date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $studyPermitData->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $studyPermitData->whereDate('application_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $studyPermitData->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
                // $studyPermitData->whereDate('application_date', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $studyPermitData = $studyPermitData->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc');
        } else {
            $studyPermitData = $studyPermitData->orderBy('application_date', 'desc');
        }


        return view('livewire.approverequests.studypermit.approve-study-permit-table', [
            'StudyPermitData' => $studyPermitData->paginate(5),
        ]);

    }

}
