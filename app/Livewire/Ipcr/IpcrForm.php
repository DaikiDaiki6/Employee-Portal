<?php

namespace App\Livewire\Ipcr;

use Carbon\Carbon;
use App\Models\Ipcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;

class IpcrForm extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $employeeRecordDate; 
    public $coreFunctions;
    public $supportiveFunctions;

    public $employee_id;
    public $ipcr_type;
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



    public function mount($type){
        $loggedInUser = auth()->user();
        $dateToday = Carbon::now()->toDateString();
        $this->date_of_filling = $dateToday;
        $this->ipcr_type = $type;
        $this->start_period = $dateToday;
        $this->disscused_with_date = $dateToday;
        $this->assessed_by_date = $dateToday;
        $this->final_rating_by_date = $dateToday;
        $this->coreFunctions = [
            ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => '']
        ];
        $this->supportiveFunctions = [
            ['output' => '', 'indicator' => '', 'accomp' => '', 'Q' => '', 'E' => '', 'T' => '', 'A' => '']
        ];
    }

    // public function boot(){
    //     $this->dispatch('app:scroll-to', [
    //         'query' => '#start_period',
    //     ]);
     
    // }

    // public function submitOrRefresh()
    // {
    //     if ($this->getErrorBag()->keys() > 0) {
    //         $this->refresh();
    //     } else {
    //         $this->submit();
    //     }
    // }

    protected $listeners = ['refreshComponent' => '$refresh'];

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
        $this->final_rating = ($this->core_rating * 0.80 + $this->supp_admin_rating * 0.20); 
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

    
    // public function hydrate()
    // {
    //     $this->resetErrorBag();
    //     $this->resetValidation();
    //     $this->validate();
    // }

    // public function dehydrate(){
    //     $this->resetErrorBag();
    //     $this->resetValidation();
    //     $this->validate();
    // }

    // public function updating($name, $value)
    // {
    //     $this->resetErrorBag();
    //     $this->resetValidation($name);
    // }

    // public function rendering($view, $data)
    // {
    //     $this->resetErrorBag();
    //     $this->resetValidation();
    //     $this->validate();
    // }

    // public function booted(){
    //     $this->resetErrorBag();
    //     $this->resetValidation();
       
    // }

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

                    // if($this->ipcr_type == 'rated'){
                    //     $weight =  $supp_function['weight'] ?? 100;
                    //     $this->supp_admin_rating = ($sum / ($index * 4))  ;
                    // }
                    // else{
                    //     $this->supp_admin_rating = $sum / ($index * 4);
                    // }
                    // $this->supp_admin_rating = $sum / ($index * 4);
                }
            }
        }
        $this->final_rating = ( $this->core_rating * 0.80 + $this->supp_admin_rating * 0.20); 
        $this->final_average_rating = $this->final_rating;
    }

    protected $rules = [
        // 'date_of_filling' => 'required',
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
        'discussed_with' => 'required|mimes:jpg,png|extensions:jpg,png|max:5120',
        'disscused_with_date' => 'required|date|after_or_equal:start_period|max:5120',
        // 'assessed_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        // 'assessed_by_date' => 'required|date',
        // 'final_rating' => 'required|numeric',
        // 'final_rating_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        // 'final_rating_by_date' => 'required|date',
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

    
    // public function resetValidate(){
    //     // $this->dispatch('$commit');
    //     $this->resetValidation();
    //     return;
    // }

    public function submit(){

        // dd($this->coreFunctions);

        // foreach($this->rules as $field => $validationRules){
        //     // dd($field, $validationRules);
        //     $this->validate($field, $validationRules);
        // }
        
        $this->validate();

        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('current_position')
            ->where('employee_id', $loggedInUser->employee_id)
            ->first();


        $loggedInUser = auth()->user();
        $ipcr = new Ipcr();
        $ipcr->employee_id = $loggedInUser->employee_id;
        $ipcr->ipcr_type = $this->ipcr_type;
        $ipcr->date_of_filling = $this->date_of_filling;
        $ipcr->position = $this->employeeRecord->department_name ?? ' ';
        $ipcr->start_period = $this->start_period;
        $ipcr->end_period = $this->end_period;
        $ipcr->ratee = $this->ratee;
        $ipcr->core_rating = $this->core_rating;
        $ipcr->supp_admin_rating = $this->supp_admin_rating;
        $ipcr->final_average_rating = $this->final_average_rating;

        $ipcr->final_rating = $this->final_average_rating;
        // $ipcr->comments_and_reco = $this->comments_and_reco;
        $ipcr->discussed_with = $this->discussed_with->store('photos/ipcr/discussed_with', 'local');
        $ipcr->disscused_with_date = $this->disscused_with_date;
        // $ipcr->assessed_by = $this->assessed_by->store('photos', 'local');
        // $ipcr->assessed_by_date = $this->assessed_by_date;
        // $ipcr->final_rating = $this->final_rating;
        // $ipcr->final_rating_by = $this->final_rating_by->store('photos', 'local');
        // $ipcr->final_rating_by_date = $this->final_rating_by_date;
        
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
        // session()->flash('status', 'Ipcr successfully submitted.');

        // Ipcr::create($ipcr);
        $ipcr->save();

        return redirect()->to(route('IpcrTable'));

    }

    public function render()
    {
        $loggedInUser = auth()->user();
        // $this->employeeRecord = Employee::select('*')
        //             ->where('employee_id', $loggedInUser->employee_id)
        //             ->get();
        $this->employeeRecord = Employee::select('first_name', 'middle_name', 'last_name')
                        ->where('employee_id', $loggedInUser->employee_id)
                        ->get();
        
        return view('livewire.ipcr.ipcr-form')->extends('layouts.app');
    }

    
}
