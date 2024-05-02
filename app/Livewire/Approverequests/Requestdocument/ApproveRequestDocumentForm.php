<?php

namespace App\Livewire\Approverequests\Requestdocument;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\Documentrequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;

class ApproveRequestDocumentForm extends Component
{
    use WithFileUploads;

    public $index;
    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $current_position;
    public $employee_type;

    public $ref_number;
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

    public $certificate_of_employment;
    public $certificate_of_employment_with_compensation;
    public $service_record;
    public $part_time_teaching_services;
    public $milc_certification;
    public $certificate_of_no_pending_administrative_case;
    public $others;


    public function mount($index){
        $this->index = $index;
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                                    ->where('employee_id', $loggedInUser->employeeId)
                                    ->get();   
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->employee_type = $this->employeeRecord[0]->employee_type;

        $documentrequestdata = Documentrequest::findOrFail($index);

        $this->date_of_filling = $documentrequestdata->date_of_filling;
        $this->ref_number = $documentrequestdata->ref_number;
        $this->status = $documentrequestdata->status;
        $this->requests = $documentrequestdata->requests;
        $this->milc_description = $documentrequestdata->milc_description;
        $this->other_request = $documentrequestdata->other_request;
        $this->purpose = $documentrequestdata->purpose;
        $this->signature_requesting_party = $documentrequestdata->signature_requesting_party;
        $this->certificate_of_employment = $documentrequestdata->certificate_of_employment;
        $this->certificate_of_employment_with_compensation = $documentrequestdata->certificate_of_employment_with_compensation;
        $this->certificate_of_employment = $documentrequestdata->certificate_of_employment;
        $this->certificate_of_employment_with_compensation = $documentrequestdata->certificate_of_employment_with_compensation;
        $this->service_record = $documentrequestdata->service_record;
        $this->part_time_teaching_services = $documentrequestdata->part_time_teaching_services;
        $this->milc_certification = $documentrequestdata->milc_certification;
        $this->certificate_of_no_pending_administrative_case = $documentrequestdata->certificate_of_no_pending_administrative_case;
        $this->others = $documentrequestdata->others;

    }

    public function getApplicantSignature(){
        return Storage::disk('local')->get($this->signature_requesting_party);
    }
    
    public function getCertificateOfEmployment(){
        return Storage::disk('local')->get($this->certificate_of_employment);
    }

    public function getCertificateOfEmploymentWithCompensation(){
        return Storage::disk('local')->get($this->certificate_of_employment_with_compensation);
    }

    public function getServiceRecord(){
        return Storage::disk('local')->get($this->service_record);
    }

    public function getPartTimeTeachingServices(){
        return Storage::disk('local')->get($this->part_time_teaching_services);
    }

    public function getMilcCertification(){
        return Storage::disk('local')->get($this->milc_certification);
    }

    public function getCertificateNoPending(){
        return Storage::disk('local')->get($this->certificate_of_no_pending_administrative_case);
    }

    public function getOtherDocuments(){
        return Storage::disk('local')->get($this->others);
    }

    public function submit(){
        // $this->validate();

        $loggedInUser = auth()->user();

        $documentrequestdata = Documentrequest::findOrFail($this->index);

        $employee_record = Employee::select('employee_type', )
                                    ->where('employee_id', $loggedInUser->employeeId)
                                    ->get();   
      

        $documentrequestdata->employee_id = $loggedInUser->employeeId;
        $documentrequestdata->date_of_filling = $this->date_of_filling;
        $documentrequestdata->ref_number = $this->ref_number;
        $documentrequestdata->employment_status = $employee_record[0]->employee_type;
        $documentrequestdata->status = 'Pending';
        $documentrequestdata->requests = $this->requests;
        $documentrequestdata->milc_description = $this->milc_description;
        $documentrequestdata->other_request = $this->other_request;
        $documentrequestdata->purpose = $this->purpose;

        $Names = Employee::select('first_name', 'middle_name', 'last_name')
        ->where('employee_id', $loggedInUser->employeeId)
        ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;

        $targetUser = User::where('employeeId', $documentrequestdata->employee_id)->first();

        $properties = [
            'signature_requesting_party' => 'mimes:jpg,png|extensions:jpg,png',
            'certificate_of_employment' => 'nullable|file',
            'certificate_of_employment_with_compensation' => 'nullable|file',
            'service_record' => 'nullable|file',
            'part_time_teaching_services' => 'nullable|file',
            'milc_certification' => 'nullable|file',
            'certificate_of_no_pending_administrative_case' => 'nullable|file',
            'others' => 'nullable|file',
        ];
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                $documentrequestdata->$propertyName = $this->$propertyName;
            } else {
                // If it's an uploaded file, store it and apply validation rules
                if($this->$propertyName){
                $targetUser->notify(new SignedNotifcation($loggedInUser->employeeId, 'RequestDocument', 'Signed', $documentrequestdata->id, $signedIn));
                }
                $documentrequestdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/documentrequest/' . $propertyName, 'local') : '';
                $this->validate([$propertyName => $validationRule]);
            }
        }

       

        $this->js("alert('Document Request has been submitted!')"); 
 
        $documentrequestdata->update();

        return redirect()->to(route('ApproveRequestDocumentTable'));

    }
    
    public function render()
    {
        return view('livewire.approverequests.requestdocument.approve-request-document-form')->extends('layouts.app');
    }
}
