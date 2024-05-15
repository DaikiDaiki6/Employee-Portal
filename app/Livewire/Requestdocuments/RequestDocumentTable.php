<?php

namespace App\Livewire\Requestdocuments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Documentrequest;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class RequestDocumentTable extends Component
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

        if ($loggedInUser->is_admin) {
            $documentRequestData = Documentrequest::paginate(10);
        } else {
            $documentRequestData = Documentrequest::where('employee_id', $loggedInUser->employee_id)->paginate(10);
        }
        
        return view('livewire.requestdocuments.request-document-table', [
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
         }else{
            return abort(404);
         }
    }

    public function getStatusOfDocument($index, $request){
        $documentRequest = Documentrequest::findOrFail($index);
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        $employee_id = auth()->user()->employee_id;
        if($documentRequest->$requestName && $employee_id == $documentRequest->employee_id){
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
