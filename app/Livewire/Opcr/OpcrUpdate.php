<?php

namespace App\Livewire\Opcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use App\Models\Opcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class OpcrUpdate extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $employeeRecordDate; 
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
    public $assessed_by_date;
    public $final_rating;
    public $final_rating_by;
    public $final_rating_by_date;
    public $department_name;
    public $department_head;

    public function addCoreFunction(){
        $this->coreFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'budget' => '', 'personsConcerned' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
    }

    public function addSupportiveFunction(){
        $this->supportiveFunctions[] = ['output' => '', 'indicator' => '', 'accomp' => '', 'budget' => '', 'personsConcerned' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => ''];
    }

    public function removeImage($item){
        $this->$item = null;
    }

    public function removeCoreFunction($index){
        unset($this->coreFunctions[$index]);
        $this->coreFunctions = array_values($this->coreFunctions);
        $this->dispatch('update-core-functions', [json_encode($this->coreFunctions, true)]);

        $sum = 0;
        $indexCount = count($this->coreFunctions); // Count the number of items in the array
        if ($indexCount > 0) { // Check if there are items in the array
            foreach ($this->coreFunctions ?? [] as $core_function){
                $sum += (int) $core_function['Q'] ?? 1;
                $sum += (int) $core_function['E'] ?? 1;
                $sum += (int) $core_function['T'] ?? 1;
                $sum += (int) $core_function['A'] ?? 1;
            }
            $this->core_rating = $sum / ($indexCount * 4); // Perform division if $indexCount is not zero
        } else {
            $this->core_rating = 0; // Set to zero if $indexCount is zero to avoid division by zero
        }
        $this->final_rating = ( $this->core_rating * 0.70 + $this->supp_admin_rating * 0.20); 
        $this->final_average_rating = $this->final_rating;
    }

    public function removeSupportiveFunction($index){
        unset($this->supportiveFunctions[$index]);
        $this->supportiveFunctions = array_values($this->supportiveFunctions);
        $this->dispatch('update-supportive-functions', [json_encode($this->supportiveFunctions, true)]);

        $sum = 0;
        $indexCount = count($this->supportiveFunctions); // Count the number of items in the array
        if ($indexCount > 0) { // Check if there are items in the array
            foreach ($this->supportiveFunctions ?? [] as $supp_function){
                $sum += (int) $supp_function['Q'] ?? 1;
                $sum += (int) $supp_function['E'] ?? 1;
                $sum += (int) $supp_function['T'] ?? 1;
                $sum += (int) $supp_function['A'] ?? 1;
            }
            $this->supp_admin_rating = $sum / ($indexCount * 4); // Perform division if $indexCount is not zero
        } else {
            $this->supp_admin_rating = 0; // Set to zero if $indexCount is zero to avoid division by zero
        }
        $this->final_rating = ( $this->core_rating * 0.70 + $this->supp_admin_rating * 0.20); 
        $this->final_average_rating = $this->final_rating;
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
        $this->final_rating = ( $this->core_rating * 0.70 + $this->supp_admin_rating * 0.20); 
        $this->final_average_rating = $this->final_rating;
    }
    

    public function mount($index){

        try {
            $this->opcrIndex = $index;
            $opcrData = $this->editOpcr($index);
            $this->authorize('update', [$opcrData]);
        } catch (AuthorizationException $e) {
            abort(404);
        }

        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('department_id')
                    ->where('employee_id', $loggedInUser->employee_id)
                    ->get();
        $this->department_name = $this->employeeRecord[0]->department_id;
        $this->department_head = $this->employeeRecord[0]->department_id;
        $dateToday = Carbon::now()->toDateString();
        $this->opcr_type = $opcrData->opcr_type;
        $this->date_of_filling = $opcrData->date_of_filling;
        $this->ratee = $opcrData->ratee;
        $this->start_period = $opcrData->start_period;
        $this->end_period = $opcrData->end_period;
        $coreData = json_decode($opcrData->core_functions, true);
        $suppData = json_decode($opcrData->supp_admin_functions, true);
        $this->coreFunctions = $coreData;
        $this->core_rating = $opcrData->core_rating;
        $this->supportiveFunctions = $suppData;
        $this->supp_admin_rating = $opcrData->supp_admin_rating;
        $this->final_average_rating = $opcrData->final_average_rating;
        $this->comments_and_reco = $opcrData->comments_and_reco;
        $this->discussed_with = $opcrData->discussed_with;
        $this->disscused_with_date = $opcrData->disscused_with_date;
        // $this->assessed_by = $opcrData->assessed_by;
        // $this->assessed_by_date =  $opcrData->assessed_by_date;
        // $this->final_rating = $opcrData->final_rating;
        // $this->final_rating_by = $opcrData->final_rating_by;
        // $this->final_rating_by_date = $opcrData->final_rating_by_date;
    }

    public function getDiscussedWith(){
        return Storage::disk('local')->get($this->discussed_with);
    }

    // public function getAssessedBy(){
    //     return Storage::disk('local')->get($this->assessed_by);
    // }

    // public function getFinalRatingBy(){
    //     return Storage::disk('local')->get($this->final_rating_by);
    // }

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
        'coreFunctions.*.weight' => 'required_if:opcr_type,rated|numeric|min:1|max:100',
        'coreFunctions.*.remark' => 'required_if:opcr_type,rated|min:10',
        'coreFunctions.*.budget' => 'required|numeric|min:1|max:9999999999',
        'coreFunctions.*.personsConcerned' => 'required|min:10',
        'coreFunctions.*.Q' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.E' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.T' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.A' => 'required|numeric|min:1|max:5',
        'core_rating' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.output' => 'required|min:10|max:2048',
        'supportiveFunctions.*.indicator' => 'required|min:10|max:2048',
        'supportiveFunctions.*.accomp' => 'required|min:10|max:2048',
        'supportiveFunctions.*.weight' => 'required_if:opcr_type,rated|numeric|min:1|max:100',
        'supportiveFunctions.*.remark' => 'required_if:opcr_type,rated|required_if:opcr_type,ratedmin:10',
        'supportiveFunctions.*.budget' => 'required|numeric|min:1|max:9999999999',
        'supportiveFunctions.*.personsConcerned' => 'required|min:10',
        'supportiveFunctions.*.Q' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.E' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.T' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.A' => 'required|numeric|min:1|max:5',
        'supp_admin_rating' => 'required|numeric|min:1|max:5',
        'final_average_rating' => 'required|numeric|min:1|max:5',
        // 'comments_and_reco' => 'required|min:10|max:2048', 
        // 'discussed_with' => 'required|mimes:jpg,png|extensions:jpg,png',
        'disscused_with_date' => 'required|date|after_or_equal:start_period',
        // 'assessed_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        // 'assessed_by_date' => 'required|date',
        // 'final_rating' => 'required|numeric',
        // 'final_rating_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        // 'final_rating_by_date' => 'required|date',
    ];

    protected $validationAttributes = [
        'coreFunctions.*.output' => 'Core output',
        'coreFunctions.*.indicator' => 'Core indicator',
        'coreFunctions.*.accomp' => 'Core acccomplishment',
        'coreFunctions.*.weight' => 'Core weight',
        'coreFunctions.*.remark' => 'Core remark',
        'coreFunctions.*.budget' => 'Budget',
        'coreFunctions.*.personsConcerned' => 'Persons concerned',
        'coreFunctions.*.Q' => 'Q',
        'coreFunctions.*.E' => 'E',
        'coreFunctions.*.T' => 'T',
        'coreFunctions.*.A' => 'A',
        'supportiveFunctions.*.output' => 'Supportive output',
        'supportiveFunctions.*.indicator' => 'Supportive indicator',
        'supportiveFunctions.*.accomp' => 'Supportive accomplishment',
        'supportiveFunctions.*.weight' => 'Supportive weight',
        'supportiveFunctions.*.remark' => 'Supportive remark',
        'supportiveFunctions.*.budget' => 'Budget',
        'supportiveFunctions.*.personsConcerned' => 'Persons concerned',
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
        $opcr = Opcr::findOrFail($this->opcrIndex);

        $opcr->employee_id = $loggedInUser->employee_id;
        $opcr->opcr_type = $this->opcr_type;
        $opcr->date_of_filling = $this->date_of_filling;
        // $opcr->department_id = $this->department_name;
        // $opcr->department_head = $this->department_head;
        $opcr->start_period = $this->start_period;
        $opcr->end_period = $this->end_period;
        $opcr->ratee = $this->ratee;
        $opcr->core_rating = $this->core_rating;
        $opcr->supp_admin_rating = $this->supp_admin_rating;
        $opcr->final_average_rating = $this->final_average_rating;
        $opcr->comments_and_reco = $this->comments_and_reco;

        $properties = [
            // 'assessed_by' => 'mimes:jpg,png|extensions:jpg,png',
            // 'final_rating_by' => 'mimes:jpg,png|extensions:jpg,png',
            'discussed_with' => 'mimes:jpg,png|extensions:jpg,png|max:5120',
        ];
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                $opcr->$propertyName = $this->$propertyName;
            } else {
                // If it's an uploaded file, store it and apply validation rules
                $opcr->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/opcr' . $propertyName, 'local') : '';
                $this->validate([$propertyName => $validationRule]);
            }
        }

        $opcr->disscused_with_date = $this->disscused_with_date;
        $opcr->assessed_by_date = $this->assessed_by_date;
        $opcr->final_rating = $this->final_rating;
        $opcr->final_rating_by_date = $this->final_rating_by_date;
        
        $jsonCoreData = [];
        $jsonSupportiveData = [];
        
        if($opcr->opcr_type == 'target'){
            foreach($this->coreFunctions as $coreFunction){
                $jsonCoreData[] = [
                    'output' => $coreFunction['output'],
                    'indicator' => $coreFunction['indicator'],
                    'accomp' => $coreFunction['accomp'],
                    'budget' => $coreFunction['budget'],
                    'personsConcerned' => $coreFunction['personsConcerned'],
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
                    'budget' => $supportiveFunction['budget'],
                    'personsConcerned' => $supportiveFunction['personsConcerned'],
                    'Q' => $supportiveFunction['Q'],
                    'E' => $supportiveFunction['E'],
                    'T' => $supportiveFunction['T'],
                    'A' => $supportiveFunction['A'],
                ];
            }
        } else{
            foreach($this->coreFunctions as $coreFunction){
                $jsonCoreData[] = [
                    'output' => $coreFunction['output'],
                    'indicator' => $coreFunction['indicator'],
                    'accomp' => $coreFunction['accomp'],
                    'budget' => $coreFunction['budget'],
                    'personsConcerned' => $coreFunction['personsConcerned'],
                    'weight' => $coreFunction['weight'],
                    'remark' => $coreFunction['remark'],
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
                    'budget' => $supportiveFunction['budget'],
                    'personsConcerned' => $supportiveFunction['personsConcerned'],
                    'weight' => $supportiveFunction['weight'],
                    'remark' => $supportiveFunction['remark'],
                    'Q' => $supportiveFunction['Q'],
                    'E' => $supportiveFunction['E'],
                    'T' => $supportiveFunction['T'],
                    'A' => $supportiveFunction['A'],
                ];
            }

        }

        $jsonCoreData = json_encode($jsonCoreData);
        $jsonSupportiveData = json_encode($jsonSupportiveData);

        $opcr->core_functions = $jsonCoreData;
        $opcr->supp_admin_functions = $jsonSupportiveData;

        $this->js("alert('Opcr Updated!')"); 
        // session()->flash('status', 'Ipcr successfully submitted.');

        // Ipcr::create($opcr);
        $opcr->update();

        return redirect()->to(route('OpcrTable'));

    }
    
    public function render()
    {
        return view('livewire.opcr.opcr-update')->extends('layouts.app');
    }

   
}
