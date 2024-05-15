<?php

namespace App\Livewire\Approverequests\Opcr;

use App\Models\Opcr;
use Livewire\Component;
use App\Models\Employee;
use Barryvdh\DomPDF\PDF;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ApproveOpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

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
                ->paginate(10);
        }
        else if ($head[0] == 1) {
            $opcrData= Opcr::join('employees', 'employees.employee_id', 'opcrs.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('opcrs.*') // Select only Opcr columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $opcrData = Opcr::join('employees', 'employees.employee_id', 'opcrs.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('opcrs.*') // Select only Opcr columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($loggedInUser->is_admin == 1) {
            $opcrData = Opcr::paginate(10);
        } 
        else{
            abort(404);
        }
        return view('livewire.approverequests.opcr.approve-opcr-table', [
            'opcrs' => $opcrData,
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
