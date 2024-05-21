<?php

namespace App\Livewire\Approverequests\Leaverequest;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveLeaveRequestTable extends Component
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
            $leaveRequestData = Leaverequest::join('employees', 'employees.employee_id', 'leaverequests.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('leaverequests.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($head[0] == 1) {
            $leaveRequestData= Leaverequest::join('employees', 'employees.employee_id', 'leaverequests.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('leaverequests.*') // Select only Leaverequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $leaveRequestData = Leaverequest::join('employees', 'employees.employee_id', 'leaverequests.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('leaverequests.*') // Select only Leaverequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($loggedInUser->is_admin == 1) {
            $leaveRequestData = Leaverequest::orderBy('created_at', 'desc');
        } 
        else{
            abort(404);
        }

          switch ($this->filter) {
            case '1':
                $leaveRequestData->whereDate('date_of_filling',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $leaveRequestData->whereBetween('date_of_filling', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $leaveRequestData->whereBetween('date_of_filling', [Carbon::today()->subDays(30), Carbon::today()]);
                // $leaveRequestData->whereDate('date_of_filling', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $leaveRequestData->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $leaveRequestData->whereDate('date_of_filling', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $leaveRequestData->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                // $leaveRequestData->whereDate('date_of_filling', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $leaveRequestData = $leaveRequestData->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc');
        } else {
            $leaveRequestData = $leaveRequestData->orderBy('date_of_filling', 'desc');
        }

        return view('livewire.approverequests.leaverequest.approve-leave-request-table', [
            'LeaveRequestData' => $leaveRequestData->paginate(5),
            // 'ipcrs' => Ipcr::where('employee_id', $loggedInUser->employee_id)->paginate(10),

        ]);

        // // $loggedInUser = auth()->user()->employee_id;
        // // $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        // return view('livewire.approverequests.leaverequest.approve-leave-request-table', [
        //     'LeaveRequestData' => Leaverequest::where('department_name', $departmentName)->paginate(10),
        // ]);
    }

    public function removeLeaveRequest($id){
        $leaverequest = Leaverequest::findOrFail($id);
        $leaverequest->delete();
        return redirect()->route('LeaveRequestTable');
    }
    
   
}
