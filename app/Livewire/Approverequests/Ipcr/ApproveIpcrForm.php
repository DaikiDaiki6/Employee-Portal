<?php

namespace App\Livewire\Approverequests\Ipcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Notifications\IpcrNotification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveIpcrForm extends Component
{
    use WithFileUploads;
    

    public $employeeRecord;
    public $employeeRecordDate; 
    public $coreFunctions;
    public $supportiveFunctions;
    public $index;

    public $employee_id;
    public $ipcr_type;
    public $date_of_filling;
    // public $position;
    public $start_period;
    public $end_period;
    public $ratee;
    public $core_functions;
    public $core_rating;
    public $supp_admin_functions;
    public $supp_admin_rating;
    public $final_average_rating;
    public $comments_and_reco;
    public $discussed_with;
    public $disscused_with_date;
    public $assessed_by;
    public $assessed_by_date;

    public $assessed_by_verdict;
    public $final_rating;
    public $final_rating_by;
    public $final_rating_by_verdict;
    public $final_rating_by_date;
    public $images;
    public $ipcrData;
    public $ipcrIndex;

    public $dateToday;

    public function mount($index){

        $type = 'Approve';
        try {
            $this->ipcrIndex = $index;
            $ipcrData = $this->editIpcr($index);
            $this->authorize('update', [$ipcrData ,  $type]);
        } catch (AuthorizationException $e) {
            abort(404);
        }
        
        $this->ipcr_type = $ipcrData->ipcr_type;
        $this->date_of_filling = $ipcrData->date_of_filling;
        $this->ratee = $ipcrData->ratee;
        $this->start_period = $ipcrData->start_period;
        $this->end_period = $ipcrData->end_period;
        $coreData = json_decode($ipcrData->core_functions, true);
        $suppData = json_decode($ipcrData->supp_admin_functions, true);
        $this->coreFunctions = $coreData;
        $this->core_rating = $ipcrData->core_rating;
        $this->supportiveFunctions = $suppData;
        $this->supp_admin_rating = $ipcrData->supp_admin_rating;
        $this->final_average_rating = $ipcrData->final_average_rating;
        $this->comments_and_reco = $ipcrData->comments_and_reco;
        $this->discussed_with = $ipcrData->discussed_with;
        $this->disscused_with_date = $ipcrData->disscused_with_date;

        $dateToday = Carbon::now()->toDateString();

        $this->assessed_by = $ipcrData->assessed_by;
        $this->assessed_by_date =  $ipcrData->assessed_by_date ;
        $this->assessed_by_verdict = $ipcrData->assessed_by_verdict;
        $this->final_rating = $ipcrData->final_rating;
        $this->final_rating_by = $ipcrData->final_rating_by;
        $this->final_rating_by_verdict = $ipcrData->final_rating_by_verdict;
        $this->final_rating_by_date = $ipcrData->final_rating_by_date ;

        // $this->coreFunctions = [
        //     ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => '']
        // ];
        // $this->supportiveFunctions = [
        //     ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => '']
        // ];
    }


    public function addCoreFunction(){
        $this->coreFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'weight' => ' ', 'remark' => ' ', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
    }

