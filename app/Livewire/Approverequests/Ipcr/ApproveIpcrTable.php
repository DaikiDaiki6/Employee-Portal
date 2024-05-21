<?php

namespace App\Livewire\Approverequests\Ipcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use App\Enums\DeanNamesEnum;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;
use Illuminate\Validation\Rules\Enum;

class ApproveIpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    // public function turnToPdf($index){
    //     $ipcr = Ipcr::query()->where('id', $index)->get(); // Get IPCR Records
    //     $employee_id = Ipcr::query()->where('id', $index)->value('employee_id'); // Get Employee ID
    //     $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
    //     Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
    //     $pdf = PDF::loadView('ipcr.Ipcrpdf', ['ipcrs' => $ipcr, 'employees' => $employee]); // Pass data to the blade file
    //     $pdf->setPaper('A4', 'landscape'); // Set paper type and orientation
    //     return response()->stream(function() use($pdf){
    //         echo $pdf->stream();
    //     }, 'ipcr.pdf');
    // }

    public $counter;

    public $filterName;

    public $filter;

    public $search = "";

    public function search()
    {
        $this->resetPage();
    }

    // public                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      function mount(){
    //     $names = DeanNamesEnum::COLLEGE->value;
    //     dd($names);
    // }

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
            $ipcrData = Ipcr::join('employees', 'employees.employee_id', 'ipcrs.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('ipcrs.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($head[0] == 1) {
            $ipcrData= Ipcr::join('employees', 'employees.employee_id', 'ipcrs.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('ipcrs.*') // Select only Ipcr columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $ipcrData = Ipcr::join('employees', 'employees.employee_id', 'ipcrs.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('ipcrs.*') // Select only Ipcr columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($loggedInUser->is_admin == 1) {
            $ipcrData = Ipcr::orderBy('created_at', 'desc');
        } 
        else{
            abort(404);
        }

        switch ($this->filter) {
            case '1':
                $ipcrData->whereDate('date_of_filling',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $ipcrData->whereBetween('date_of_filling', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $ipcrData->whereBetween('date_of_filling', [Carbon::today()->subDays(30), Carbon::today()]);
                // $ipcrData->whereDate('date_of_filling', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $ipcrData->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $ipcrData->whereDate('date_of_filling', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $ipcrData->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                // $ipcrData->whereDate('date_of_filling', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $ipcrData = $ipcrData->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc');
        } else {
            $ipcrData = $ipcrData->orderBy('date_of_filling', 'desc');
        }

        return view('livewire.approverequests.ipcr.approve-ipcr-table', [
            'ipcrs' => $ipcrData->paginate(5),
            // 'ipcrs' => Ipcr::where('employee_id', $loggedInUser->employee_id)->paginate(10),

        ]);
    }

    public function editIpcr($id){
        $ipcr = Ipcr::findOrFail($id + 1);
    }

    public function removeIpcr($id){
        $ipcrToBeDeleted = Ipcr::findOrFail($id);
        $ipcrToBeDeleted->delete();
        return redirect()->route('ipcrtable');
    }


}
