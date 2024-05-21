<?php

namespace App\Livewire\Studypermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Studypermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class StudyPermitTable extends Component
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
        $query = Studypermit::where('employee_id', $loggedInUser->employee_id);
        switch ($this->filter) {
            case '1':
                $query->whereDate('application_date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $query->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $query->whereDate('application_date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break; 
            case '4':
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
                $this->filterName = "Last Year";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('application_date', 'desc')->paginate(5);
        }
        return view('livewire.studypermit.study-permit-table', [
            'StudyPermitData' => $results,
        ]);

    }

    public function removeStudyPermit($id){
        $studyPermitToBeDeleted = Studypermit::findOrFail($id);
        $studyPermitToBeDeleted->delete();
        return redirect()->route('StudyPermitTable');
    }
    
}
