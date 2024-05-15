<?php

namespace App\Livewire\Requestdocuments;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\Documentrequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class RequestDocumentUpdate extends Component
{

    use WithFileUploads;
   
    public $ref_number;

    public $index;
    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $current_position;
    public $employee_type;

   

    private $private_ref_number;
    public $employment_status;
    public $status;
    public $date_of_filling;
    public $requests = [];
    public $milc_description;
    public $position;
    public $other_request;
    public $purpose;
    public $signature_requesting_party;

    public function mount($index){
        $documentrequestdata = Documentrequest::findOrFail($index);
        try {
            $this->authorize('update', $documentrequestdata);
        } catch (AuthorizationException $e) {
            abort(404);
        }
        
        $this->index = $index;
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->employee_type = $this->employeeRecord[0]->employee_type;


        $this->date_of_filling = $documentrequestdata->date_of_filling;
        $this->ref_number = $documentrequestdata->ref_number;
        $this->status = $documentrequestdata->status;
        $this->requests = $documentrequestdata->requests;
        $this->milc_description = $documentrequestdata->milc_description;
        $this->other_request = $documentrequestdata->other_request;
        $this->purpose = $documentrequestdata->purpose;
        $this->signature_requesting_party = $documentrequestdata->signature_requesting_party;
    }

    public function getApplicantSignature(){
        return Storage::disk('local')->get($this->signature_requesting_party);
    }

    protected $rules = [
        'requests' => 'required|array|min:1',
        'requests.*' => 'in:Certificate of Employment,Certificate of Employment with Compensation,Service Record,Part time Teaching Services,MILC Certification,Certificate of No Pending Administrative Case,Others',
        'purpose' => 'required|min:2|max:1000', 
        // 'signature_requesting_party' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120 '
    ];

    public function submit(){
        $properties = [
            'milc_description' => 'MILC Certification',
            'other_request' => 'Others',
        ];

        foreach($properties as $property => $value){
            if(in_array($value, $this->requests ?? [])){
                $this->validate([$property => 'required']);
            }
        }

        $this->validate();

        $loggedInUser = auth()->user();

        $documentrequestdata = Documentrequest::findOrFail($this->index);

        $employee_record = Employee::select('employee_type', )
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   

        if(is_string($this->signature_requesting_party)){
            $documentrequestdata->signature_requesting_party = $this->signature_requesting_party;
        } else{
            $documentrequestdata->signature_requesting_party =  $this->signature_requesting_party->store('photos/documentrequest/applicant_signature', 'local');
            $this->validate(['signature_requesting_party' => 'mimes:jpg,png|extensions:jpg,png']);
        }

        $documentrequestdata->employee_id = $loggedInUser->employee_id;
        $documentrequestdata->date_of_filling = $this->date_of_filling;
        $documentrequestdata->ref_number = $this->ref_number;
        $documentrequestdata->employment_status = $employee_record[0]->employee_type;
        $documentrequestdata->status = 'Pending';
        $documentrequestdata->requests = $this->requests;
        $documentrequestdata->milc_description = $this->milc_description;
        $documentrequestdata->other_request = $this->other_request;
        $documentrequestdata->purpose = $this->purpose;

       

       

        $this->js("alert('Document Request has been submitted!')"); 
 
        $documentrequestdata->update();

        return redirect()->to(route('RequestDocumentTable'));

    }
    
    public function render()
    {
        return view('livewire.requestdocuments.request-document-update')->extends('layouts.app');
    }
}
