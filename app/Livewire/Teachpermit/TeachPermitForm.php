<?php

namespace App\Livewire\Teachpermit;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

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
    public $study_available_units;

    public $units_enrolled;

    public function mount(){
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type', 'study_available_units' )
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->get();   
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->employee_type = $this->employeeRecord[0]->employee_type;
        $this->study_available_units = $this->employeeRecord[0]->study_available_units ?? 0;
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
                    // if($this->ipcr_type == 'rated'){
                    //     $weight =  $core_function['weight'] ?? 100;
                    //     $this->core_rating = ($sum / ($index * 4)) / $weight;
                    // }
                    // else{
                    //     $this->core_rating = $sum / ($index * 4);
                    // }
                    // $this->reset('core_rating');
                    // dd($this->core_rating);
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
        'applicant_signature' => 'required|mimes:jpg,png,pdf',
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
        foreach($this->rules as $rule => $validationRule){
            $this->validate([$rule => $validationRule]);
            // $this->resetErrorBag();
            $this->resetValidation();
        }   
    
        $loggedInUser = auth()->user();
        $real_available_units = Employee::where('employee_id', $loggedInUser->employee_id)
                            ->get()->value('study_available_units');   
        $this->validate(['study_available_units' => 'lte:' . $real_available_units]);

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
        $teachpermitdata->available_units = $this->study_available_units;

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
 
        $teachpermitdata->save();

        return redirect()->to(route('TeachPermitTable'));

    }

    public function render()
    {
        return view('livewire.teachpermit.teach-permit-form')->extends('layouts.app');
    }
}
