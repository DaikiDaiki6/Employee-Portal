<?php

namespace App\Livewire\Approverequests\Ipcr;

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
        $loggedInUser = auth()->user()->employee_id;
        $id = Employee::Select('dean_id', 'department_id')->where('employee_id', $loggedInUser)->get();
        // dd($id[0]->dean_id);
        // dd(DeanNamesEnum::cases());
        $ipcrRecords = Ipcr::join('employees', 'employees.employee_id', 'ipcrs.employee_id')
                        ->where(function ($query) use ($id) {
                            $query->where('employees.department_id', $id[0]->dean_id)
                                ->orWhere('employees.dean_id', $id[0]->department_id);
                        })
                        ->select('ipcrs.*') // Select only ipcrs columns
                        ->distinct() // Ensure unique records
                        ->paginate(10);
    
                        
        // dd($ipcrRecords);
        
        return view('livewire.approverequests.ipcr.approve-ipcr-table', [
            'ipcrs' => $ipcrRecords,
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
