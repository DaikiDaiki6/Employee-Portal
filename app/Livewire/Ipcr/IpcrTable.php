<?php

namespace App\Livewire\Ipcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class IpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

   
    public $counter;

    public $filterName;

    public $search = "";

    public $filter;

    public $ipcrCount;

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
        $query = Ipcr::where('employee_id', $loggedInUser->employee_id);
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
                // $query->whereDate('date_of_filling', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('date_of_filling', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                // $query->whereDate('date_of_filling', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('date_of_filling', 'desc')->paginate(5);
        }

        $this->ipcrCount = count($results);

        return view('livewire.ipcr.ipcr-table', [
            'ipcrs' => $results,
        ]);
    }

    public function editIpcr($id){
        $ipcr = Ipcr::findOrFail($id + 1);
    }

    public function removeIpcr($id){
        $ipcrToBeDeleted = Ipcr::findOrFail($id);
        $ipcrToBeDeleted->delete();
        return redirect()->route('IpcrTable');
    }
}
