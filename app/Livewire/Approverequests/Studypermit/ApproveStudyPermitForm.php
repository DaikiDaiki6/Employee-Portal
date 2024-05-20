<?php

namespace App\Livewire\Approverequests\Studypermit;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Studypermit;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveStudyPermitForm extends Component
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

    public $verdict_endorsed_by;
    public $signature_recommended_by;
    public $date_recommended_by;

    public $verdict_recommended_by;
    public $signature_univ_pres;
    public $date_univ_pres;
    public $flag;

    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $this->index = $index;
            $studypermitdata = Studypermit::findOrFail($index);
            $this->authorize('update', [$studypermitdata, 'Approve']);
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
        $this->cover_memo = $studypermitdata->cover_memo;
        $this->request_letter = $studypermitdata->request_letter;
        $this->summary_of_schedule = $studypermitdata->summary_of_schedule;
        $this->rated_ipcr = $studypermitdata->rated_ipcr;
        $this->teaching_assignment = $studypermitdata->teaching_assignment;
        $this->certif_of_grades = $studypermitdata->certif_of_grades;
        $this->study_plan = $studypermitdata->study_plan;
        $this->student_faculty_eval = $studypermitdata->student_faculty_eval;
        
        $dateToday = Carbon::now()->toDateString();

        $this->date_recommended_by = $studypermitdata->date_recommended_by ;
        $this->signature_recommended_by = $studypermitdata->signature_recommended_by;
        $this->date_endorsed_by = $studypermitdata->date_endorsed_by;
        $this->signature_endorsed_by = $studypermitdata->signature_endorsed_by;
        $this->verdict_recommended_by = $studypermitdata->verdict_recommended_by;
        $this->verdict_endorsed_by = $studypermitdata->verdict_endorsed_by;

        if(isset($studypermitdata->load)){
            $this->subjectLoad = json_decode($studypermitdata->load, true);
            foreach($this->subjectLoad as $load){
                $this->units_enrolled += $load['number_of_units'];
            }
        }
    }

    public function updated($keys){
        if($keys == "auth_off_sig_b"){
            $this->flag = "New";
        }
    }

    public function addSubjectLoad(){
        $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
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


    public function removeArrayImage($index, $request, $insideIndex = null){
        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);
        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index][$insideIndex]);
        }
        else{
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
        }
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function submit(){
        // $this->validate();

        $loggedInUser = auth()->user();
        $studypermitdata = Studypermit::findOrFail($this->index);

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                ->where('employee_id', $loggedInUser->employee_id)
                ->get();   

        $studypermitdata->employee_id = $loggedInUser->employee_id;

        // $studypermitdata->application_date = $this->application_date;
        // $studypermitdata->start_period_cover = $this->start_period_cover;
        // $studypermitdata->end_period_cover = $this->end_period_cover;
        // $studypermitdata->degree_prog_and_school = $this->degree_prog_and_school;
        // $studypermitdata->total_teaching_load = $this->total_teaching_load;
        // $studypermitdata->total_aggregate_load = $this->total_aggregate_load;
        // // $studypermitdata->applicant_signature = $this->applicant_signature->store('photos/studypermit/applicant_signature', 'local');
        // $studypermitdata->status = 'Pending';
        // $studypermitdata->total_units_enrolled = $this->total_units_enrolled;
        // $studypermitdata->available_units = $this->available_units;

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

        $Names = Employee::select('first_name', 'middle_name', 'last_name')
        ->where('employee_id', $loggedInUser->employee_id)
        ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;

        $targetUser = User::where('employee_id', $studypermitdata->employee_id)->first();

        // $fileFields = [
        //     'cover_memo',
        //     'request_letter',
        //     'summary_of_schedule',
        //     'rated_ipcr',
        //     'teaching_assignment',
        //     'certif_of_grades',
        //     'study_plan',
        //     'student_faculty_eval',
        // ];

        // foreach ($fileFields as $field) {
        //     $fileNames = [];            
        //     $ctrField = count($this->$field) - 1 ;
        //     $ctr = 0;
        //     foreach($this->$field as $index => $item){
        //         $ctr += 1;
        //         if(is_string($item)){
        //             $fileNames[] = $item;  
        //         }
        //         else if(is_array($item)){
        //             foreach($item as $file){
        //                 if(is_string($item)){
        //                     $fileNames[] = $file;
        //                 }
        //                 else{ 
        //                     if($this->$field){
        //                         $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Study Permit', 'Signed', $studypermitdata->id, $signedIn));
        //                     }
        //                     $itemName = $file->store("photos/studypermit/$field", 'local');
        //                     $fileNames[] = $itemName;
        //                     if($studypermitdata->$field != null && $ctr <= $ctrField){
        //                         Storage::delete($studypermitdata->$field[$index]);
        //                     }
        //                 }
        //             }
        //         }
        //         // else{
        //         //     $itemName = $item->store("photos/studypermit/$field", 'local');
        //         //     $fileNames[] = $itemName;
        //         //     Storage::delete($studypermitdata->$field[$index]);

        //         // }

                
        //     }
        //     $studypermitdata->$field = $fileNames;
        // }

        $properties = [
            'signature_recommended_by' => ['required_with:verdict_recommended_by|nullable|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_recommended_by'],
            'signature_endorsed_by' => ['required_with:verdict_endorsed_by|nullable|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_endorsed_by'],
        ];

        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
        // Check if the current property value is a string or an uploaded file                
                if (is_string($this->$propertyName)) {
                    // If it's a string, assign it directly
                    $studypermitdata->$propertyName = $this->$propertyName;
                }
                else if($this->$propertyName == null){
                    if($propertyName == "signature_recommended_by")
                        $this->validate([$propertyName => 'required_with:verdict_recommended_by']);
                    else if ($propertyName == 'signature_endorsed_by')
                        $this->validate([$propertyName => 'required_with:verdict_endorsed_by']);
                }
                else {
                    // If it's an uploaded file, store it and apply validation rules
                    if($this->$propertyName){
                        $name_of_verdict = $validationRule[1];
                        $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Leave Request', 'Signed', $studypermitdata->id, $signedIn, $this->$name_of_verdict));
                    }
                    $studypermitdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/studypermit/' . $propertyName, 'local') : '';
                    $this->validate([$propertyName => $validationRule[0]]);
                }
        }

        $verdictProperties = [
            'verdict_recommended_by' => 'required_unless:signature_recommended_by,null',
            'verdict_endorsed_by' => 'required_unless:signature_endorsed_by,null',
        ];

        // Iterate over the properties
        foreach ($verdictProperties as $propertyName => $validationRule) {
                $studypermitdata->$propertyName = $this->$propertyName; 
                $this->validate([$propertyName => $validationRule]);
        }

        
        $dateProperties = [
            'date_recommended_by'  => 'required_unless:signature_recommended_by,null|required_unless:verdict_recommended_by,null|nullable|date' ,
            'date_endorsed_by'  => 'required_unless:signature_endorsed_by,null|required_unless:verdict_endorsed_by,null|nullable|date',
        ];

         // Iterate over the properties
         foreach ($dateProperties as $propertyName => $validationRule) {
            $studypermitdata->$propertyName = $this->$propertyName; 
            $this->validate([$propertyName => $validationRule]);
        }

        // $studypermitdata->signature_recommended_by = $this->signature_recommended_by->store('photos/studypermit/recommended_by', 'local');
        $studypermitdata->date_recommended_by = $this->date_recommended_by;
        // $studypermitdata->signature_endorsed_by = $this->signature_endorsed_by->store('photos/studypermit/endorsed_by', 'local');
        $studypermitdata->date_endorsed_by = $this->date_endorsed_by;
        
        foreach($this->subjectLoad as $load){
            $jsonSubjectLoad[] = [
                'subject' => $load['subject'],
                'days' => $load['days'],
                'start_time' => $load['start_time'],
                'end_time' => $load['end_time'],
                'number_of_units' => $load['number_of_units'],
            ];
        }

        if($studypermitdata->verdict_recommended_by == 1 &&  $studypermitdata->verdict_endorsed_by == 1){
            if( $studypermitdata->signature_recommended_by &&  $studypermitdata->signature_endorsed_by){
                $studypermitdata->status = "Approved";
            }
        } else if($studypermitdata->verdict_recommended_by == 0 ||  $studypermitdata->verdict_endorsed_by == 0){
            if( $studypermitdata->signature_recommended_by &&  $studypermitdata->signature_endorsed_by){
                $studypermitdata->status = "Declined";
            }
        } else {
            $studypermitdata->status = "Pending";
        }

        $jsonSubjectLoad = json_encode($jsonSubjectLoad);

        $studypermitdata->load = $jsonSubjectLoad;

       
        $this->js("alert('Study Permit updated!')"); 
 
        $studypermitdata->update();

        return redirect()->to(route('ApproveStudyPermitTable'));

    

    }


    public function render()
    {
        return view('livewire.approverequests.studypermit.approve-study-permit-form')->extends('layouts.app');
    }
}
