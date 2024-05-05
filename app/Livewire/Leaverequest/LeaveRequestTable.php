<?php

namespace App\Livewire\Leaverequest;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class LeaveRequestTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->employeeId;
        $employeeInformation = Employee::where('employee_id', $loggedInUser)
                                ->select('department_name', 'sick_credits', 'vacation_credits')->get();
        $this->vacationCredits = $employeeInformation[0]->vacation_credits;
        $this->sickCredits = $employeeInformation[0]->sick_credits;
    }

    public function leaveRequestView(){
        dd('test');
    }

    public function render()
    {
        $loggedInUser = auth()->user();
        return view('livewire.leaverequest.leave-request-table', [
            'LeaveRequestData' => Leaverequest::where('employee_id', $loggedInUser->employeeId)->paginate(10),
        ]);
    }

    public function removeLeaveRequest($id){
        $leaverequest = Leaverequest::findOrFail($id);
        $leaverequest->delete();
        return redirect()->route('LeaveRequestTable');
    }
}
