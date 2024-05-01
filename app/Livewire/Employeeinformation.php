<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use App\Models\Employeeinformation as empInformation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Employeeinformation extends Component
{

    public $employeeRecord;
    public $employeeHistory;
    public $employeeImage;
    
    public function mount(){
        $employee_id = auth()->user()->employeeId;
        $employee = Employee::where('employee_id', $employee_id)->first(); // Replace $employeeId with the actual employee ID
        $this->employeeImage = $employee->emp_image;
        $this->employeeRecord = Employee::where('employee_id', $employee_id)->first();
        if($this->employeeRecord->employee_history != null){
            $this->employeeHistory = json_decode($this->employeeRecord->employee_history);
        }
    }

    public function privateStorage(Media $media){
        return $media;
    }

    public function download($file){
        $employee_id = auth()->user()->employeeId;
        $employee = Employee::where('employee_id', $employee_id)->first(); // Replace $employeeId with the actual employee ID
        if($file == "photo"){
            $mediaItems = $employee->getFirstMedia('avatar');
            return $mediaItems;
        }
        else if ($file == "diploma"){
            return Storage::disk('local')->download($employee->emp_diploma);
        }
        else if ($file == "tor"){
            return Storage::disk('local')->download($employee->emp_TOR);
        }
        else if ($file == "certificate"){
            return Storage::disk('local')->download($employee->emp_cert_of_trainings_seminars);
        }
        else if ($file == "csc_eligibility"){
            return Storage::disk('local')->download($employee->emp_auth_copy_of_csc_or_prc);
        }
        else if ($file == "prc_boardrating"){
            return Storage::disk('local')->download($employee->emp_auth_copy_of_prc_board_rating);
        }
        else if ($file == "med_cert"){
            return Storage::disk('local')->download($employee->emp_med_certif);
        }
        else if ($file == "nbi_clerance"){
            return Storage::disk('local')->download($employee->emp_nbi_clearance);
        }
        else if ($file == "psa_birthcertificate"){
            return Storage::disk('local')->download($employee->emp_psa_birth_certif);
        }
        else if ($file == "psa_marriagecertificate"){
            return Storage::disk('local')->download($employee->emp_psa_marriage_certif);
        }
        else if ($file == "service_record"){
            return Storage::disk('local')->download($employee->emp_service_record_from_other_govt_agency);
        }
        else if ($file == "approved_clearance"){
            return Storage::disk('local')->download($employee->emp_approved_clearance_prev_employer);
        }
        else{
            abort(404);
        }
    }
    
    public function render()
    {
        
        // dd($this->records);
        return view('livewire.employeeinformation');
    }
}
