<?php

namespace App\Livewire\Teachpermit;

use Livewire\Component;
use App\Models\Teachpermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class TeachPermitTable extends Component
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
        return view('livewire.teachpermit.teach-permit-table', [
            'TeachPermitData' => Teachpermit::where('employee_id', $loggedInUser->employee_id)->paginate(10),
        ]);

    }

    public function removeTeachPermit($id){
        $teachpermitToBeDeleted = Teachpermit::findOrFail($id);
        $teachpermitToBeDeleted->delete();
        return redirect()->route('TeachPermitTable');
    }

    
}
