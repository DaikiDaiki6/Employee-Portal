<?php

namespace App\Livewire\Approverequests\Changeinformation;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ChangeInformation;

class ApproveChangeInformationTable extends Component
{

    
    public $filterName;

    public $filter;

    public $search = "";

    public function render()
    {
        $loggedInUser = auth()->user();
        $changeinfoData = ChangeInformation::orderBy('created_at', 'desc');

        
        switch ($this->filter) {
            case '1':
                $changeinfoData->whereDate('created_at',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $changeinfoData->whereBetween('created_at', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $changeinfoData->whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()]);
                // $changeinfoData->whereDate('created_at', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $changeinfoData->whereBetween('created_at', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $changeinfoData->whereDate('created_at', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $changeinfoData->whereBetween('created_at', [Carbon::today()->subYear(), Carbon::today()]);
                // $changeinfoData->whereDate('created_at', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $changeinfoData = $changeinfoData->where('created_at', 'like', '%' . $this->search . '%')->orderBy('created_at', 'desc');
        } else {
            $changeinfoData = $changeinfoData->orderBy('created_at', 'desc');
        }
        
        if($loggedInUser->is_admin){
            return view('livewire.approverequests.changeinformation.approve-change-information-table', [
                'ChangeInformationData' => $changeinfoData->paginate(5),
            ]);
        } else {
            abort(404);
        }
       

    }

   
}
