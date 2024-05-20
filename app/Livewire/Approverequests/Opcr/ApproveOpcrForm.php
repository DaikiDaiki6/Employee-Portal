<?php

namespace App\Livewire\Approverequests\Opcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use App\Models\Opcr;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SignedNotifcation;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveOpcrForm extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $employeeRecordDate; 

    public $index;

    // #[Locked]
    public $coreFunctions;
    public $supportiveFunctions;
    public $opcrIndex;
    public $opcrData;

    public $employee_id;
    public $opcr_type;
    public $date_of_filling;
    public $position;
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
    public $assessed_by_verdict;
    public $assessed_by_date;
    public $final_rating;
    public $final_rating_by;
    public $final_rating_by_verdict;    
    public $final_rating_by_date;
    public $department_name;
    public $department_head;

   

    // public function boot(){
    //     $this->dispatch('app:scroll-to', [
    //         'query' => '#start_period',
    //     ]);
     
    // }

    public function addCoreFunction(){
        $this->coreFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
    }

    public function addSupportiveFunction(){
        $this->supportiveFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
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


    public function updated($key, $value)
    {
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
        $this->final_rating = ( $this->core_rating + $this->supp_admin_rating) / 2; 
        $this->final_average_rating = $this->final_rating;
    }

    public function mount($index){
        
        $loggedInUser = auth()->user();

        $type = 'Approve';
        try {
            $opcrData = $this->editOpcr($index);
            $this->authorize('update', [$opcrData ,  $type]);
        } catch (AuthorizationException $e) {
            abort(404);
        }
        
        $this->employeeRecord = Employee::select('department_id')
                    ->where('employee_id', $opcrData->employee_id)
                    ->get();
        $this->department_name = $this->employeeRecord[0]->department_id;
        $this->department_head = $this->employeeRecord[0]->department_id;
        $this->index = $index;
        $this->opcrIndex = $index;
       
        $dateToday = Carbon::now()->toDateString();
       
        $this->opcr_type = $opcrData->opcr_type;
        $this->date_of_filling = $opcrData->date_of_filling;
        $this->ratee = $opcrData->ratee;
        $this->start_period = $opcrData->start_period;
        $this->end_period = $opcrData->end_period;
        $coreData = json_decode($opcrData->core_functions, true);
        $suppData = json_decode($opcrData->supp_admin_functions, true);
        // dd($coreData);
        $this->coreFunctions = $coreData;
        $this->core_rating = $opcrData->core_rating;
        $this->supportiveFunctions = $suppData;
        $this->supp_admin_rating = $opcrData->supp_admin_rating;
        $this->final_average_rating = $opcrData->final_average_rating;
        $this->comments_and_reco = $opcrData->comments_and_reco;
        $this->discussed_with = $opcrData->discussed_with;
        $this->disscused_with_date = $opcrData->disscused_with_date;
        $this->assessed_by = $opcrData->assessed_by;
        $this->assessed_by_verdict = $opcrData->assessed_by_verdict;
        $this->assessed_by_date =  $opcrData->assessed_by_date;
        $this->final_rating = $opcrData->final_rating;
        $this->final_rating_by = $opcrData->final_rating_by;
        $this->final_rating_by_verdict = $opcrData->final_rating_by_verdict;
        // dd($opcrData->final_rating_by_date);
        $this->final_rating_by_date = $opcrData->final_rating_by_date;
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

    public function editOpcr($index){
        $opcr = Opcr::findOrFail($index);
        $this->opcrData = $opcr;
        return Opcr::findOrFail($index);
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
        // 'comments_and_reco' => 'required|min:10|max:2048', 
        // 'assessed_by_verdict' => 'required|in:1,0',
        // 'final_rating_by_verdict' => 'required|in:1,0',
        // // 'disscused_with_date' => 'required|date',
        // 'assessed_by_date' => 'required|date|after_or_equal:start_period',
        // // 'final_rating' => 'required|numeric',
        // 'final_rating_by_date' => 'required|date|after_or_equal:start_period',
    ];

       protected $validationAttributes = [
        'coreFunctions.*.output' => 'core output',
        'coreFunctions.*.indicator' => 'core indicator',
        'coreFunctions.*.accomp' => 'core acccomplishment',
        'coreFunctions.*.weight' => 'core weight',
        'coreFunctions.*.remark' => 'core remark',
        'coreFunctions.*.Q' => 'Q',
        'coreFunctions.*.E' => 'E',
        'coreFunctions.*.T' => 'T',
        'coreFunctions.*.A' => 'A',
        'supportiveFunctions.*.output' => 'supportive output',
        'supportiveFunctions.*.indicator' => 'supportive indicator',
        'supportiveFunctions.*.accomp' => 'supportive accomplishment',
        'supportiveFunctions.*.weight' => 'supportive weight',
        'supportiveFunctions.*.remark' => 'supportive remark',
        'supportiveFunctions.*.Q' => 'Q',
        'supportiveFunctions.*.E' => 'E',
        'supportiveFunctions.*.T' => 'T',
        'supportiveFunctions.*.A' => 'A',
    ];

    protected $messages = [
        'start_period.before' => 'The Start period must be a date before end period.',
    ];


    public function submit(){

        $this->validate();
        $loggedInUser = auth()->user();
        $opcr = Opcr::findOrFail($this->index);

        // $opcr->employee_id = $loggedInUser->employee_id;
        // $opcr->opcr_type = $this->opcr_type;
        // $opcr->date_of_filling = $this->date_of_filling;
        // // $opcr->department_name = $this->department_name;
        // // $opcr->department_head = $this->department_head;
        // $opcr->start_period = $this->start_period;
        // $opcr->end_period = $this->end_period;
        // $opcr->ratee = $this->ratee;
        // $opcr->core_rating = $this->core_rating;
        // $opcr->supp_admin_rating = $this->supp_admin_rating;
        // $opcr->final_average_rating = $this->final_average_rating;
        // $opcr->comments_and_reco = $this->comments_and_reco;

        $properties = [
            'assessed_by'  => 'required_unless:assessed_by_verdict,null|nullable|sometimes|mimes:jpg,png|extensions:jpg,png|max:5120' ,
            'final_rating_by'  => 'required_unless:final_rating_by_verdict,null|nullable|mimes:jpg,png|extensions:jpg,png|max:5120',
        ];

        $Names = Employee::select('first_name', 'middle_name', 'last_name')
            ->where('employee_id', $loggedInUser->employee_id)
            ->first();
        $signedIn = $Names->first_name. ' ' .  $Names->middle_name. ' '. $Names->last_name;

        $targetUser = User::where('employee_id', $opcr->employee_id)->first();
 
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                // $this->validate([$propertyName => $validationRule]);
                $this->validate([$propertyName => 'String']);
                $nameOfProperty = $propertyName.'_verdict';
                $opcr->$nameOfProperty = $this->$nameOfProperty;
                $opcr->$propertyName = $this->$propertyName;
            } else if(is_null($this->$propertyName)){
                $this->validate([$propertyName => $validationRule]);
                $nameOfProperty = $propertyName.'_verdict';
                $opcr->$nameOfProperty = $this->$nameOfProperty;
                $opcr->$propertyName = $this->$propertyName;
            } 
            else {
                $this->validate([$propertyName => $validationRule]);
                $nameOfProperty = $propertyName.'_verdict';
                $opcr->$nameOfProperty = $this->$nameOfProperty;
                $opcr->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/opcr/' . $propertyName, 'local') : '';
                if($this->$propertyName){
                    $targetUser->notify(new SignedNotifcation($loggedInUser->employee_id, 'Opcr', 'Signed', $opcr->id, $signedIn, $opcr->$nameOfProperty));
                }
            }
        }

        $verdictProperties = [
            'assessed_by_verdict'  => 'required_unless:assessed_by,null|nullable|in:1,0' ,
            'final_rating_by_verdict'  => 'required_unless:final_rating_by,null|nullable|in:1,0',
        ];

         // Iterate over the properties
        foreach ($verdictProperties as $propertyName => $validationRule) {
            $opcr->$propertyName = $this->$propertyName; 
            $this->validate([$propertyName => $validationRule]);
        }

        $dateProperties = [
            'assessed_by_date'  => 'required_unless:assessed_by,null|required_unless:assessed_by_verdict,null|nullable|date' ,
            'final_rating_by_date'  => 'required_unless:final_rating_by,null|required_unless:final_rating_by_verdict,null|nullable|date',
        ];

         // Iterate over the properties
         foreach ($dateProperties as $propertyName => $validationRule) {
            $opcr->$propertyName = $this->$propertyName; 
            $this->validate([$propertyName => $validationRule]);
        }

        if($opcr->assessed_by_verdict == 1 && $opcr->final_rating_by_verdict == 1){
            if($opcr->final_rating_by &&  $opcr->assessed_by){
                $opcr->status = "Approved";
            }
        } else if ($opcr->assessed_by_verdict == 0 || $opcr->final_rating_by_verdict == 0){
            if($opcr->final_rating_by &&  $opcr->assessed_by){
                $opcr->status = "Declined";
            }
        } else {
            $opcr->status = "Pending";
        }

        $opcr->disscused_with_date = $this->disscused_with_date;
        $opcr->assessed_by_date = $this->assessed_by_date;
        $opcr->final_rating = $this->final_rating;
        $opcr->final_rating_by_date = $this->final_rating_by_date;
        
        // $jsonCoreData = [];
        // $jsonSupportiveData = [];
        
        // if($opcr->opcr_type == 'target'){
        //     foreach($this->coreFunctions as $coreFunction){
        //         $jsonCoreData[] = [
        //             'output' => $coreFunction['output'],
        //             'indicator' => $coreFunction['indicator'],
        //             'accomp' => $coreFunction['accomp'],
        //             'budget' => $coreFunction['budget'],
        //             'personsConcerned' => $coreFunction['personsConcerned'],
        //             'Q' => $coreFunction['Q'],
        //             'E' => $coreFunction['E'],
        //             'T' => $coreFunction['T'],
        //             'A' => $coreFunction['A'],
        //         ];
        //     }
    
        //     foreach($this->supportiveFunctions as $supportiveFunction){
        //         $jsonSupportiveData[] = [
        //             'output' => $coreFunction['output'],
        //             'indicator' => $coreFunction['indicator'],
        //             'accomp' => $coreFunction['accomp'],
        //             'budget' => $coreFunction['budget'],
        //             'personsConcerned' => $coreFunction['personsConcerned'],
        //             'Q' => $coreFunction['Q'],
        //             'E' => $coreFunction['E'],
        //             'T' => $coreFunction['T'],
        //             'A' => $coreFunction['A'],
        //         ];
        //     }
        // } else{
        //     foreach($this->coreFunctions as $coreFunction){
        //         $jsonCoreData[] = [
        //             'output' => $coreFunction['output'],
        //             'indicator' => $coreFunction['indicator'],
        //             'accomp' => $coreFunction['accomp'],
        //             'budget' => $coreFunction['budget'],
        //             'personsConcerned' => $coreFunction['personsConcerned'],
        //             'Q' => $coreFunction['Q'],
        //             'E' => $coreFunction['E'],
        //             'T' => $coreFunction['T'],
        //             'A' => $coreFunction['A'],
        //         ];
        //     }
    
        //     foreach($this->supportiveFunctions as $supportiveFunction){
        //         $jsonSupportiveData[] = [
        //             'output' => $supportiveFunction['output'],
        //             'indicator' => $supportiveFunction['indicator'],
        //             'accomp' => $supportiveFunction['accomp'],
        //             'budget' => $supportiveFunction['budget'],
        //             'personsConcerned' => $supportiveFunction['personsConcerned'],
        //             'Q' => $supportiveFunction['Q'],
        //             'E' => $supportiveFunction['E'],
        //             'T' => $supportiveFunction['T'],
        //             'A' => $supportiveFunction['A'],
        //         ];
        //     }

        // }

        // $jsonCoreData = json_encode($jsonCoreData);
        // $jsonSupportiveData = json_encode($jsonSupportiveData);

        // $opcr->core_functions = $jsonCoreData;
        // $opcr->supp_admin_functions = $jsonSupportiveData;

        $this->js("alert('Opcr Updated!')"); 
        
        $opcr->update();

        return redirect()->to(route('ApproveOpcrTable'));

    }
    public function render()
    {   
       
        return view('livewire.approverequests.opcr.approve-opcr-form')->extends('layouts.app');
    }


}
