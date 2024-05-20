<?php

namespace App\Livewire\Studypermit;

use Livewire\Component;
use App\Models\Studypermit;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class StudyPermitTable extends Component
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
        return view('livewire.studypermit.study-permit-table', [
            'StudyPermitData' => Studypermit::where('employee_id', $loggedInUser->employee_id)->orderBy('created_at', 'desc')->paginate(10),
        ]);

    }

    public function removeStudyPermit($id){
        $studyPermitToBeDeleted = Studypermit::findOrFail($id);
        $studyPermitToBeDeleted->delete();
        return redirect()->route('StudyPermitTable');
    }
    
}
