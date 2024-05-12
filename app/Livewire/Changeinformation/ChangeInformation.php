<?php

namespace App\Livewire\Changeinformation;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\ChangeInformation as ModelsChangeInformation;

class ChangeInformation extends Component
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
    
    public $emp_photo;
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

    public function mount(){
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::where('employee_id', $employee_id)->first();

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


        // $this->emp_photo = $employee->getFirstMedia('avatar') ? 1 : null;
        // $this->emp_diploma = $employee->getFirstMedia('diploma') ? 1 : null;
        // $this->emp_TOR = $employee->getFirstMedia('tor') ? 1 : null;
        // $this->emp_cert_of_trainings_seminars = $employee->getFirstMedia('certificate/seminar') ? 1 : null;
        // $this->emp_auth_copy_of_csc_or_prc = $employee->getFirstMedia('csc_eligibility') ? 1 : null;
        // $this->emp_auth_copy_of_prc_board_rating = $employee->getFirstMedia('prc_boardrating') ? 1 : null;
        // $this->emp_med_certif = $employee->getFirstMedia('medical_certificate') ? 1 : null;
        // $this->emp_nbi_clearance = $employee->getFirstMedia('nbi_clearance') ? 1 : null;
        // $this->emp_psa_birth_certif = $employee->getFirstMedia('psa_birthcertificate') ? 1 : null;
        // $this->emp_psa_marriage_certif = $employee->getFirstMedia('psa_marriagecertificate') ? 1 : null;
        // $this->emp_service_record_from_other_govt_agency = $employee->getFirstMedia('service_record') ? 1 : null;
        // $this->emp_approved_clearance_prev_employer = $employee->getFirstMedia('approved_clearance') ? 1 : null;
        if($employee->employee_history != null){
            $this->employeeHistory = json_decode($employee->employee_history);
        }
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

    protected $rules = [

    ];

    public function submit(){

        // $this->validate();
     
        $employee = new ModelsChangeInformation();
        $employee->employee_id = auth()->user()->employee_id;
        $employee->first_name = $this->first_name;
        $employee->middle_name = $this->middle_name;
        $employee->last_name = $this->last_name;
        $employee->age = $this->age;
        $employee->gender = $this->gender;
        $employee->personal_email = $this->personal_email;
        $employee->phone = $this->phone;
        $employee->birth_date = $this->birth_date;
        $employee->address = $this->address;
        
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
            'other_documents',
        ];
        
        foreach ($fileFields as $field) {
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
                            $itemName = $file->store("photos/studypermit/$field", 'local');
                            $fileNames[] = $itemName;
                            if($employee->$field != null && $ctr <= $ctrField){
                                Storage::delete($employee->$field[$index]);
                            }
                        }
                    }
                }
            }
            $employee->$field = $fileNames;
        }
        

        
       

        foreach($this->employeeHistory as $history){
            $jsonEmployeeHistory[] = [
                'name_of_company' => $history->name_of_company,
                'prev_position' => $history->prev_position,
                'start_date' => $history->start_date,
                'end_date' => $history->end_date,
            ];
        }

        $jsonEmployeeHistory = json_encode( $jsonEmployeeHistory);

        $employee->employee_history = $jsonEmployeeHistory;

        
        $this->js("alert('Change Information Submitted!')"); 
 
        $employee->save();

        return redirect()->to(route('profile'));


        
    }

    public function render()
    {
        return view('livewire.changeinformation.change-information')->extends('layouts.app');
    }
}
