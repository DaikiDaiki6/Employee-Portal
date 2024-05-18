<?php

namespace App\Livewire\Approverequests\Requestdocument;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\Documentrequest;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

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
        $loggedInUser = auth()->user();

        $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        $head = explode(',', $loggedInEmployeeData->is_department_head_or_dean[0] ?? ' ');
        $departmentHeadId = $loggedInEmployeeData->department_id;
        $collgeDeanId = $loggedInEmployeeData->dean_id;

        // Check if condition for department head is true
        if ($head[0] == 1 && $head[1] == 1){
            $documentRequestData = Documentrequest::join('employees', 'employees.employee_id', 'documentrequests.employee_id')
                ->where(function ($query) use ($collgeDeanId, $departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId)
                        ->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('documentrequests.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($head[0] == 1) {
            $documentRequestData= Documentrequest::join('employees', 'employees.employee_id', 'documentrequests.employee_id')
                ->where(function ($query) use ($departmentHeadId) {
                    $query->orWhere('employees.department_id', $departmentHeadId);
                })
                ->select('documentrequests.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }

        // Check if condition for college dean is true
        else if ($head[1] == 1) {
            $documentRequestData = Documentrequest::join('employees', 'employees.employee_id', 'documentrequests.employee_id')
                ->where(function ($query) use ($collgeDeanId) {
                    $query->orWhere('employees.dean_id',  $collgeDeanId);
                })
                ->select('documentrequests.*') // Select only documentrequest columns
                ->distinct() // Ensure unique records
                ->paginate(10);
        }
        else if ($loggedInUser->is_admin == 1) {
            $documentRequestData = Documentrequest::paginate(10);
        } 
        else{
            abort(404);
        }
      
        return view('livewire.approverequests.requestdocument.approve-request-document-table', [
            'DocumentRequestData' => $documentRequestData,
        ]);

    }

    public function downloadDocument($index, $request){
        $documentRequest = Documentrequest::findOrFail($index);
        try {
           $this->authorize('view', $documentRequest);
        } catch (AuthorizationException $e) {
           abort(404);
        }
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        $employee_id = auth()->user()->employee_id;
        if($documentRequest->$requestName != null){
           return Storage::disk('local')->download($documentRequest->$requestName, $request);
        } else{
           return abort(404);
        }
   }

   public function getStatusOfDocument($index, $request){
       $documentRequest = Documentrequest::findOrFail($index);
       $requestName = str_replace(' ', '_', $request);
       $requestName = strtolower($requestName);
       $loggedInUser = auth()->user();
       $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
       $employee_id = auth()->user()->employee_id;
       $head = explode(',', $loggedInEmployeeData->is_department_head_or_dean[0] ?? ' ');
       if($documentRequest->$requestName && ($employee_id == $documentRequest->employee_id || $head[0] == 1 || $head[1] == 1 )){
           return "Approved";
       }
       return "Pending";

   }

   public function editRequestDocument($id){
       return redirect()->route('RequestDocumentEdit', ['index' => $id]);
   }

   public function removeRequestDocument($id){
       $ipcrToBeDeleted = Documentrequest::findOrFail($id);
       $this->authorize('delete', $ipcrToBeDeleted);
       $ipcrToBeDeleted->delete();
       return redirect()->route('RequestDocumentTable');
   }
    
 
}
