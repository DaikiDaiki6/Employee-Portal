<?php

namespace App\Livewire\Teachpermit;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class TeachPermitUpdate extends Component
{
    use WithFileUploads;
    
    public $index;
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
    public $study_available_units;

    public $units_enrolled;

    public $signature_of_head_office;
    public $date_of_signature_of_head_office;
    public $signature_of_human_resource;
    public $date_of_signature_of_human_resource;
    public $signature_of_vp_for_academic_affair;
    public $date_of_signature_of_vp_for_academic_affair;
    public $signature_of_university_president;
    public $date_of_signature_of_university_president;



    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $this->index = $index;
            $teachpermitdata = Teachpermit::findOrFail($index);
            $this->authorize('update', [$teachpermitdata]);
        } catch (AuthorizationException $e) {
            abort(404);
        }

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type', 'study_available_units' )
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->employee_type = $this->employeeRecord[0]->employee_type;

        $this->employee_id = $teachpermitdata->employee_id;
        $this->application_date = $teachpermitdata->application_date;
        $this->start_period_cover = $teachpermitdata->start_period_cover;
        $this->end_period_cover = $teachpermitdata->end_period_cover;
        $this->designation_rank = $teachpermitdata->designation_rank;
        $this->name_of_school_description = $teachpermitdata->name_of_school_description;
        $this->inside_outside_university = $teachpermitdata->inside_outside_university;
        $this->total_aggregate_load = $teachpermitdata->total_aggregate_load ? $teachpermitdata->total_aggregate_load : NULL;
        $this->total_load_plm = $teachpermitdata->total_load_plm ? $teachpermitdata->total_load_plm : NULL;
        $this->total_load_otherunivs = $teachpermitdata->total_load_otherunivs ? $teachpermitdata->total_load_otherunivs : NULL;
        $this->applicant_signature = $teachpermitdata->applicant_signature;
        $this->status = $teachpermitdata->status;
        $this->total_units_enrolled = $teachpermitdata->total_units_enrolled;
        $this->study_available_units = $this->employeeRecord[0]->study_available_units ?? 0;

        $this->date_of_signature_of_head_office = $teachpermitdata->date_of_signature_of_head_office;
        $this->date_of_signature_of_human_resource = $teachpermitdata->date_of_signature_of_human_resource;
        $this->date_of_signature_of_vp_for_academic_affair = $teachpermitdata->date_of_signature_of_vp_for_academic_affair;
        $this->date_of_signature_of_university_president = $teachpermitdata->date_of_signature_of_university_president;

        $this->signature_of_head_office = $teachpermitdata->signature_of_head_office;
        $this->signature_of_human_resource = $teachpermitdata->signature_of_human_resource;
        $this->signature_of_vp_for_academic_affair = $teachpermitdata->signature_of_vp_for_academic_affair;
        $this->signature_of_university_president = $teachpermitdata->signature_of_university_president;

        $this->subjectLoad = json_decode($teachpermitdata->load, true);

        if(isset($teachpermitdata->load)){
            $this->subjectLoad = json_decode($teachpermitdata->load, true);
            foreach($this->subjectLoad as $load){
                $this->units_enrolled += $load['number_of_units'];
            }
        }
    }

    public function getApplicantSignature(){
        return Storage::disk('local')->get($this->applicant_signature);
    }

    public function getHeadSignature(){
        return Storage::disk('local')->get($this->signature_of_head_office);
    }

    public function getHumanResourceSignature(){
        return Storage::disk('local')->get($this->signature_of_human_resource);
    }

    public function getVpAcademicAffairsSignature(){
        return Storage::disk('local')->get($this->signature_of_vp_for_academic_affair);
    }

    public function getPresidentSignature(){
        return Storage::disk('local')->get($this->signature_of_university_president);
    }
  

    public function addSubjectLoad(){
        $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
    }

    public function removeSubjectLoad($index){
        unset($this->subjectLoad[$index]);
        $this->subjectLoad = array_values($this->subjectLoad);
        $this->dispatch('update-subject-load', [json_encode($this->subjectLoad, true)]);
        $sum = 0;
        $index = 0;
        foreach ($this->subjectLoad ?? [] as $load){
            $sum += (int) $load['number_of_units'] ?? 1;
            $index += 1;
        }
        $this->units_enrolled = $sum ;

    }

    public function removeImage($item){
        $this->$item = null;
    }


    public function updated($key){
       
        $parts = explode('.', $key);

        if ($parts[0] === 'subjectLoad' && count($parts) >= 3) {
            $lastPart = end($parts);
            if ($lastPart == 'number_of_units') {
                if($this->subjectLoad != null){
                    $sum = 0;
                    $index = 0;
                    foreach ($this->subjectLoad ?? [] as $load){
                        $sum += (int) $load['number_of_units'] ?? 1;
                        $index += 1;
                    }
                    $this->units_enrolled = $sum ;
                }
            }
        }

    }

    protected $rules = [
        'designation_rank' => 'required|min:2|max:150',
        'inside_outside_university' => 'required|in:Inside the University,Outside the University',
        'start_period_cover' => 'required|after_or_equal:application_date|date',
        'end_period_cover' => 'required|after_or_equal:start_period_cover|date',
        'name_of_school_description' => 'required|min:10|max:500',
        'subjectLoad.*.subject' => 'required|min:2',
        'subjectLoad.*.days' => 'required',
        'subjectLoad.*.start_time' => 'required|before_or_equal:subjectLoad.*.end_time',
        'subjectLoad.*.end_time' => 'required|after_or_equal:subjectLoad.*.start_time',
        'subjectLoad.*.number_of_units' => 'required|min:1|numeric',
        'units_enrolled' => 'required|lte:study_available_units',
        'total_load_plm' => 'required|numeric',
        'total_load_otherunivs' => 'required|numeric',
        'total_aggregate_load' => 'required|numeric',
    ];

    protected $validationAttributes = [
        'inside_outside_university' => 'Inside or Outside the University',
        'start_period_cover' => 'Start Period',
        'end_period_cover' => 'End Period',
        'name_of_school_description' => 'Teach Permit Description',
        'subjectLoad.*.subject' => 'Subject',
        'subjectLoad.*.days' => 'Days',
        'subjectLoad.*.start_time' => 'Start Time',
        'subjectLoad.*.end_time' => 'End Time',
        'subjectLoad.*.number_of_units' => 'Number of Units',
        'units_enrolled' => 'Units Enrolled',
    ];
    
    public function submit(){

        // dd($this->getErrorBag());

        $loggedInUser = auth()->user();
        $real_available_units = Employee::where('employee_id', $loggedInUser->employee_id)
                            ->get()->value('study_available_units');   
        $this->validate(['study_available_units' => 'lte:' . $real_available_units]);
        
        foreach($this->rules as $rule => $validationRule){
            $this->validate([$rule => $validationRule]);
            // $this->resetErrorBag();
            $this->resetValidation();
        }   

       

        // $this->validate();

        $days_and_time2 = array();
        $conflictFlag = False;
        foreach($this->subjectLoad as $load){
            $confirmedDate = array();
            foreach ($load['days'] as $day){
                $confirmedDate[] = $day.'["'.$load['start_time'].'"]'.' ["'.$load['end_time'].'"]'.'|'.$load['subject'];
            }

            $days_and_time2 = array_merge($days_and_time2, $confirmedDate);           
        }
        

        foreach($this->subjectLoad as $index  => $load ){
            $confirmedDate = array();
            $subjectName = $load['subject'];


            foreach($load['days'] as $day){
                $confirmedDate[] = $day.'["'.$load['start_time'].'"]'. ' ["'.$load['end_time'].'"]'.'|'.$subjectName;
            }
            
            foreach ($confirmedDate as $date){
                $ctr = 0;
                list($day, $timeString) = explode('["', $date, 2);
                                                                               
                // Add the missing '[' back to the time string
                $timeString = '[' . $timeString;
                // Remove the square brackets and quotes from the string
                $timeString = str_replace(['[', ']', '"'], '', $timeString);
                $timeString = explode("|", $timeString);
                $dateName =  $timeString;
                $timeString = trim($timeString[0]);

                $times = explode(' ', $timeString);
                                                                               
                list($startTime, $endTime) = $times;
                if ($days_and_time2){
                    foreach ($days_and_time2 as $exist){
                        list($day, $timeString) = explode('["', $exist, 2);
                    
                        // Add the missing '[' back to the time string
                        $timeString = '[' . $timeString;
                        
                        // Remove the square brackets and quotes from the string
                        $timeString = str_replace(['[', ']', '"'], '', $timeString);
                        $timeString = explode("|", $timeString);
                        $existsName = $timeString;
                        $timeString = trim($timeString[0]);

                        $times = explode(' ', $timeString);
                        list($exitingTimeStart, $exitingTimeEnd) = $times;
                        if ($exist === $date){
                            $ctr = $ctr + 1;
                        }
                        else if ((($dateName === $existsName) === False) && (($startTime >= $exitingTimeStart && $startTime <= $exitingTimeEnd) || 
                        ($endTime >= $exitingTimeStart && $endTime <= $exitingTimeEnd) ||
                        ($startTime <= $exitingTimeStart && $endTime >= $exitingTimeEnd))) {
                                $conflictFlag = True;
                            }
                        if ($ctr >= 2){ 
                                $conflictFlag = True;
                                // $this->addError('subjectLoad.*.start_time' , 'The selected time slot conflicts with an existing schedule. Please choose a different time.');
                        }
                    }
                }                              
                
            }
        }
        
        $this->validate(['subjectLoad.*.start_time' => Rule::prohibitedIf($conflictFlag)]);
        

        $loggedInUser = auth()->user();

        $teachpermitdata = Teachpermit::findOrFail($this->index);

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                ->where('employee_id', $loggedInUser->employee_id)
                ->get();   

        $teachpermitdata->employee_id = $loggedInUser->employee_id;
        $teachpermitdata->application_date = $this->application_date;
        $teachpermitdata->start_period_cover = $this->start_period_cover;
        $teachpermitdata->end_period_cover = $this->end_period_cover;
        $teachpermitdata->designation_rank = $this->designation_rank;
        $teachpermitdata->name_of_school_description = $this->name_of_school_description;
        $teachpermitdata->inside_outside_university = $this->inside_outside_university;
        $teachpermitdata->total_aggregate_load = $this->total_aggregate_load ? $this->total_aggregate_load : NULL;
        $teachpermitdata->total_load_plm = $this->total_load_plm ? $this->total_load_plm : NULL ;
        $teachpermitdata->total_load_otherunivs = $this->total_load_otherunivs ? $this->total_load_otherunivs : NULL ;
        $teachpermitdata->status = 'Pending';
        $teachpermitdata->total_units_enrolled = $this->total_units_enrolled;
        $teachpermitdata->available_units = $this->study_available_units;

        $teachpermitdata->date_of_signature_of_head_office = $this->date_of_signature_of_head_office;
        $teachpermitdata->date_of_signature_of_human_resource = $this->date_of_signature_of_human_resource;
        $teachpermitdata->date_of_signature_of_vp_for_academic_affair = $this->date_of_signature_of_vp_for_academic_affair;
        $teachpermitdata->date_of_signature_of_university_president = $this->date_of_signature_of_university_president;


        $properties = [
            'applicant_signature' => 'required|mimes:jpg,png|extensions:jpg,png|max:5120',
        ];
        
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                $teachpermitdata->$propertyName = $this->$propertyName;
            } else {
                // If it's an uploaded file, store it and apply validation rules
                $teachpermitdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/teachpermit/' . $propertyName, 'local') : '';
                $this->validate([$propertyName => $validationRule]);
            }
        }

       

        foreach($this->subjectLoad as $load){
            $jsonSubjectLoad[] = [
                'subject' => $load['subject'],
                'days' => $load['days'],
                'start_time' => $load['start_time'],
                'end_time' => $load['end_time'],
                'number_of_units' => $load['number_of_units'],
            ];
        }

        $jsonSubjectLoad = json_encode($jsonSubjectLoad);

        $teachpermitdata->load = $jsonSubjectLoad;

        $this->js("alert('Teach Permit submitted!')"); 
 
        $teachpermitdata->update();

        return redirect()->to(route('TeachPermitTable'));

    }

    public function render()
    {
        return view('livewire.teachpermit.teach-permit-update')->extends('layouts.app');
    }
}
