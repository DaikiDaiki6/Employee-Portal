<?php

namespace App\Livewire\Approverequests\Requestdocument;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\Documentrequest;
use Livewire\WithoutUrlPagination;

class ApproveRequestDocumentTable extends Component
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
        $loggedInUser = auth()->user()->employeeId;
        $departmentName = Employee::where('employee_id', $loggedInUser)->value('department_name');
        return view('livewire.approverequests.requestdocument.approve-request-document-table', [
            'DocumentRequestData' => Documentrequest::where('department_name', $departmentName)->paginate(1),
        ]);
        
    }
    
 
}
