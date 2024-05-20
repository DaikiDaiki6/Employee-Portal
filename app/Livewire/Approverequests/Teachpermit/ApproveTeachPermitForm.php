<?php

namespace App\Livewire\Approverequests\Teachpermit;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Teachpermit;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveTeachPermitForm extends Component
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
    public $available_units;

    public $signature_of_head_office;
    public $verdict_of_head_office;
    public $date_of_signature_of_head_office;
    public $signature_of_human_resource;
    public $verdict_of_human_resource;
    public $date_of_signature_of_human_resource;
    public $signature_of_vp_for_academic_affair;
    public $verdict_of_vp_for_academic_affair;
    public $date_of_signature_of_vp_for_academic_affair;
    public $signature_of_university_president;
    public $verdict_of_university_president;
    public $date_of_signature_of_university_president;



    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $this->index = $index;
            $teachpermitdata = Teachpermit::findOrFail($index);
            $this->authorize('update', [$teachpermitdata, 'Approve']);
        } catch (AuthorizationException $e) {
            abort(404);
        }

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
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
        $this->available_units = $teachpermitdata->available_units;
        $dateToday = Carbon::now()->toDateString();

        $this->date_of_signature_of_head_office = $teachpermitdata->date_of_signature_of_head_office;
        $this->date_of_signature_of_human_resource = $teachpermitdata->date_of_signature_of_human_resource;
        $this->date_of_signature_of_vp_for_academic_affair = $teachpermitdata->date_of_signature_of_vp_for_academic_affair;
        $this->date_of_signature_of_university_president = $teachpermitdata->date_of_signature_of_university_president;

        $this->signature_of_head_office = $teachpermitdata->signature_of_head_office;
        $this->signature_of_human_resource = $teachpermitdata->signature_of_human_resource;
        $this->signature_of_vp_for_academic_affair = $teachpermitdata->signature_of_vp_for_academic_affair;
        $this->signature_of_university_president = $teachpermitdata->signature_of_university_president;

        $this->verdict_of_head_office = $teachpermitdata->verdict_of_head_office;
        $this->verdict_of_human_resource = $teachpermitdata->verdict_of_human_resource;
        $this->verdict_of_vp_for_academic_affair = $teachpermitdata->verdict_of_vp_for_academic_affair;
        $this->signature_of_university_president = $teachpermitdata->signature_of_university_president;

        $this->subjectLoad = json_decode($teachpermitdata->load, true);
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
  

    // public function addSubjectLoad(){
    //     $this->subjectLoad[] = ['subject' => '', 'days' => '', 'start_time' => '', 'end_time' => '', 'number_of_units' => ''];
    // }

    public function removeImage($item){
        $this->$item = null;
    }
    
    public function submit(){
        // $this->validate();

        $loggedInUser = auth()->user();

        $teachpermitdata = Teachpermit::findOrFail($this->index);

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'current_position', 'employee_type' )
                ->where('employee_id', $loggedInUser->employee_id)
                ->get();   

        $dates = [
            'date_of_signature_of_head_office' => 'required_unless:signature_of_head_office,null|required_unless:verdict_of_head_office,null|nullable|date|after_or_equal:application_date',
            'date_of_signature_of_human_resource' => 'required_unless:signature_of_human_resource,null|required_unless:verdict_of_human_resource,null|nullable|date|after_or_equal:application_date',
            'date_of_signature_of_vp_for_academic_affair' => 'required_unless:signature_of_vp_for_academic_affair,null|required_unless:verdict_of_vp_for_academic_affair,null|nullable|date|after_or_equal:application_date',
            'date_of_signature_of_university_president' => 'required_unless:signature_of_university_president,null|required_unless:verdict_of_university_president,null|nullable|date|after_or_equal:application_date',
        ];

        foreach ($dates as $date => $validationRule){
            $this->validate([$date => $validationRule]);
            $teachpermitdata->$date = $this->$date;
        }


        $Names = Employee::select('first_name', 'middle_name', 'last_name')
        ->where('employee_id', $loggedInUser->employee_id)
        ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;

        $targetUser = User::where('employee_id', $teachpermitdata->employee_id)->first();

        $properties = [
            // 'applicant_signature' => 'mimes:jpg,png|extensions:jpg,png,pdf',
            'signature_of_head_office' => ['required_with:date_of_signature_of_head_office|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_of_head_office'],
            'signature_of_human_resource' => ['required_with:date_of_signature_of_human_resource|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_of_human_resource'] ,
            'signature_of_vp_for_academic_affair' => ['required_with:date_of_signature_of_vp_for_academic_affair|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_of_vp_for_academic_affair'],
            'signature_of_university_president' => ['required_with:date_of_signature_of_university_president|mimes:jpg,png,pdf|extensions:jpg,png,pdf', 'verdict_of_university_president'],
        ];
        
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                $teachpermitdata->$propertyName = $this->$propertyName;
            } else {
                $this->validate([$propertyName => $validationRule[0]]);
                $name_of_verdict = $validationRule[1];
                if($this->$propertyName){
                $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Teach Permit', 'Signed', $teachpermitdata->id, $signedIn,  $this->$name_of_verdict));
                }
                $teachpermitdata->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/teachpermit/' . $propertyName, 'local') : '';
            }
        }

        $verdicts = [
            'verdict_of_head_office',
            'verdict_of_human_resource',
            'verdict_of_vp_for_academic_affair',
            'verdict_of_university_president',
        ];

        foreach($verdicts as $verdict) {
            $this->validate([$verdict => 'nullable|in:1,0']);
            $teachpermitdata->$verdict = $this->$verdict;
        }

        

        if($teachpermitdata->verdict_of_head_office == 1 && $teachpermitdata->verdict_of_human_resource == 1 
            && $teachpermitdata->verdict_of_vp_for_academic_affair == 1 && $teachpermitdata->verdict_of_university_president == 1){
                if($teachpermitdata->signature_of_head_office && $teachpermitdata->signature_of_human_resource 
                && $teachpermitdata->signature_of_vp_for_academic_affair && $teachpermitdata->signature_of_university_president ){
                    $teachpermitdata->status = "Approved";
                }
            }
        else if($teachpermitdata->verdict_of_head_office == 0 || $teachpermitdata->verdict_of_human_resource == 0 
        || $teachpermitdata->verdict_of_vp_for_academic_affair == 0 || $teachpermitdata->verdict_of_university_president == 0){
            if($teachpermitdata->signature_of_head_office || $teachpermitdata->signature_of_human_resource 
            || $teachpermitdata->signature_of_vp_for_academic_affair || $teachpermitdata->signature_of_university_president ){
                $teachpermitdata->status = "Declined";
            }
        } else {
            $teachpermitdata->status = "Pending";
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

        return redirect()->to(route('ApproveTeachPermitTable'));

    }

    public function render()
    {
        return view('livewire.approverequests.teachpermit.approve-teach-permit-form')->extends('layouts.app');
    }
}
