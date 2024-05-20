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

    public $empDiploma;
    public $emp_tor;
    public $empCertOfTrainingsSeminars;
    public $empAuthCopyOfCscOrPrc;
    public $empAuthCopyOfPrcBoardRating;
    public $empMedCertif;
    public $empNBIClearance;
    public $empPSABirthCertif;
    public $empPSAMarriageCertif;
    public $empServiceRecordFromOtherGovtAgency;
    public $empApprovedClearancePrevEmployer;
    public $otherDocuments;
    
    public function mount(){
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::where('employee_id', $employee_id)->first(); // Replace $employee_id with the actual employee ID
        $this->employeeImage = $employee->emp_image;
        $this->employeeRecord = Employee::where('employee_id', $employee_id)->first();
        $this->empDiploma = $employee->emp_diploma ?? [];
        $this->emp_tor = $employee->emp_tor ?? [];
        $this->empCertOfTrainingsSeminars = $employee->emp_cert_of_trainings_seminars ?? [];
        $this->empAuthCopyOfCscOrPrc = $employee->emp_auth_copy_of_csc_or_prc ?? [];
        $this->empAuthCopyOfPrcBoardRating = $employee->emp_auth_copy_of_prc_board_rating ?? [];
        $this->empMedCertif = $employee->emp_med_certif ?? [];
        $this->empNBIClearance = $employee->emp_nbi_clearance ?? [];
        $this->empPSABirthCertif = $employee->emp_psa_birth_certif ?? [];
        $this->empPSAMarriageCertif = $employee->emp_psa_marriage_certif ?? [];
        $this->empServiceRecordFromOtherGovtAgency = $employee->emp_service_record_from_other_govt_agency ?? [];
        $this->empApprovedClearancePrevEmployer = $employee->emp_approved_clearance_prev_employer ?? [];
        $this->otherDocuments = $employee->other_documents ?? [];
        

        // dd($this->employeeDiploma);
        if($this->employeeRecord->employee_history != null){
            $this->employeeHistory = json_decode($this->employeeRecord->employee_history);
        }
    }

    public function privateStorage(Media $media){
        return $media;
    }

    public function download($file, $index = 0){
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::where('employee_id', $employee_id)->first(); // Replace $employee_id with the actual employee ID
        
        if($file == "photo"){
            return Storage::disk('public')->download($employee->emp_image);
        }
        else if ($file == "diploma"){
            $files = $employee->emp_diploma;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "tor"){
            $files = $employee->emp_TOR;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "certificate"){
            dump($file, $index);
            $files = $employee->emp_cert_of_trainings_seminars;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "csc_eligibility"){
            $files = $employee->emp_auth_copy_of_csc_or_prc;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "prc_boardrating"){
            $files = $employee->emp_auth_copy_of_prc_board_rating;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "med_cert"){
            $files = $employee->emp_med_certif;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "nbi_clearance"){
            $files = $employee->emp_med_certif;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "psa_birthcertificate"){
            $files = $employee->emp_psa_birth_certif;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "psa_marriagecertificate"){
            $files = $employee->emp_psa_marriage_certif;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "service_record"){
            $files = $employee->emp_service_record_from_other_govt_agency;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == "approved_clearance"){
            $files = $employee->emp_approved_clearance_prev_employer;
            return Storage::disk('local')->download($files[$index]);
        }
        else if ($file == 'others'){
            $files = 
$employee->other_documents;
            return Storage::disk('local')->download($files[$index]);
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
