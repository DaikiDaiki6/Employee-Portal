<?php

namespace App\Livewire;

use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class Ipcrtable extends Component
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $loggedInUser = auth()->user();
        // $ipcrs = Ipcr::paginate(5)
        // return view('livewire.ipcrtable');
        return view('livewire.ipcr.ipcr-table', [
            'ipcrs' => Ipcr::where('employee_id', $loggedInUser->employeeId)->paginate(10),
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
