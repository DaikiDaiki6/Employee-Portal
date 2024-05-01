<?php

namespace App\Livewire\Changeinformation;

use App\Models\ChangeInformation as ModelsChangeInformation;
use Livewire\Component;
use App\Models\Employee;
use Livewire\Features\SupportFileUploads\WithFileUploads;

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
    public $emp_diploma ;
    public $emp_TOR;
    public $emp_cert_of_trainings_seminars = [];
    public $emp_auth_copy_of_csc_or_prc ;
    public $emp_auth_copy_of_prc_board_rating ;
    public $emp_med_certif;
    public $emp_nbi_clearance ;
    public $emp_psa_birth_certif;
    public $emp_psa_marriage_certif;
    public $emp_service_record_from_other_govt_agency = [];
    public $emp_approved_clearance_prev_employer;
    public $other_documents = [];

    public function mount(){
        $employee_id = auth()->user()->employeeId;
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


        $this->emp_photo = $employee->getFirstMedia('avatar') ? 1 : null;
        $this->emp_diploma = $employee->getFirstMedia('diploma') ? 1 : null;
        $this->emp_TOR = $employee->getFirstMedia('tor') ? 1 : null;
        $this->emp_cert_of_trainings_seminars = $employee->getFirstMedia('certificate/seminar') ? 1 : null;
        $this->emp_auth_copy_of_csc_or_prc = $employee->getFirstMedia('csc_eligibility') ? 1 : null;
        $this->emp_auth_copy_of_prc_board_rating = $employee->getFirstMedia('prc_boardrating') ? 1 : null;
        $this->emp_med_certif = $employee->getFirstMedia('medical_certificate') ? 1 : null;
        $this->emp_nbi_clearance = $employee->getFirstMedia('nbi_clearance') ? 1 : null;
        $this->emp_psa_birth_certif = $employee->getFirstMedia('psa_birthcertificate') ? 1 : null;
        $this->emp_psa_marriage_certif = $employee->getFirstMedia('psa_marriagecertificate') ? 1 : null;
        $this->emp_service_record_from_other_govt_agency = $employee->getFirstMedia('service_record') ? 1 : null;
        $this->emp_approved_clearance_prev_employer = $employee->getFirstMedia('approved_clearance') ? 1 : null;
        if($employee->employee_history != null){
            $this->employeeHistory = json_decode($employee->employee_history);
        }
    }

    public function submit(){

        // $this->validate()
        // dump($this->emp_diploma);
        // foreach($this->emp_diploma as $diploma){
        //     dump($diploma);
        // }


        $employee = new ModelsChangeInformation();
        $employee->employee_id = auth()->user()->employeeId;
        $employee->first_name = $this->first_name;
        $employee->middle_name = $this->middle_name;
        $employee->last_name = $this->last_name;
        $employee->age = $this->age;
        $employee->gender = $this->gender;
        $employee->personal_email = $this->personal_email;
        $employee->phone = $this->phone;
        $employee->birth_date = $this->birth_date;
        $employee->address = $this->address;
        
        if ($this->emp_photo !== 1) {
            $employee->addMedia($this->emp_photo)
                ->preservingOriginal()
                ->toMediaCollection('avatar');
        }
        
        if ($this->emp_diploma !== 1) {
            $employee->addFromMediaLibraryRequest($this->emp_diploma)
                ->preservingOriginal()
                ->toMediaCollection('diploma');
        }
        
        if ($this->emp_TOR !== 1) {
            $employee->addMedia($this->emp_TOR)
                ->preservingOriginal()
                ->toMediaCollection('tor');
        }
        
        if (is_array($this->emp_cert_of_trainings_seminars)) {
            foreach ($this->emp_cert_of_trainings_seminars as $certif) {
                if ($certif !== 1) {
                    $employee->addMedia($certif)
                        ->preservingOriginal()
                        ->toMediaCollection('certificate/seminar');
                }
            }
        }
        
        if ($this->emp_auth_copy_of_csc_or_prc !== 1) {
            $employee->addMedia($this->emp_auth_copy_of_csc_or_prc)
                ->preservingOriginal()
                ->toMediaCollection('csc_eligibility');
        }
        
        if ($this->emp_auth_copy_of_prc_board_rating !== 1) {
            $employee->addMedia($this->emp_auth_copy_of_prc_board_rating)
                ->preservingOriginal()
                ->toMediaCollection('prc_boardrating');
        }
        
        if ($this->emp_med_certif !== 1) {
            $employee->addMedia($this->emp_med_certif)
                ->preservingOriginal()
                ->toMediaCollection('medical_certificate');
        }
        
        if ($this->emp_nbi_clearance !== 1) {
            $employee->addMedia($this->emp_nbi_clearance)
                ->preservingOriginal()
                ->toMediaCollection('nbi_clearance');
        }
        
        if ($this->emp_psa_birth_certif !== 1) {
            $employee->addMedia($this->emp_psa_birth_certif)
                ->preservingOriginal()
                ->toMediaCollection('psa_birthcertificate');
        }
        
        if ($this->emp_psa_marriage_certif !== 1) {
            $employee->addMedia($this->emp_psa_marriage_certif)
                ->preservingOriginal()
                ->toMediaCollection('psa_marriagecertificate');
        }
        
        if (is_array($this->emp_service_record_from_other_govt_agency)) {
            foreach ($this->emp_service_record_from_other_govt_agency as $value) {
                if ($value !== 1) {
                    $employee->addMedia($value)
                        ->preservingOriginal()
                        ->toMediaCollection('service_record');
                }
            }
        }
        
        if ($this->emp_approved_clearance_prev_employer !== 1) {
            $employee->addMedia($this->emp_approved_clearance_prev_employer)
                ->preservingOriginal()
                ->toMediaCollection('approved_clearance');
        }
        
        if (is_array($this->other_documents)) {
            foreach ($this->other_documents as $value) {
                if ($value !== 1) {
                    $employee->addMedia($value)
                        ->preservingOriginal()
                        ->toMediaCollection('other_documents');
                }
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
