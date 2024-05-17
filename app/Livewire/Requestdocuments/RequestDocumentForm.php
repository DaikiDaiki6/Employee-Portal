<?php

namespace App\Livewire\Requestdocuments;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\Documentrequest;
use Livewire\Attributes\Locked;

class RequestDocumentForm extends Component
{

    use WithFileUploads;

    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $current_position;
    public $employee_type;
    
    #[Locked]
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


    public function mount(){
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type', 'employee_id' )
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   
        // $this->authorize('create', $this->employeeRecord[0]->employee_id);
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->employee_type = $this->employeeRecord[0]->employee_type;

        $randomNumber = 0;
        while(True) {
            $randomNumber = $this->generateRefNumber();
            $existingRecord = Documentrequest::where('ref_number', $randomNumber)->first();
            if($randomNumber != $existingRecord){
                break;
            }
        }
        $this->ref_number = $randomNumber;
        $this->private_ref_number = $randomNumber;
        $dateToday = Carbon::now()->toDateString();
        $this->date = $dateToday;
        $this->date_of_filling = $dateToday;
    }

    private function generateRefNumber(){
       // Generate a random number
        $characters = '0123456789';
        $randomNumber = '';
        for ($i = 0; $i < rand(5, 10); $i++) {
            $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Get the current year
        $currentYear = date('Y');

        // Concatenate the date and random number
        $result = $currentYear . '-' . $randomNumber;

        return $result;
    }

    protected $rules = [
        'requests' => 'required|array|min:1',
        'requests.*' => 'in:Certificate of Employment,Certificate of Employment with Compensation,Service Record,Part time Teaching Services,MILC Certification,Certificate of No Pending Administrative Case,Others',
        'purpose' => 'required|min:2|max:1000', 
        'signature_requesting_party' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120'
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

        $documentrequestdata = new Documentrequest();

        $employee_record = Employee::select('employee_type', 'department_name')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   
      

        $documentrequestdata->employee_id = $loggedInUser->employee_id;
        $documentrequestdata->department_name = $employee_record[0]->department_name;
        $documentrequestdata->date_of_filling = $this->date_of_filling;
        $documentrequestdata->ref_number = $this->ref_number;
        $documentrequestdata->employment_status = $employee_record[0]->employee_type;
        $documentrequestdata->status = 'Pending';
        $documentrequestdata->requests = $this->requests;
        $documentrequestdata->milc_description = $this->milc_description;
        $documentrequestdata->other_request = $this->other_request;
        $documentrequestdata->purpose = $this->purpose;
        $documentrequestdata->signature_requesting_party = $this->signature_requesting_party->store('photos/documentrequest/signature_requesting_party', 'local');

        $this->js("alert('Your Document Request has been submitted!')"); 
 
        $documentrequestdata->save();

        return redirect()->to(route('RequestDocumentTable'));

    }
    
    public function render()
    {
        return view('livewire.requestdocuments.request-document-form')->extends('layouts.app');
    }
}
