<?php

namespace App\Livewire\Ipcr;

use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class IpcrTable extends Component
{
    use WithPagination, WithoutUrlPagination;

   
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
            'ipcrs' => Ipcr::where('employee_id', $loggedInUser->employee_id)->paginate(10),
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
