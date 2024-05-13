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


        $this->emp_image= $employee->emp_image ;
        // dd($this->emp_photo
        $this->emp_diploma = json_decode($employee->emp_diploma) ?? [];
        $this->emp_TOR = json_decode($employee->emp_TOR) ?? [];
        $this->emp_cert_of_trainings_seminars = json_decode($employee->emp_cert_of_trainings_seminars) ?? [];
        $this->emp_auth_copy_of_csc_or_prc = json_decode($employee->emp_auth_copy_of_csc_or_prc) ?? [];
        $this->emp_auth_copy_of_prc_board_rating = json_decode($employee->emp_auth_copy_of_prc_board_rating) ?? [];
        $this->emp_med_certif = json_decode($employee->emp_med_certif) ?? [];
        $this->emp_nbi_clearance = json_decode($employee->emp_nbi_clearance) ?? [];
        $this->emp_psa_birth_certif = json_decode($employee->emp_psa_birth_certif) ?? [];
        $this->emp_psa_marriage_certif = json_decode($employee->emp_psa_marriage_certif) ?? [];
        $this->emp_service_record_from_other_govt_agency = json_decode($employee->emp_service_record_from_other_govt_agency) ?? [];
        $this->emp_approved_clearance_prev_employer = json_decode($employee->emp_approved_clearance_prev_employer) ?? [];
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

    public function getImage($item){
        return Storage::disk('public')->get($this->$item);
    }

    public function removeImage($item){
        $this->$item = null;
    }
    
    public function getArrayImage($item, $index){
        return Storage::disk('local')->get($this->$item[$index]);
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

        $employee->emp_photo = $this->emp_photo;
        
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
            if(count($fileNames) > 0){
                $employee->$field = $fileNames;            
            }
        }
        
        foreach($this->employeeHistory as $history){
            $jsonEmployeeHistory[] = [
                'name_of_company' => $history->name_of_company,
                'prev_position' => $history->prev_position,
                'start_date' => $history->start_date,
                'end_date' => $history->end_date,
            ];
        }

        $jsonEmployeeHistory = json_encode($jsonEmployeeHistory);

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
