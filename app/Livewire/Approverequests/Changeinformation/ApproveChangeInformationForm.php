<?php

namespace App\Livewire\Approverequests\Changeinformation;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\ChangeInformation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveChangeInformationForm extends Component
{
    use WithFileUploads;

    public $employee_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $age;
    public $gender;
    public $personal_email;
    public $phone;
    public $birth_date;
    public $address;
    public $employee_history;
    public $employeeHistory;
    
    public $emp_image;
    public $emp_diploma = [];
    public $emp_TOR = [];
    public $emp_cert_of_trainings_seminars = [];
    public $emp_auth_copy_of_csc_or_prc = [];
    public $emp_auth_copy_of_prc_board_rating  = [];
    public $emp_med_certif = [];
    public $emp_nbi_clearance = [];
    public $emp_psa_birth_certif = [];
    public $emp_psa_marriage_certif = [];
    public $emp_service_record_from_other_govt_agency = [];
    public $emp_approved_clearance_prev_employer = [];
    public $other_documents = [];

    public $index;

    public function mount($index){
        // $employee_id = auth()->user()->employee_id;
        // $this->index = $index;
        try {
            $this->index = $index;
            $employee = ChangeInformation::findOrFail($index);
            $this->authorize('update', [$employee, 'Approve']);
        } catch (AuthorizationException $e) {
            abort(404);
        }

        // Employee Information
        $this->first_name = $employee->first_name;
        $this->middle_name = $employee->middle_name;
        $this->last_name = $employee->last_name;
        $this->age = number_format($employee->age, 0);
        $this->gender = $employee->gender;
        $this->personal_email = $employee->personal_email;
        $this->phone = $employee->phone;
        $this->birth_date = $employee->birth_date;
        $this->address = $employee->address;


        $this->emp_image= $employee->emp_image ;

        $this->emp_diploma = $employee->emp_diploma ?? [];
        $this->emp_TOR = $employee->emp_TOR ?? [];
        $this->emp_cert_of_trainings_seminars = $employee->emp_cert_of_trainings_seminars ?? [];
        $this->emp_auth_copy_of_csc_or_prc = $employee->emp_auth_copy_of_csc_or_prc ?? [];
        $this->emp_auth_copy_of_prc_board_rating = $employee->emp_auth_copy_of_prc_board_rating ?? [];
        $this->emp_med_certif = $employee->emp_med_certif ?? [];
        $this->emp_nbi_clearance = $employee->emp_nbi_clearance ?? [];
        $this->emp_psa_birth_certif = $employee->emp_psa_birth_certif ?? [];
        $this->emp_psa_marriage_certif = $employee->emp_psa_marriage_certif ?? [];
        $this->emp_service_record_from_other_govt_agency = $employee->emp_service_record_from_other_govt_agency ?? [];
        $this->emp_approved_clearance_prev_employer = $employee->emp_approved_clearance_prev_employer ?? [];
        $this->other_documents = $employee->other_documents ?? [];
        if($employee->employee_history != null){
            $this->employeeHistory = json_decode($employee->employee_history, true);
        }
        // dd($this->employeeHistory);
    }

