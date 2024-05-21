<?php

namespace App\Livewire\Opcr;

use Carbon\Carbon;
use App\Models\Opcr;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class OpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;


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

    public function render()
    {   
        $loggedInUser = auth()->user();
        $query = Opcr::where('employee_id', $loggedInUser->employee_id);
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

        return view('livewire.opcr.opcr-table', [
            'opcrs' => $results,
        ]);
    }

   

    public function editOpcr($id){
        $ipcr = Opcr::findOrFail($id + 1);
    }

    public function removeOpcr($id){
        $opcrToBeDeleted = Opcr::findOrFail($id);
        $opcrToBeDeleted->delete();
        return redirect()->route('OpcrTable');
    }

    
}
