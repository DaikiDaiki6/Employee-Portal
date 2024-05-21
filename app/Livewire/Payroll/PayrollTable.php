<?php

namespace App\Livewire\Payroll;

use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;

class PayrollTable extends Component
{
    use WithPagination;

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

    public function view($index){
        return redirect()->to(route('PayrollView', ['index' => $index]));
    }



    public function render()
    {
        $loggedInUser = auth()->user();
        $query = Payroll::where('employee_id', $loggedInUser->employee_id);
        switch ($this->filter) {
            case '1':
                $query->whereDate('date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $query->whereBetween('date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $query->whereDate('date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('date', [Carbon::today()->subYear(), Carbon::today()]);
                // $query->whereDate('date', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('date', 'like', '%' . $this->search . '%')->orderBy('date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('date', 'desc')->paginate(5);
        }

        return view('livewire.payroll.payroll-table', [
            'PayrollData' => $results,
        ]);
        
    }

    
}
