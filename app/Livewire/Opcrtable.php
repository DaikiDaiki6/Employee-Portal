<?php

namespace App\Livewire;

use App\Models\Opcr;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Opcrtable extends Component
{
    use WithPagination, WithoutUrlPagination;

    // public function turnToPdf($index){
    //     $ipcr = Opcr::query()->where('id', $index)->get(); // Get IPCR Records
    //     $employee_id = Opcr::query()->where('id', $index)->value('employee_id'); // Get Employee ID
    //     $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
    //     Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
    //     $pdf = PDF::loadView('ipcr.Ipcrpdf', ['ipcrs' => $ipcr, 'employees' => $employee]); // Pass data to the blade file
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
        // $ipcrs = Opcr::paginate(5)
        // return view('livewire.ipcrtable');
        return view('livewire.opcrtable', [
            'opcrs' => Opcr::where('employee_id', $loggedInUser->employeeId)->paginate(5),
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
