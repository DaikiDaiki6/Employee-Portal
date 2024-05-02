<?php

namespace App\Livewire\Opcr;

use App\Models\Opcr;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class OpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

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
        return view('livewire.opcr.opcr-table', [
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