    public function removeArrayImage($index, $request, $insideIndex = null){
        // dump($this->cover_memo);
            // dump($this->$requestName, $index, $insideIndex);

        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index][$insideIndex]);
            // dump($this->$requestName);
            $this->$requestName[$index] = array_values($this->$requestName[$index]);
            // dd($this->$requestName, $index, $insideIndex);
        }
        else{
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
        }
        // dump($this->cover_memo);
    }

    public function getImage($item){
        return Storage::disk('public')->get($this->$item);
    }

    public function removeImage($item){
        $this->$item = null;
    }
    
    public function getArrayImage($item, $index){
        return Storage::disk('local')->get($this->$item[$index]);
    }

    // protected $rules = [
    //     'phone' => 'required|numeric',
    //     'age' => 'required|numeric|min:1|max:120',
    //     'gender' => 'required|in:Male,Female,M,F',
    //     'birth_date' => 'required|date',
    //     'personal_email' => 'required|email:rfc,dns',
    //     'address' => 'required|min:10|max:500',
    //     'employeeHistory' => 'required|array|min:1|max:5',
    //     'employeeHistory.*.name_of_company' => 'required|string|min:2|max:75',
    //     'employeeHistory.*.prev_position' => 'required|string|min:2|max:75',
    //     'employeeHistory.*.start_date' => 'required|date|before_or_equal:employeeHistory.*.end_date',
    //     'employeeHistory.*.end_date' => 'required|date|after_or_equal:employeeHistory.*.start_date',

    //     'emp_diploma' => 'nullable|array|min:1|max:3',
    //     'emp_diploma.*' => 'required',
    //     'emp_diploma.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_TOR' => 'nullable|array|min:1|max:3',
    //     'emp_TOR.*' => 'required',
    //     'emp_TOR.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_cert_of_trainings_seminars' => 'nullable|array|min:1|max:3',
    //     'emp_cert_of_trainings_seminars.*' => 'required',
    //     'emp_cert_of_trainings_seminars.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_auth_copy_of_csc_or_prc' => 'nullable|array|min:1|max:3',
    //     'emp_auth_copy_of_csc_or_prc.*' => 'required',
    //     'emp_auth_copy_of_csc_or_prc.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_auth_copy_of_prc_board_rating' => 'nullable|array|min:1|max:3',
    //     'emp_auth_copy_of_prc_board_rating.*' => 'required',
    //     'emp_auth_copy_of_prc_board_rating.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_med_certif' => 'nullable|array|min:1|max:3',
    //     'emp_med_certif.*' => 'required',
    //     'emp_med_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_nbi_clearance' => 'nullable|array|min:1|max:3',
    //     'emp_nbi_clearance.*' => 'required',
    //     'emp_nbi_clearance.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_psa_birth_certif' => 'nullable|array|min:1|max:3',
    //     'emp_psa_birth_certif.*' => 'required',
    //     'emp_psa_birth_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_psa_marriage_certif' => 'nullable|array|min:1|max:3',
    //     'emp_psa_marriage_certif.*' => 'required',
    //     'emp_psa_marriage_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_service_record_from_other_govt_agency' => 'nullable|array|min:1|max:3',
    //     'emp_service_record_from_other_govt_agency.*' => 'required',
    //     'emp_service_record_from_other_govt_agency.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'emp_approved_clearance_prev_employer' => 'nullable|array|min:1|max:3',
    //     'emp_approved_clearance_prev_employer.*' => 'required',
    //     'emp_approved_clearance_prev_employer.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    //     'other_documents' => 'nullable|array|min:1|max:3',
    //     'other_documents.*' => 'required',
    //     'other_documents.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
    // ];

    // protected $validationAttributes = [
    //     'employeeHistory' => 'Employee History',
    //     'employeeHistory.*.name_of_company' => 'Name of Company/Organization',
    //     'employeeHistory.*.prev_position' => 'Position',
    //     'employeeHistory.*.end_date' => 'Finished Date',
    //     'employeeHistory.*.start_date' => 'Start Date',
    //     'emp_image' => 'Employee Image',
    //     'emp_diploma' => 'Employee Diploma',
    //     'emp_TOR' => 'Employee TOR',
    //     'emp_cert_of_trainings_seminars' => 'Employee Certificate of Trainings Seminars',
    //     'emp_auth_copy_of_csc_or_prc' => 'Employee Auth Copy of CSC or PRC',
    //     'emp_auth_copy_of_prc_board_rating' => 'Employee Auth Copy of PRC Board Rating',
    //     'emp_med_certif' => 'Employee Medical Certificate',
    //     'emp_nbi_clearance' => 'Employee NBI Clearance',
    //     'emp_psa_birth_certif' => 'Employee PSA Birth Certificate',
    //     'emp_psa_marriage_certif' => 'Employee PSA Marriage Certificate',
    //     'emp_service_record_from_other_govt_agency' => 'Employee Service Record from Other Govt Agency',
    //     'emp_approved_clearance_prev_employer' => 'Employee Approved Clearance from Previous Employer',
    //     'other_documents' => 'Other Documents'
    // ];

    public function submit(){
        $changeInformationStatus = ChangeInformation::findOrFail($this->index);
        $changeInformationStatus->status = "Approved";

        $employee = Employee::where('employee_id', $changeInformationStatus->employee_id)->first();
        $employee->first_name = $this->first_name;
        $employee->middle_name = $this->middle_name;
        $employee->last_name = $this->last_name;
        $employee->age = $this->age;
        $employee->gender = $this->gender;
        $employee->personal_email = $this->personal_email;
        $employee->phone = $this->phone;
        $employee->birth_date = $this->birth_date;
        $employee->address = $this->address;

        if(is_string($this->emp_image) == True){
            // $this->validate(['emp_image' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120']);
            $employee->emp_image = $this->emp_image;
        }
        

        $fileFields = [
            'emp_diploma',
            'emp_TOR',
            'emp_cert_of_trainings_seminars',
            'emp_auth_copy_of_csc_or_prc',
            'emp_auth_copy_of_prc_board_rating',
            'emp_med_certif',
            'emp_nbi_clearance',
            'emp_psa_birth_certif',
            'emp_psa_marriage_certif',
            'emp_service_record_from_other_govt_agency',
            'emp_approved_clearance_prev_employer',
            'other_documents'
        ];
        
        
        foreach ($fileFields as $field) {
            $fileNames = [];            
            $ctrField = count($this->$field) - 1 ;
            $ctr = 0;
            foreach($this->$field as $index => $item){
                $ctr += 1;
                if(is_null($item)){
                }
                else if(is_string($item)){
                    $fileNames[] = $item;
                }
                else{
                    $this->resetValidation();
                    if (!is_array($item) && !is_string($item)) {
                        $this->addError($field . '.' . $index, 'The' . $field . 'must be a string or an array.');
                    }
                }
            }
            if(count($fileNames) > 0){
                $employee->$field = $fileNames;        
            }
        }
       
        
        foreach($this->employeeHistory as $history){
            $jsonEmployeeHistory[] = [
                'name_of_company' => $history['name_of_company'],
                'prev_position' => $history['prev_position'],
                'start_date' => $history['start_date'],
                'end_date' => $history['end_date'],
            ];
        }

        $jsonEmployeeHistory = json_encode($jsonEmployeeHistory);

        $employee->employee_history = $jsonEmployeeHistory;        
        
        $this->js("alert('Change Information Submitted!')"); 
        
        $employee->update();
        $changeInformationStatus->update(); 
        
        return redirect()->to(route('profile'));
    }
    
    public function render()
    {
        return view('livewire.approverequests.changeinformation.approve-change-information-form')->extends('layouts.app');
    }
}
