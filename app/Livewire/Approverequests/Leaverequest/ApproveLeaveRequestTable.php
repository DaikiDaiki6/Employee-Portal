<?php

namespace App\Livewire\Approverequests\Leaverequest;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveLeaveRequestTable extends Component
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
        $loggedInUser = auth()->user()->employee_id;
        $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        return view('livewire.approverequests.leaverequest.approve-leave-request-table', [
            'LeaveRequestData' => Leaverequest::where('department_name', $departmentName)->paginate(10),
        ]);
    }

    public function removeLeaveRequest($id){
        $leaverequest = Leaverequest::findOrFail($id);
        $leaverequest->delete();
        return redirect()->route('LeaveRequestTable');
    }
    
   
}
