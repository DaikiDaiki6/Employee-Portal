<?php

namespace App\Livewire\Studypermit;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Studypermit;
use App\Rules\StringOrArray;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class StudyPermitUpdate extends Component
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
    public $degree_prog_and_school;
    public $load;
    public $total_teaching_load;
    public $total_aggregate_load;
    public $applicant_signature;
    public $status;
    public $total_units_enrolled;
    public $available_units;
    public $study_available_units;

    public $units_enrolled; 
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

    public $flag;

    public function mount($index){
   
        $loggedInUser = auth()->user();
        
        try {
            $this->index = $index;
            $studypermitdata = Studypermit::findOrFail($index);
            $this->authorize('update', [$studypermitdata]);
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
        $this->study_available_units = $this->employeeRecord[0]->study_available_units ?? 0;
        
        $this->employee_id = $studypermitdata->employee_id;
        $this->application_date = $studypermitdata->application_date;
        $this->start_period_cover = $studypermitdata->start_period_cover;
        $this->end_period_cover = $studypermitdata->end_period_cover;
        $this->degree_prog_and_school = $studypermitdata->degree_prog_and_school;
        $this->total_teaching_load = $studypermitdata->total_teaching_load;
        $this->total_aggregate_load = $studypermitdata->total_aggregate_load;
        $this->applicant_signature = $studypermitdata->applicant_signature;
        $this->status = $studypermitdata->status;
        $this->total_units_enrolled = $studypermitdata->total_units_enrolled;
        // $this->available_units = $studypermitdata->available_units;
        // dd($studypermitdata->cover_memo);
        $this->cover_memo = $studypermitdata->cover_memo;
        $this->request_letter = $studypermitdata->request_letter;
        $this->summary_of_schedule = $studypermitdata->summary_of_schedule;
        $this->rated_ipcr = $studypermitdata->rated_ipcr;
        $this->teaching_assignment = $studypermitdata->teaching_assignment;
        $this->certif_of_grades = $studypermitdata->certif_of_grades;
        $this->study_plan = $studypermitdata->study_plan;
        $this->student_faculty_eval = $studypermitdata->student_faculty_eval;
        
        $this->date_recommended_by = $studypermitdata->date_recommended_by;
        $this->signature_recommended_by = $studypermitdata->signature_recommended_by;
        $this->date_endorsed_by = $studypermitdata->date_endorsed_by;
        $this->signature_endorsed_by = $studypermitdata->signature_endorsed_by;
        if(isset($studypermitdata->load)){
            $this->subjectLoad = json_decode($studypermitdata->load, true);
            foreach($this->subjectLoad as $load){
                $this->units_enrolled += $load['number_of_units'];
            }
        }
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

    public function addSubjectLoad(){
        $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
    }

    public function removeSubjectLoad($index){
        unset($this->subjectLoad[$index]);
        // $this->subjectLoad = array_values($this->subjectLoad);
    }


    public function getRecommendedSignature(){
        return Storage::disk('local')->get($this->signature_recommended_by);
    }

    public function getEndorsedSignature(){
        return Storage::disk('local')->get($this->signature_endorsed_by);
    }

    public function getImage($item){
        return Storage::disk('local')->get($this->$item);
    }

    public function getArrayImage($item, $index){
        return Storage::disk('local')->get($this->$item[$index]);
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function removeArrayImage($index, $request, $insideIndex = null){
        // dump($this->cover_memo);
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index][$insideIndex]);
            $this->$requestName =  array_values($this->$requestName);
        }
        else{
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
        }
    }

    protected $rules = [
        'start_period_cover' => 'required|after_or_equal:application_date',
        'end_period_cover' => 'required|after_or_equal:start_period_cover',
        'degree_prog_and_school' => 'required|min:10|max:500',
        'subjectLoad.*.subject' => 'required|min:2|max:50',
        'subjectLoad.*.days' => 'required',
        'subjectLoad.*.start_time' => 'required|before_or_equal:subjectLoad.*.end_time',
        'subjectLoad.*.end_time' => 'required|after_or_equal:subjectLoad.*.start_time',
        'subjectLoad.*.number_of_units' => 'required|min:1|lte:12',
        'units_enrolled' => 'required|lte:study_available_units',
        'total_teaching_load' => 'required|numeric',
        'total_aggregate_load' => 'required|numeric',
        'cover_memo' => 'required|array|min:1|max:3',
        // 'cover_memo.*' => 'required',
        'cover_memo.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        'request_letter' => 'required|array|min:1|max:3',
        // 'request_letter.*' => 'required',
        'request_letter.*.*' => 'required|mimes:jpg,png,pdf|max:5120',
        'teaching_assignment' => 'nullable|array|max:3',
        'teaching_assignment.*' => 'nullable',
        'teaching_assignment.*.*' => 'nullable|mimes:jpg,png,pdf|max:5120',
        'summary_of_schedule' => 'required|array|min:1|max:3',
        'summary_of_schedule.*' => 'nullable',
        'summary_of_schedule.*.*' => 'required|mimes:jpg,png,pdf|max:5120',
        'certif_of_grades' => 'nullable|array|max:3',
        'certif_of_grades.*' => 'nullable',
        'certif_of_grades.*.*' => 'nullable|mimes:jpg,png,pdf|max:5120',
        'study_plan' => 'nullable|array|max:3',
        'study_plan.*' => 'nullable',
        'study_plan.*.*' => 'nullable|mimes:jpg,png,pdf|max:5120',
        'student_faculty_eval' => 'nullable|array|max:3',
        'student_faculty_eval.*' => 'nullable',
        'student_faculty_eval.*.*' => 'nullable|mimes:jpg,png,pdf|max:5120',
        'rated_ipcr' => 'required|array|min:1|max:3',
        'rated_ipcr.*' => 'nullable',
        'rated_ipcr.*.*' => 'required|mimes:jpg,png,pdf|max:5120',
    ];

    protected $validationAttributes = [
        'application_date' => 'Application Date',
        'start_period_cover' => 'Start Period Cover',
        'end_period_cover' => 'End Period Cover',
        'subjectLoad.*.subject' => 'Subject',
        'subjectLoad.*.days' => 'Days',
        'subjectLoad.*.start_time' => 'Start Time',
        'subjectLoad.*.end_time' => 'End Time',
        'subjectLoad.*.number_of_units' => 'Number of Units',
        'units_enrolled' => 'Units Enrolled',
        // 'cover_memo' => 'Cover Memo',
        // 'cover_memo.*' => 'Cover Memo',
        // 'cover_memo.*.*' => 'Cover Memo',
        'request_letter' => 'Request Letter',
        'request_letter.*' => 'Request Letter',
        'request_letter.*.*' => 'Request Letter',
        'teaching_assignment' => 'Teaching Assignment',
        'teaching_assignment.*' => 'Teaching Assignment',
        'teaching_assignment.*.*' => 'Teaching Assignment',
        'summary_of_schedule' => 'Summary of Schedule',
        'summary_of_schedule.*' => 'Summary of Schedule',
        'summary_of_schedule.*.*' => 'Summary of Schedule',
        'rated_ipcr' => 'Rated IPCR',
        'rated_ipcr.*' => 'Rated IPCR',
        'rated_ipcr.*.*' => 'Rated IPCR',
        'certif_of_grades' => 'Certificate of Grades',
        'certif_of_grades.*' => 'Certificate of Grades',
        'certif_of_grades.*.*' => 'Certificate of Grades',
        'study_plan' => 'Study Plan',
        'study_plan.*' => 'Study Plan',
        'study_plan.*.*' => 'Study Plan',
        'student_faculty_eval' => 'Student Faculty Evaluation',
        'student_faculty_eval.*' => 'Student Faculty Evaluation',
        'student_faculty_eval.*.*' => 'Student Faculty Evaluation',
    ];

    public function submit(){
        // dd($this->request_letter, $this->cover_memo);
        $loggedInUser = auth()->user();
        $real_available_units = Employee::where('employee_id', $loggedInUser->employee_id)
                            ->get()->value('study_available_units');   
        $this->validate(['study_available_units' => 'lte:' . $real_available_units]);

        $this->validate();

        $days_and_time2 = array();
        $conflictFlag = False;
        foreach($this->subjectLoad as $load){
            $confirmedDate = array();
            foreach ($load['days'] as $day){
                $confirmedDate[] = $day.'["'.$load['start_time'].'"]'.' ["'.$load['end_time'].'"]'.'|'.$load['subject'];
            }

            $days_and_time2 = array_merge($days_and_time2, $confirmedDate);           
        }
        // dd($days_and_time2);
        

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
        $studypermitdata = Studypermit::findOrFail($this->index);

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
                            if($studypermitdata->$field != null && $ctr <= $ctrField){
                                Storage::delete($studypermitdata->$field[$index]);
                            }
                        }
                    }
                }
                else{
                    if (!is_array($item) && !is_string($item)) {
                        $this->addError('cover_memo.' . $index, 'The' . $field . 'must be a string or an array.');
                    }
                }
            }
            $studypermitdata->$field = $fileNames;
        }
        

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                ->where('employee_id', $loggedInUser->employee_id)
                ->get();   

        $studypermitdata->employee_id = $loggedInUser->employee_id;
        $studypermitdata->application_date = $this->application_date;
        $studypermitdata->start_period_cover = $this->start_period_cover;
        $studypermitdata->end_period_cover = $this->end_period_cover;
        $studypermitdata->degree_prog_and_school = $this->degree_prog_and_school;
        $studypermitdata->total_teaching_load = $this->total_teaching_load;
        $studypermitdata->total_aggregate_load = $this->total_aggregate_load;
        // $studypermitdata->applicant_signature = $this->applicant_signature->store('photos/studypermit/applicant_signature', 'local');
        $studypermitdata->status = 'Pending';
        $studypermitdata->total_units_enrolled = $this->total_units_enrolled;
        $studypermitdata->available_units = $this->study_available_units;

        if(is_string($this->applicant_signature) == True){
            $this->validate(['applicant_signature' => 'required|string|max:5120']);
            $studypermitdata->applicant_signature = $this->applicant_signature;
        }else{
            $this->validate(['applicant_signature' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120']);
            $studypermitdata->applicant_signature = $this->applicant_signature->store('photos/studypermit/applicant_signature', 'local');
        }
        // $properties = [
        //     'applicant_signature' => 'mimes:jpg,png|extensions:jpg,png',
        //     'cover_memo' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'request_letter' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'summary_of_schedule' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'rated_ipcr' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'teaching_assignment' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'certif_of_grades' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'study_plan' => 'file|mimes:jpg,png|extensions:jpg,png',
        //     'student_faculty_eval' => 'file|mimes:jpg,png|extensions:jpg,png',
        // ];
        
        // // Iterate over the properties
        // foreach ($properties as $propertyName => $validationRule) {
        //     // Check if the current property value is a string or an uploaded file
        //     if (is_string($this->$propertyName)) {
        //         // If it's a string, assign it directly
        //         $studypermitdata->$propertyName = $this->$propertyName;
        //     } else {
        //         // If it's an uploaded file, store it and apply validation rules
        //         $studypermitdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/studypermit/' . $propertyName, 'local') : '';
        //         $this->validate([$propertyName => $validationRule]);
        //     }
        // }
        // dd($this->cover_memo);

       
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
 
        $studypermitdata->update();

        return redirect()->to(route('StudyPermitTable'));

    

    }
    
    public function render()
    {
        return view('livewire.studypermit.study-permit-update')->extends('layouts.app');
    }
}
