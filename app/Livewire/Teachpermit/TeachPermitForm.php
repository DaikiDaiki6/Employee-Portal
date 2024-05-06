<?php

namespace App\Livewire\Teachpermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithFileUploads;

class TeachPermitForm extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $subjectLoad;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $employee_type;
    public $current_position;
    public $salary;
    
    public $employee_id;
    public $application_date;
    public $start_period_cover;
    public $end_period_cover;
    public $designation_rank;
    public $name_of_school_description;
    public $inside_outside_university;
    public $degree_prog_and_school;
    public $load;
    public $total_load_plm;
    public $total_load_otherunivs;
    public $total_aggregate_load;
    public $applicant_signature;
    public $status;
    public $total_units_enrolled;
    public $available_units;

    public function mount(){
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
        
        $dateToday = Carbon::now()->toDateString();
        $this->date = $dateToday;
        $this->start_period_cover = $dateToday;
        $this->application_date = $dateToday;
        $this->subjectLoad = [
            ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => '']
        ];
        
    }

    public function addSubjectLoad(){
        $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
    }

    public function submit(){

        $loggedInUser = auth()->user();

        $teachpermitdata = new Teachpermit();

        $departmentName = Employee::where('employee_id', $loggedInUser->employee_id)->value('department_name');

        $teachpermitdata->employee_id = $loggedInUser->employee_id;
        $teachpermitdata->application_date = $this->application_date;
        $teachpermitdata->department_name = $departmentName;
        $teachpermitdata->start_period_cover = $this->start_period_cover;
        $teachpermitdata->end_period_cover = $this->end_period_cover;
        $teachpermitdata->designation_rank = $this->designation_rank;
        $teachpermitdata->name_of_school_description = $this->name_of_school_description;
        $teachpermitdata->inside_outside_university = $this->inside_outside_university;
        $teachpermitdata->total_aggregate_load = $this->total_aggregate_load ? $this->total_aggregate_load : NULL;
        $teachpermitdata->total_load_plm = $this->total_load_plm ? $this->total_load_plm : NULL ;
        $teachpermitdata->total_load_otherunivs = $this->total_load_otherunivs ? $this->total_load_otherunivs : NULL ;
        
        $teachpermitdata->applicant_signature = $this->applicant_signature->store('photos/studypermit/applicant_signature', 'local');
        $teachpermitdata->status = 'Pending';
        $teachpermitdata->total_units_enrolled = $this->total_units_enrolled;
        $teachpermitdata->available_units = $this->available_units;

        foreach($this->subjectLoad as $load){
            $jsonSubjectLoad[] = [
                'subject' => $load['subject'],
                'days' => $load['days'],
                'start_time' => $load['start_time'],
                'end_time' => $load['end_time'],
                'number_of_units' => $load['number_of_units'],
               
            // ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => '']

            ];
        }

        $jsonSubjectLoad = json_encode($jsonSubjectLoad);

        $teachpermitdata->load = $jsonSubjectLoad;

       
        $this->js("alert('Teach Permit submitted!')"); 
 
        $teachpermitdata->save();

        return redirect()->to(route('TeachPermitTable'));

    }

    public function render()
    {
        return view('livewire.teachpermit.teach-permit-form')->extends('layouts.app');
    }
}
