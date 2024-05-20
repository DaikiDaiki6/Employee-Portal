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
use Illuminate\Auth\Access\AuthorizationException;

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
    public $other_documents = [];


    public function mount($index){
        $this->index = $index;
        $documentrequestdata = Documentrequest::findOrFail($index);
        
        $type = 'Approve';
        try {
            $this->authorize('update', [$documentrequestdata,  $type]);
        } catch (AuthorizationException $e) {
            abort(404);
        }

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
        $this->certificate_of_employment = $documentrequestdata->certificate_of_employment;
        $this->certificate_of_employment_with_compensation = $documentrequestdata->certificate_of_employment_with_compensation;
        $this->certificate_of_employment = $documentrequestdata->certificate_of_employment;
        $this->certificate_of_employment_with_compensation = $documentrequestdata->certificate_of_employment_with_compensation;
        $this->service_record = $documentrequestdata->service_record;
        $this->part_time_teaching_services = $documentrequestdata->part_time_teaching_services;
        $this->milc_certification = $documentrequestdata->milc_certification;
        $this->certificate_of_no_pending_administrative_case = $documentrequestdata->certificate_of_no_pending_administrative_case;
        $this->other_documents = $documentrequestdata->other_documents ?? [];

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

    // public function getOtherDocuments(){
    //     return Storage::disk('local')->get($this->other_documents);
    // }

    public function getArrayImage($item, $index){
        return Storage::disk('local')->get($this->$item[$index]);
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function removeArrayImage($index, $request, $insideIndex = null){
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index][$insideIndex]);
        }
        else{
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
        }
    }

    public function submit(){
        // $this->validate();

        $loggedInUser = auth()->user();

        $documentrequestdata = Documentrequest::findOrFail($this->index);

        $Names = Employee::select('first_name', 'middle_name', 'last_name')
            ->where('employee_id', $loggedInUser->employee_id)
            ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;

        $targetUser = User::where('employee_id', $documentrequestdata->employee_id)->first();

        $properties = [
            'signature_requesting_party' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'certificate_of_employment' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'certificate_of_employment_with_compensation' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'service_record' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'part_time_teaching_services' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'milc_certification' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
            'certificate_of_no_pending_administrative_case' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
        ];
        
        foreach ($properties as $propertyName => $validationRule) {
            if (is_string($this->$propertyName)) {
                $documentrequestdata->$propertyName = $this->$propertyName;
            } else {
                $this->validate([$propertyName => $validationRule]);
                if($this->$propertyName){
                $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Request Document', 'Signed', $documentrequestdata->id, $signedIn, $documentrequestdata->$propertyName != null ? 1 : 0));
                }
                $documentrequestdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/documentrequest/' . $propertyName, 'local') : '';
            }
        }

        $fileFields = [
            'other_documents' => 'nullable|mimes:jpg,png,pdf|extensions:jpg,png',
        ];

        foreach ($fileFields as $field => $validationRule) {
            $fileNames = [];            
            $ctrField = count($this->$field) - 1 ;
            $ctr = 0;
            foreach($this->$field as $index => $item){
                $ctr += 1;
                if(is_string($item)){
                    $fileNames[] = $item;  
                }
                else if(is_array($item)){
                    foreach($item as $file){
                        if(is_string($item)){
                            $fileNames[] = $file;
                        }
                        else{ 
                            $this->validate([$field. '.*.*' => $validationRule]);
                            $itemName = $file->store("photos/studypermit/$field", 'local');
                            $fileNames[] = $itemName;
                            if($documentrequestdata->$field != null && $ctr <= $ctrField){
                                Storage::delete($documentrequestdata->$field[$index]);
                            }
                        }
                    }
                }
                else{
                    if (!is_array($item) && !is_string($item)) {
                        $this->addError('cover_memo.' . $index, 'The' . $field . 'must be a string or an array.');
                    }
                }
            }
            $documentrequestdata->$field = $fileNames;
        }
        
        $flag = False;
        foreach($documentrequestdata->requests as $request){
            $requestName = str_replace(' ', '_', $request);
            $requestName = strtolower($requestName);
            if($request == "Others"){
                $requestName = 'other_documents';
            }
            
            if(is_null($documentrequestdata->$requestName) || $documentrequestdata->$requestName == ""){
                $flag = True; 
            }
        }
        if($flag == False){
            $documentrequestdata->status = "Approved";
        } else {
            $documentrequestdata->status = "Pending";
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
