<?php

namespace App\Livewire\Ipcr;

use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class IpcrUpdate extends Component
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
    public $final_rating;
    public $final_rating_by;
    public $final_rating_by_date;
    public $images;
    public $ipcrData;
    public $ipcrIndex;

    public function mount($index){
        $this->ipcrIndex = $index;
        $ipcrData = $this->editIpcr($index);
        try {
            $this->authorize('update', [$ipcrData]);
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
        // dd($this->coreFunctions);
        $this->supportiveFunctions = $suppData;
        $this->supp_admin_rating = $ipcrData->supp_admin_rating;
        $this->final_average_rating = $ipcrData->final_average_rating;
        $this->comments_and_reco = $ipcrData->comments_and_reco;
        $this->discussed_with = $ipcrData->discussed_with;
        $this->disscused_with_date = $ipcrData->disscused_with_date;
        $this->assessed_by = $ipcrData->assessed_by;
        $this->assessed_by_date =  $ipcrData->assessed_by_date;
        $this->final_rating = $ipcrData->final_rating;
        $this->final_rating_by = $ipcrData->final_rating_by;
        $this->final_rating_by_date = $ipcrData->final_rating_by_date;
    
        
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
        unset($this->coreFunctions[$index]);
        $this->coreFunctions = array_values($this->coreFunctions);
        
        $this->dispatch('update-core-functions', [json_encode($this->coreFunctions, true)]);

        // $sum = 0;
        // $index = 0;
        // foreach ($this->coreFunctions ?? [] as $core_function){
        //     $sum += (int) $core_function['Q'] ?? 1;
        //     $sum += (int) $core_function['E'] ?? 1;
        //     $sum += (int) $core_function['T'] ?? 1;
        //     $sum += (int) $core_function['A'] ?? 1;
        //     $index += 1;
        // }
        // $this->core_rating = $sum / ($index * 4) ?? 1;

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
        $this->final_rating = ( $this->core_rating * 0.80 + $this->supp_admin_rating * 0.20); 
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
        $this->final_rating = ( $this->core_rating * 0.80 + $this->supp_admin_rating * 0.20); 
        $this->final_average_rating = $this->final_rating;

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
        return $ipcr;
    }

    public function updated($key)
    {
        $this->resetValidation($key);
        //  $this->resetErrorBag($key);
        // $this->validateOnly($key);
        
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
        $this->final_rating = ( $this->core_rating * 0.80 + $this->supp_admin_rating * 0.20); 
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
        'coreFunctions.*.weight' => 'required_if:ipcr_type,rated|numeric|min:1|max:100',
        'coreFunctions.*.remark' => 'required_if:ipcr_type,rated|min:10',
        'coreFunctions.*.Q' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.E' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.T' => 'required|numeric|min:1|max:5',
        'coreFunctions.*.A' => 'required|numeric|min:1|max:5',
        'core_rating' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.output' => 'required|min:10|max:2048',
        'supportiveFunctions.*.indicator' => 'required|min:10|max:2048',
        'supportiveFunctions.*.accomp' => 'required|min:10|max:2048',
        'supportiveFunctions.*.weight' => 'required_if:ipcr_type,rated|numeric|min:1|max:100',
        'supportiveFunctions.*.remark' => 'required_if:ipcr_type,rated|min:10',
        'supportiveFunctions.*.Q' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.E' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.T' => 'required|numeric|min:1|max:5',
        'supportiveFunctions.*.A' => 'required|numeric|min:1|max:5',
        'supp_admin_rating' => 'required|numeric|min:1|max:5',
        'final_average_rating' => 'required|numeric|min:1|max:5',
        // 'comments_and_reco' => 'required|min:10|max:2048', 
        // 'discussed_with' => 'mimes:jpg,png|extensions:jpg,png',
        'disscused_with_date' => 'required|date|after_or_equal:start_period',
        // 'assessed_by_date' => 'required|date',
        // 'final_rating' => 'required|numeric',
        // 'final_rating_by_date' => 'required|date',
    ];

    public function submit(){

        $this->validate();

        $loggedInUser = auth()->user();

        $ipcr = $this->editIpcr($this->index);
        $ipcr->employee_id = $loggedInUser->employee_id;
        // $ipcr->ipcr_type = $ipcr->ipcr_type;
        $ipcr->date_of_filling = $this->date_of_filling;
        $ipcr->position = $this->employeeRecord[0]->department_name;
        $ipcr->start_period = $this->start_period;
        $ipcr->end_period = $this->end_period;
        $ipcr->ratee = $this->ratee;
        $ipcr->core_rating = $this->core_rating;
        $ipcr->supp_admin_rating = $this->supp_admin_rating;
        $ipcr->final_average_rating = $this->final_average_rating;
        $ipcr->comments_and_reco = $this->comments_and_reco;
        
        $properties = [
            'discussed_with' => 'mimes:jpg,png|extensions:jpg,png|max:5120',
        ];
        // Iterate over the properties
        foreach ($properties as $propertyName => $validationRule) {
            // Check if the current property value is a string or an uploaded file
            if (is_string($this->$propertyName)) {
                // If it's a string, assign it directly
                $ipcr->$propertyName = $this->$propertyName;
            } else {
                // If it's an uploaded file, store it and apply validation rules
                $ipcr->$propertyName = $this->$propertyName ? $this->$propertyName->store('photos/ipcr' . $propertyName, 'local') : '';
                $this->validate([$propertyName => 'mimes:jpg,png|extensions:jpg,png']);
            }
        }

        $ipcr->disscused_with_date = $this->disscused_with_date;       
        $ipcr->assessed_by_date = $this->assessed_by_date;
        $ipcr->final_rating = $this->final_rating;       
        $ipcr->final_rating_by = $this->final_rating_by;
        $ipcr->final_rating_by_date = $this->final_rating_by_date;
        
        $jsonCoreData = [];
        $jsonSupportiveData = [];
        
        if($ipcr->ipcr_type == 'target'){
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
        } else{
            foreach($this->coreFunctions as $coreFunction){
                $jsonCoreData[] = [
                    'output' => $coreFunction['output'],
                    'indicator' => $coreFunction['indicator'],
                    'accomp' => $coreFunction['accomp'],
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


        $ipcr->core_functions = $jsonCoreData;
        $ipcr->supp_admin_functions = $jsonSupportiveData;
        $this->js("alert('Ipcr submitted!')"); 
        $ipcr->update();
        return redirect()->to(route('IpcrTable'));
    }

    public function render()
    {
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('*')
                    ->where('employee_id', $loggedInUser->employee_id)
                    ->get();
        
        return view('livewire.ipcr.ipcr-update')->extends('layouts.app');

    }
    
}
