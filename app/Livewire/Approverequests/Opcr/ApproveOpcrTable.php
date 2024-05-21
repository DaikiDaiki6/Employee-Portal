<?php

namespace App\Livewire\Approverequests\Opcr;

use Carbon\Carbon;
use App\Models\Opcr;
use Livewire\Component;
use App\Models\Employee;
use Barryvdh\DomPDF\PDF;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveOpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $filterName;

    public $filter;

    public $search = "";


    // public function turnToPdf($index){
    //     $ipcr = Opcr::query()->where('id', $index)->get(); // Get IPCR Records
    //     $employee_id = Opcr::query()->where('id', $index)->value('employee_id'); // Get Employee ID
    //     $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
    //     Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
    //     $pdf = PDF::loadView('ipcr.Ipcrpdf', ['opcrs' => $ipcr, 'employees' => $employee]); // Pass data to the blade file
    //     $pdf->setPaper('A4', 'landscape'); // Set paper type and orientation
    //     return response()->stream(function() use($pdf){
    //         echo $pdf->stream();
    //     }, 'ipcr.pdf');
    // }

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
            $opcrData = Opcr::join('employees', 'employees.employee_id', 'opcrs.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('opcrs.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($head[0] == 1) {
            $opcrData= Opcr::join('employees', 'employees.employee_id', 'opcrs.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('opcrs.*') // Select only Opcr columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $opcrData = Opcr::join('employees', 'employees.employee_id', 'opcrs.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('opcrs.*') // Select only Opcr columns
                ->distinct() // Ensure unique records
                ->orderBy('created_at', 'desc');
        }
        else if ($loggedInUser->is_admin == 1) {
            $opcrData = Opcr::orderBy('created_at', 'desc');
        } 
        else{
            abort(404);
        }

        switch ($this->filter) {
            case '1':
                $opcrData->whereDate('date_of_filling',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $opcrData->whereBetween('date_of_filling', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $opcrData->whereBetween('date_of_filling', [Carbon::today()->subDays(30), Carbon::today()]);
                // $opcrData->whereDate('date_of_filling', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $opcrData->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $opcrData->whereDate('date_of_filling', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $opcrData->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                // $opcrData->whereDate('date_of_filling', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }

        if(strlen($this->search) >= 1){
            $opcrData = $opcrData->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc');
        } else {
            $opcrData = $opcrData->orderBy('date_of_filling', 'desc');
        }

        return view('livewire.approverequests.opcr.approve-opcr-table', [
            'opcrs' => $opcrData->paginate(5),
        ]);
    }

   

    public function editOpcr($id){
        $ipcr = Opcr::findOrFail($id + 1);
    }

    public function removeOpcr($id){
        $opcrToBeDeleted = Opcr::findOrFail($id);
        $opcrToBeDeleted->delete();
        return redirect()->route('opcrtable');
    }


}
