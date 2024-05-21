<?php

namespace App\Livewire\Leaverequest;

use Carbon\Carbon;
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

    public $filter;

    public $filterName;

    public $search = "";
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->employee_id;
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
        $query = Leaverequest::where('employee_id', $loggedInUser->employee_id);
        switch ($this->filter) {
            case '1':
                $query->whereDate('date_of_filling',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $query->whereBetween('date_of_filling', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('date_of_filling', [Carbon::today()->subDays(30), Carbon::today()]);
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('date_of_filling', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                $this->filterName = "Last Year";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('date_of_filling', 'desc')->paginate(5);
        }
        return view('livewire.leaverequest.leave-request-table', [
            'LeaveRequestData' => $results,
        ]);
    }

    public function removeLeaveRequest($id){
        $leaverequest = Leaverequest::findOrFail($id);
        $leaverequest->delete();
        return redirect()->route('LeaveRequestTable');
    }
}
