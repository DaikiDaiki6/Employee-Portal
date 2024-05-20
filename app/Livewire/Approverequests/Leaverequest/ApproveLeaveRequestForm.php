<?php

namespace App\Livewire\Approverequests\Leaverequest;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;
use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApproveLeaveRequestForm extends Component
{
    use WithFileUploads;

    
    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $available_credits;
    public $current_position;
    public $salary;

    public $employee_id;
    public $date_of_filling;
    public $type_of_leave;
    public $type_of_leave_others;
    public $type_of_leave_sub_category;
    public $type_of_leave_description;
    public $num_of_days_work_days_applied;
    public $inclusive_start_date;
    public $inclusive_end_date;
    public $commutation;
    public $commutation_signature_of_appli;
    public $total_earned_vaca;
    public $less_this_appli_vaca;
    public $balance_vaca;
    public $total_earned_sick;
    public $less_this_appli_sick;
    public $balance_sick;
    public $as_of_filling;
    public $auth_off_sig_a;
    public $status_description;
    public $auth_off_sig_b;
    public $days_with_pay;
    public $days_without_pay;
    public $others;
    public $head_disapprove_reason;
    public $auth_off_sig_c_and_d;

    public $department_head_verdict;

    public $human_resource_verdict_a;

    public $hr_a_disapprove_reason;

    public $human_resource_verdict_cd;
    public $hr_cd_disapprove_reason;
    public $index;
    public $flag;

    public function mount($index){
        $this->index = $index;
        $loggedInUser = auth()->user();
        try {
            $leaverequest = $this->editLeaveRequest($index);
            $this->authorize('update', [$leaverequest, 'Approve']);
        } catch (AuthorizationException $e) {
            abort(404);
        }

        // $leaverequest = $this->editLeaveRequest($index);
        $this->date_of_filling = $leaverequest->date_of_filling;
        $this->type_of_leave = $leaverequest->type_of_leave;
        $this->type_of_leave_others = $leaverequest->type_of_leave_others;
        $this->type_of_leave_sub_category = $leaverequest->type_of_leave_sub_category;
        $this->type_of_leave_description = $leaverequest->type_of_leave_description;
        $this->num_of_days_work_days_applied = $leaverequest->num_of_days_work_days_applied;
        $this->inclusive_start_date = $leaverequest->inclusive_start_date;
        $this->inclusive_end_date = $leaverequest->inclusive_end_date;
        $this->commutation = $leaverequest->commutation;
        $this->commutation_signature_of_appli = $leaverequest->commutation_signature_of_appli;
        if($leaverequest->head_disapprove_reason){
            $this->head_disapprove_reason = $leaverequest->head_disapprove_reason;
            $this->department_head_verdict = "Declined";
        }
        else{
            $this->department_head_verdict = "Approved";
        }
        if($leaverequest->human_resource_verdict_a == 1){
            $this->human_resource_verdict_a = "Approved" ;
        }else{
            $this->human_resource_verdict_a = "Declinedd    " ;
        }
        
        if($leaverequest->hr_cd_disapprove_reason){
            $this->hr_cd_disapprove_reason = $leaverequest->hr_cd_disapprove_reason;
            $this->human_resource_verdict_cd = "Declined";
        }
        else{
            $this->human_resource_verdict_cd = "Approved";
        }
        if($leaverequest->auth_off_sig_b){
            $this->flag = "Initial";
            $this->auth_off_sig_b = $leaverequest->auth_off_sig_b;
        }
        if($leaverequest->auth_off_sig_a){
            $this->flag = "Initial";
            $this->auth_off_sig_a = $leaverequest->auth_off_sig_a;
        }
        if($leaverequest->auth_off_sig_c_and_d){
            $this->flag = "Initial";
            $this->auth_off_sig_c_and_d = $leaverequest->auth_off_sig_c_and_d;
        }
        

        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department_name', 'employee_id', 'current_position', 'salary', 'vacation_credits', 'sick_credits')
                                    ->where('employee_id', $leaverequest->employee_id)
                                    ->get();    
        $this->available_credits = $this->employeeRecord[0]->vacation_credits + $this->employeeRecord[0]->sick_credits;
        $this->employee_id = $this->employeeRecord[0]->employee_id;
        $this->first_name = $this->employeeRecord[0]->first_name;
        $this->middle_name = $this->employeeRecord[0]->middle_name;
        $this->last_name = $this->employeeRecord[0]->last_name;
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->current_position = $this->employeeRecord[0]->current_position;
        $this->salary = $this->employeeRecord[0]->salary;
    }

  

    public function editLeaveRequest($index){
        $leaverequest = Leaverequest::findOrFail($index);
        // $this->leaverequest = $leaverequest;
        return $leaverequest;
    }

    public function getHeadSignature(){
        return Storage::disk('local')->get($this->auth_off_sig_b);
    }

    public function getHumanResourceA(){
        return Storage::disk('local')->get($this->auth_off_sig_a);
    }

    public function getHumanResourceCD(){
        return Storage::disk('local')->get($this->auth_off_sig_c_and_d);
    }

    public function getApplicantSignature(){
        return Storage::disk('local')->get($this->commutation_signature_of_appli);
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function updated($keys){
        // if(in_array($keys, ['inclusive_start_date', 'inclusive_end_date'])){
        //     $startDate = Carbon::parse($this->inclusive_start_date);
        //     $endDate = Carbon::parse($this->inclusive_end_date);
        //     $num_of_days_work_days_applied = $startDate->diffInDays($endDate);
        //     // $num_of_hours_work_days_applied = $startDate->diffInHours($endDate);
        //     $num_of_seconds_work_days_applied = $startDate->diffInMinutes($endDate);
        //     // dd($num_of_seconds_work_days_applied);
        //     if ($num_of_days_work_days_applied === 0){
        //         // $conversionValues = [
        //         //     0.002, 0.004, 0.006, 0.008, 0.010, 0.012, 0.015, 0.017, 0.019, 0.021,
        //         //     0.023, 0.025, 0.027, 0.029, 0.031, 0.033, 0.035, 0.037, 0.040, 0.042,
        //         //     0.044, 0.046, 0.048, 0.050, 0.052, 0.054, 0.056, 0.058, 0.060, 0.062,
        //         //     0.065, 0.067, 0.069, 0.071, 0.073, 0.075, 0.077, 0.079, 0.081, 0.083,
        //         //     0.085, 0.087, 0.090, 0.092, 0.094, 0.096, 0.098, 0.100, 0.102, 0.104,
        //         //     0.106, 0.108, 0.110, 0.112, 0.115, 0.117, 0.119, 0.121, 0.123, 0.125,
        //         // ];
        //         $num_of_seconds_work_days_applied = $num_of_seconds_work_days_applied / 60;
        //         // $decimalPart = ($num_of_seconds_work_days_applied - floor($num_of_seconds_work_days_applied)) * 60;
        //         $hoursLeave = $num_of_seconds_work_days_applied * 0.125;
             
        //        $this->$num_of_days_work_days_applied = number_format($hoursLeave , 3);
        //     }
        //     else{
        //         $this->num_of_days_work_days_applied =  number_format($num_of_days_work_days_applied, 3);
        //     }
        // }
        if($keys == "auth_off_sig_b"){
            $this->flag = "New";
        }
    }

    protected $rules = [
        // 'type_of_leave' => 'required|in:Others,Vacation Leave,Mandatory/Forced Leave,Sick Leave,Maternity Leave,Paternity Leave,Special Privilege Leave,Solo Parent Leave,Study Leave,10-Day VAWC Leave,Rehabilitation Privilege,Special Leave Benefits for Women,Special Emergency Leave,Adoption Leave',
        // 'type_of_leave_others' => 'required_if:type_of_leave,Others',
        // 'type_of_leave_sub_category' => 'required|in:Within the Philippines,Abroad,In Hospital,Out Patient,Special Leave Benefits for Women,Completion of Master\'s degree,BAR/Board Examination Review,Monetization of leave credits,Terminal Leave',
        // // 'type_of_leave_description' => '',
        // 'inclusive_start_date' => 'required|after_or_equal:date_of_filling|before_or_equal:inclusive_end_date',
        // 'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
        // 'num_of_days_work_days_applied' => 'required|lte:available_credits',
        // 'commutation' => 'required|in:not requested, requested',
    ];

    protected $validationAttributes = [
        'auth_off_sig_a' => 'Signature of Department Head',
        'auth_off_sig_b' => 'Signature of HR Officer A',
        'auth_off_sig_c_and_d' => 'Signature of HR Officer C',
        'department_head_verdict' => 'Department Head Verdict',
        'human_resource_verdict_a' => 'HR Officer A',
        'human_resource_verdict_cd' => 'HR Officer C',
        'head_disapprove_reason' => 'Department Head Disapprove Reason',
        'hr_cd_disapprove_reason' => 'HR Office Disapprove Reason',
    ];

    public function submit(){
        // $this->validate();
        $leaveRequest = Leaverequest::findOrFail($this->index);


        $loggedInUser = auth()->user();
        $Names = Employee::select('first_name', 'middle_name', 'last_name')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;
        $targetUser = User::where('employee_id', $leaveRequest->employee_id)->first();

        $properties = [
            'auth_off_sig_a' => ['required_with:human_resource_verdict_a|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120', 'department_head_verdict'],
            'auth_off_sig_b' => ['required_with:department_head_verdict|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120', 'human_resource_verdict_a'],
            'auth_off_sig_c_and_d' => ['required_with:human_resource_verdict_cd|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120', 'human_resource_verdict_cd'],
        ];

        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
        // Check if the current property value is a string or an uploaded file                
                if (is_string($this->$propertyName)) {
                    // If it's a string, assign it directly
                    $leaveRequest->$propertyName = $this->$propertyName;
                }
                else if($this->$propertyName == null){
                    if($propertyName == "auth_off_sig_a")
                        $this->validate([$propertyName => 'required_with:human_resource_verdict_a']);
                    else if ($propertyName == 'auth_off_sig_b')
                        $this->validate([$propertyName => 'required_with:department_head_verdict']);
                    else if ($propertyName == 'auth_off_sig_c_and_d')
                        $this->validate([$propertyName => 'required_with:human_resource_verdict_a']);
                }
                else {
                    // If it's an uploaded file, store it and apply validation rules
                    if($this->$propertyName){
                        $name_of_verdict = $validationRule[1];
                        $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Leave Request', 'Signed', $leaveRequest->id, $signedIn, $this->$name_of_verdict == 'Approved' ? 1 : 0));
                    }
                    $leaveRequest->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/leaverequest/' . $propertyName, 'local') : '';
                    $this->validate([$propertyName => $validationRule[0]]);
                }
                
        }

        if(isset($this->department_head_verdict)){
            $this->validate(['head_disapprove_reason' => 'required_if:department_head_verdict,Declined']);
            if($this->department_head_verdict == "Approved"){
                $leaveRequest->department_head_verdict = 1;
            } else{
                $leaveRequest->department_head_verdict = 0;
                $leaveRequest->head_disapprove_reason = $this->head_disapprove_reason;
            }
        }

        if(isset($this->human_resource_verdict_a)){
            if($this->human_resource_verdict_a == "Approved"){
                $leaveRequest->human_resource_verdict_a = 1;
            } else{
                $leaveRequest->human_resource_verdict_a = 0;
                $leaveRequest->hr_a_disapprove_reason = $this->hr_a_disapprove_reason;

            }
        }
        if(isset($this->human_resource_verdict_cd)){
            $this->validate(['hr_cd_disapprove_reason' => 'required_if:human_resource_verdict_cd,Declined']);
            if($this->human_resource_verdict_cd == "Approved"){
                $leaveRequest->human_resource_verdict_cd = 1;
            } else{
                $leaveRequest->human_resource_verdict_cd = 0;
                $leaveRequest->hr_cd_disapprove_reason = $this->hr_cd_disapprove_reason;
            }
        }

       
       
        if($leaveRequest->human_resource_verdict_cd == 1 && $leaveRequest->human_resource_verdict_a == 1 && $leaveRequest->department_head_verdict == 1 ){
            if($leaveRequest->auth_off_sig_b && $leaveRequest->auth_off_sig_a && $leaveRequest->auth_off_sig_c_and_d){
                $leaveRequest->status = "Approved";
            }
        } else if($leaveRequest->human_resource_verdict_cd == 0 || $leaveRequest->human_resource_verdict_a == 0 || $leaveRequest->department_head_verdict == 0 ){
            if($leaveRequest->auth_off_sig_b && $leaveRequest->auth_off_sig_a && $leaveRequest->auth_off_sig_c_and_d){
                $leaveRequest->status = "Declined";
            }
        } else {
            $leaveRequest->status = "Pending";
        }


        $this->js("alert('Leave Request Status Updated!')"); 

        $leaveRequest->update();

        return redirect()->to(route('ApproveLeaveRequestTable'));

    }

    public function render()
    {
        return view('livewire.approverequests.leaverequest.approve-leave-request-form')->extends('layouts.app');
    }
}
