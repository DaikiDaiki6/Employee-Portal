<?php

namespace App\Livewire\Studypermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Studypermit;
use Livewire\WithFileUploads;

class StudyPermitForm extends Component
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
    public $degree_prog_and_school;
    public $load;
    public $total_teaching_load;
    public $total_aggregate_load;
    public $applicant_signature;
    public $status;
    public $total_units_enrolled;
    public $available_units;
    public $cover_memo = [];
    public $request_letter = [];
    public $teaching_assignment = [];
    public $summary_of_schedule = [];
    public $certif_of_grades = [];
    public $study_plan = [];
    public $student_faculty_eval = [];
    public $rated_ipcr = [];
    public $discount_entitlement;
    public $maximum_units;
    public $signature_head_office_unit;
    public $date_head_office_unit;
    public $signature_endorsed_by;
    public $date_endorsed_by;
    public $signature_recommended_by;
    public $date_recommended_by;
    public $signature_univ_pres;
    public $date_univ_pres;

    public function mount(){
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
        
        $dateToday = Carbon::now()->toDateString();
        $this->date = $dateToday;
        $this->start_period_cover = $dateToday;
        $this->application_date = $dateToday;
        $this->date_recommended_by = $dateToday;
        $this->subjectLoad = [
            ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => '']
        ];

       
        
    }


    public function removeImage($index, $request){
        // dump($this->cover_memo);
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
        }
        // unset($this->$requestName[$index]);
        // $this->$requestName =  array_values($this->$requestName);
        // dump($this->cover_memo);
        
    }

    public function addSubjectLoad(){
        $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
    }

    protected $rules = [
        'cover_memo.*' => 'required|file|mimes:jpg,bmp,png,pdf|max:3',
        'request_letter.*' => 'required|file|mimes:jpg,bmp,png,pdf|max:3',
        'summary_of_schedule.*' => 'required|file|mimes:jpg,bmp,png,pdf|max:3',
        'rated_ipcr.*' => 'required|file|mimes:jpg,bmp,png,pdf|max:3',
        'teaching_assignment.*' => 'file|mimes:jpg,bmp,png,pdf|max:3',
        'certif_of_grades.*' => 'file|mimes:jpg,bmp,png,pdf|max:3',
        'study_plan.*' => 'file|mimes:jpg,bmp,png,pdf|max:3',
        'student_faculty_eval.*' => 'file|mimes:jpg,bmp,png,pdf|max:3',        
    ];

    public function submit(){
        // $this->validate();

        $loggedInUser = auth()->user();

        $studypermitdata = new Studypermit();

        $departmentName = Employee::where('employee_id', $loggedInUser->employeeId)->value('department_name');   

        $studypermitdata->employee_id = $loggedInUser->employeeId;
        $studypermitdata->application_date = $this->application_date;
        $studypermitdata->department_name = $departmentName;
        $studypermitdata->start_period_cover = $this->start_period_cover;
        $studypermitdata->end_period_cover = $this->end_period_cover;
        $studypermitdata->degree_prog_and_school = $this->degree_prog_and_school;
        $studypermitdata->total_teaching_load = $this->total_teaching_load;
        $studypermitdata->total_aggregate_load = $this->total_aggregate_load;
        $studypermitdata->applicant_signature = $this->applicant_signature->store('photos/studypermit/applicant_signature', 'local');
        $studypermitdata->status = 'Pending';
        $studypermitdata->total_units_enrolled = $this->total_units_enrolled;
        $studypermitdata->available_units = $this->available_units;
        // $studypermitdata->cover_memo = $this->cover_memo->store('photos/studypermit/cover_memo', 'local');
        // $studypermitdata->request_letter = $this->request_letter->store('photos/studypermit/request_letter', 'local');
        // $studypermitdata->summary_of_schedule = $this->summary_of_schedule->store('photos/studypermit/summary_schedule', 'local');
        // $studypermitdata->rated_ipcr = $this->rated_ipcr->store('photos/studypermit/rated_ipcr', 'local');

        // $studypermitdata->teaching_assignment = $this->teaching_assignment ? $this->teaching_assignment->store('photos/studypermit/teaching_assignment', 'local') : '';
        // $studypermitdata->certif_of_grades = $this->certif_of_grades ? $this->certif_of_grades->store('photos/studypermit/certif_of_grades', 'local') : '';
        // $studypermitdata->study_plan = $this->study_plan ? $this->study_plan->store('photos/studypermit/study_plan', 'local') : '';
        // $studypermitdata->student_faculty_eval = $this->student_faculty_eval ? $this->student_faculty_eval->store('photos/studypermit/student_eval', 'local') : '';


        // dd($this->cover_memo);
        $fileFields = [
            'cover_memo',
            'request_letter',
            'summary_of_schedule',
            'rated_ipcr',
            'teaching_assignment',
            'certif_of_grades',
            'study_plan',
            'student_faculty_eval',
        ];
        
        foreach ($fileFields as $field) {
            $fileNames = [];
            foreach($this->$field as $item){
                $itemName = $item->store("photos/studypermit/$field", 'local');
                $fileNames[] = $itemName;
            }
            $studypermitdata->$field = $fileNames;
        }
        
        $studypermitdata->signature_recommended_by = $this->signature_recommended_by->store('photos/studypermit/recommended_by', 'local');
        $studypermitdata->date_recommended_by = $this->date_recommended_by;
        $studypermitdata->signature_endorsed_by = $this->signature_endorsed_by->store('photos/studypermit/endorsed_by', 'local');
        $studypermitdata->date_endorsed_by = $this->date_endorsed_by;

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

        $studypermitdata->load = $jsonSubjectLoad;

       
        $this->js("alert('Study Permit submitted!')"); 
 
        $studypermitdata->save();

        return redirect()->to(route('StudyPermitTable'));

    }


    public function render()
    {
        return view('livewire.studypermit.study-permit-form')->extends('layouts.app');
    }
}
