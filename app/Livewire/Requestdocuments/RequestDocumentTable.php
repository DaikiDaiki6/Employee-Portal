<?php

namespace App\Livewire\Requestdocuments;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Documentrequest;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class RequestDocumentTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $filter;

    public $filterName;

    public $search = "";
    
    
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
            $documentRequestData = Documentrequest::orderBy('date_of_filling', 'desc')->paginate(10);
        } else{
            $query = Documentrequest::where('employee_id', $loggedInUser->employee_id);
            switch ($this->filter) {
                case '1':
                    $query->whereDate('date_of_filling',  Carbon::today());
                    $this->filterName = "Today";
                    break;
                case '2':
                    $query->whereBetween('date_of_filling', [Carbon::today()->startOfWeek(), Carbon::today()]);
                    $this->filterName = "Last 7 Days";
                    break;
                case '3':
                    $query->whereBetween('date_of_filling', [Carbon::today()->subDays(30), Carbon::today()]);
                    // $query->whereDate('date_of_filling', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                    $this->filterName = "Last 30 days";
                    break;
                case '4':
                    $query->whereBetween('date_of_filling', [Carbon::today()->subMonths(6), Carbon::today()]);
                    $this->filterName = "Last 6 Months";
                    break;
                case '5':
                    $query->whereBetween('date_of_filling', [Carbon::today()->subYear(), Carbon::today()]);
                    $this->filterName = "Last Year";
                    break;
            }
    
    
            if(strlen($this->search) >= 1){
                $results = $query->where('date_of_filling', 'like', '%' . $this->search . '%')->orderBy('date_of_filling', 'desc')->paginate(5);
            } else {
                $results = $query->orderBy('date_of_filling', 'desc')->paginate(5);
            }
        }
        
        return view('livewire.requestdocuments.request-document-table', [
            'DocumentRequestData' => $results,
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