    public function addSupportiveFunction(){
        $this->supportiveFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'weight' => ' ', 'remark' => ' ', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function removeCoreFunction($index){
        // unset($this->coreFunctions[$index]);
        $this->coreFunctions = array_values($this->coreFunctions);
    }

    public function removeSupportiveFunction($index){
        // unset($this->supportiveFunctions[$index]);
        $this->supportiveFunctions = array_values($this->supportiveFunctions);
    }

    public function getDiscussedWith(){
        return Storage::disk('local')->get($this->discussed_with);
    }

    public function getAssessedBy(){
        return Storage::disk('local')->get($this->assessed_by);
    }

    public function getFinalRatingBy(){
        return Storage::disk('local')->get($this->final_rating_by);
    }

    public function editIpcr($index){
        $ipcr = Ipcr::findOrFail($index);
        $this->ipcrData = $ipcr;
        // return Ipcr::findOrFail($index);
        return $ipcr;
    }

    public function updated($key)
    {
        $this->resetValidation($key);
        $this->resetErrorBag($key);
        $this->validateOnly($key);
        
        $parts = explode('.', $key);

        if ($parts[0] === 'coreFunctions' && count($parts) >= 3) {
            $lastPart = end($parts);
            if (in_array($lastPart, ['Q', 'E', 'T', 'A'])) {
                if($this->coreFunctions != null){
                    $sum = 0;
                    $index = 0;
                    foreach ($this->coreFunctions ?? [] as $core_function){
                        $sum += (int) $core_function['Q'] ?? 1;
                        $sum += (int) $core_function['E'] ?? 1;
                        $sum += (int) $core_function['T'] ?? 1;
                        $sum += (int) $core_function['A'] ?? 1;
                        $index += 1;
                    }
                    $this->core_rating = $sum / ($index * 4);
                    // $this->reset('core_rating');
                    // dd($this->core_rating);
                }
            }
        }
        if ($parts[0] === 'supportiveFunctions' && count($parts) >= 3) {
            $lastPart = end($parts);
            if (in_array($lastPart, ['Q', 'E', 'T', 'A'])) {
                if($this->supportiveFunctions != null){
                    $sum = 0;
                    $index = 0;
                    foreach ($this->supportiveFunctions ?? [] as $supp_function){
                        $sum += (int) $supp_function['Q'] ?? 1;
                        $sum += (int) $supp_function['E'] ?? 1;
                        $sum += (int) $supp_function['T'] ?? 1;
                        $sum += (int) $supp_function['A'] ?? 1;
                        $index += 1;
                    }
                    $this->supp_admin_rating = $sum / ($index * 4);
                }
            }
        }
        // dd($key, $this->core_rating);
        $this->final_rating = ($this->core_rating + $this->supp_admin_rating) / 2; 
        $this->final_average_rating = $this->final_rating;
        
    }
    
    protected $rules = [
        'date_of_filling' => 'required',
        'start_period' => 'required|before_or_equal:end_period|after_or_equal:date_of_filling',
        'end_period' => 'required|after_or_equal:start_period',
        'ratee' => 'required|min:2|max:256',
        'coreFunctions.*.output' => 'required|min:10|max:2048',
        'coreFunctions.*.indicator' => 'required|min:10|max:2048',
        'coreFunctions.*.accomp' => 'required|min:10|max:2048',
        'coreFunctions.*.weight' => 'numeric',
        'coreFunctions.*.remark' => 'min:10|max:2048',
        'core_rating' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.output' => 'required|min:10|max:2048',
        'supportiveFunctions.*.indicator' => 'required|min:10|max:2048',
        'supportiveFunctions.*.accomp' => 'required|min:10|max:2048',
        'supportiveFunctions.*.weight' => 'numeric',
        'supportiveFunctions.*.remark' => 'min:10|max:2048',
        'supp_admin_rating' => 'required|numeric|min:1|max:5',
        'final_average_rating' => 'required|numeric|min:1|max:5',
        'comments_and_reco' => 'nullable|min:10|max:2048', 
        // 'assessed_by_verdict' => 'required|in:1,0',
        // 'final_rating_by_verdict' => 'required|in:1,0',
        // 'disscused_with_date' => 'required|date',
        // 'assessed_by_date' => 'required|date|after_or_equal:start_period',
        // 'final_rating' => 'required|numeric',
        // 'final_rating_by_date' => 'required|date|after_or_equal:start_period',
    ];

    public function submit(){

        $this->validate();

        $loggedInUser = auth()->user();

        $ipcr = $this->editIpcr($this->index);
        $ipcr->core_rating = $this->core_rating;
        $ipcr->supp_admin_rating = $this->supp_admin_rating;
        $ipcr->final_average_rating = $this->final_average_rating;
        $ipcr->comments_and_reco = $this->comments_and_reco;
        
        $Names = Employee::select('first_name', 'middle_name', 'last_name')
                    ->where('employee_id', $loggedInUser->employee_id)
                    ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;
        
        $targetUser = User::where('employee_id', $ipcr->employee_id)->first();

        $properties = [
            'assessed_by'  => 'required_unless:assessed_by_verdict,null|nullable|mimes:jpg,png|extensions:jpg,png|max:5120' ,
            'final_rating_by'  => 'required_unless:final_rating_by_verdict,null|nullable|mimes:jpg,png|extensions:jpg,png|max:5120',
        ];
        
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                // $this->validate([$propertyName => $validationRule]);
                $this->validate([$propertyName => 'String']);
                $nameOfProperty = $propertyName.'_verdict';
                $ipcr->$nameOfProperty = $this->$nameOfProperty;
                $ipcr->$propertyName = $this->$propertyName;
            } else if(is_null($this->$propertyName)){
                $this->validate([$propertyName => $validationRule]);
                $nameOfProperty = $propertyName.'_verdict';
                $ipcr->$nameOfProperty = $this->$nameOfProperty;
                $ipcr->$propertyName = $this->$propertyName;
            } 
            else {
                $this->validate([$propertyName => $validationRule]);
                $nameOfProperty = $propertyName.'_verdict';
                $ipcr->$nameOfProperty = $this->$nameOfProperty;
                $ipcr->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/ipcr/' . $propertyName, 'local') : '';
                if($this->$propertyName){
                    $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Ipcr', 'Signed', $ipcr->id, $signedIn, $ipcr->$nameOfProperty));
                }
            }
        }

        $verdictProperties = [
            'assessed_by_verdict'  => 'required_unless:assessed_by,null|nullable|in:1,0' ,
            'final_rating_by_verdict'  => 'required_unless:final_rating_by,null|nullable|in:1,0',
        ];

         // Iterate over the properties
        foreach ($verdictProperties as $propertyName => $validationRule) {
            $ipcr->$propertyName = $this->$propertyName; 
            $this->validate([$propertyName => $validationRule]);
        }

        $dateProperties = [
            'assessed_by_date'  => 'required_unless:assessed_by,null|required_unless:assessed_by_verdict,null|nullable|date' ,
            'final_rating_by_date'  => 'required_unless:final_rating_by,null|required_unless:final_rating_by_verdict,null|nullable|date',
        ];

         // Iterate over the properties
         foreach ($dateProperties as $propertyName => $validationRule) {
            $ipcr->$propertyName = $this->$propertyName; 
            $this->validate([$propertyName => $validationRule]);
        }

        $ipcr->assessed_by_date = $this->assessed_by_date;
        $ipcr->final_rating = $this->final_rating;       
        $ipcr->final_rating_by_date = $this->final_rating_by_date;
        
        if($ipcr->assessed_by_verdict == 1 && $ipcr->final_rating_by_verdict == 1){
            if($ipcr->final_rating_by &&  $ipcr->assessed_by){
                $ipcr->status = "Approved";
            }
        } else if ($ipcr->assessed_by_verdict == 0 || $ipcr->final_rating_by_verdict == 0){
            if($ipcr->final_rating_by &&  $ipcr->assessed_by){
                $ipcr->status = "Declined";
            }
        }
        else {
            $ipcr->status = "Pending";
        }

        $jsonCoreData = [];
        $jsonSupportiveData = [];
        
        foreach($this->coreFunctions as $coreFunction){
            $jsonCoreData[] = [
                'output' => $coreFunction['output'],
                'indicator' => $coreFunction['indicator'],
                'accomp' => $coreFunction['accomp'],
                'Q' => $coreFunction['Q'],
                'E' => $coreFunction['E'],
                'T' => $coreFunction['T'],
                'A' => $coreFunction['A'],
            ];
        }

        foreach($this->supportiveFunctions as $supportiveFunction){
            $jsonSupportiveData[] = [
                'output' => $supportiveFunction['output'],
                'indicator' => $supportiveFunction['indicator'],
                'accomp' => $supportiveFunction['accomp'],
                'Q' => $supportiveFunction['Q'],
                'E' => $supportiveFunction['E'],
                'T' => $supportiveFunction['T'],
                'A' => $supportiveFunction['A'],
            ];
        }

        $jsonCoreData = json_encode($jsonCoreData);
        $jsonSupportiveData = json_encode($jsonSupportiveData);


        $ipcr->core_functions = $jsonCoreData;
        $ipcr->supp_admin_functions = $jsonSupportiveData;

        $this->js("alert('Ipcr updated!')"); 
        $ipcr->update();
        return redirect()->to(route('ApproveIpcrTable'));
    }

    public function render()
    {
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name')
                        ->where('employee_id', $loggedInUser->employee_id)
                        ->get();
        return view('livewire.approverequests.ipcr.approve-ipcr-form')->extends('layouts.app');
    }

  
}
