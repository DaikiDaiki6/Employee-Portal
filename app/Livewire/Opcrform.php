<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Opcr;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;

class Opcrform extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $employeeRecordDate; 
    public $coreFunctions;
    public $supportiveFunctions;

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

    public function removeCoreFunction($index){
        unset($this->coreFunctions[$index]);
        $this->coreFunctions = array_values($this->coreFunctions);
    }

    public function removeSupportiveFunction($index){
        unset($this->supportiveFunctions[$index]);
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

    public function mount($type){
        $dateToday = Carbon::now()->toDateString();
        $loggedInUser = auth()->user();
        $this->employeeRecord = Employee::select('department_head', 'department_name')
                    ->where('employee_id', $loggedInUser->employeeId)
                    ->get();
        $this->department_name = $this->employeeRecord[0]->department_name;
        $this->department_head = $this->employeeRecord[0]->department_head;
        $this->date_of_filling = $dateToday;
        $this->opcr_type = $type;
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
        'comments_and_reco' => 'required|min:10|max:2048', 
        'discussed_with' => 'required|mimes:jpg,png|extensions:jpg,png',
        'disscused_with_date' => 'required|date',
        'assessed_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        'assessed_by_date' => 'required|date',
        'final_rating' => 'required|numeric',
        'final_rating_by' => 'required|mimes:jpg,png|extensions:jpg,png',
        'final_rating_by_date' => 'required|date',
    ];

    // protected $validationAttributes = [
    //     'coreFunctions.*.output' => 'core output',
    //     'coreFunctions.*.indicator' => 'core indicator',
    //     'coreFunctions.*.accomp' => 'core acccomplishment',
    //     'coreFunctions.*.weight' => 'core weight',
    //     'coreFunctions.*.remark' => 'core remark',
    // ];

    // protected $messages = [
    //     'start_period.before' => 'The Start period must be a date before end period.',
    // ];

    

    public function submit(){

        $this->validate();
        $loggedInUser = auth()->user();
        $opcr = new Opcr();
        $opcr->employee_id = $loggedInUser->employeeId;
        $opcr->opcr_type = $this->opcr_type;
        $opcr->date_of_filling = $this->date_of_filling;
        $opcr->department_name = $this->department_name;
        $opcr->department_head = $this->department_head;
        $opcr->start_period = $this->start_period;
        $opcr->end_period = $this->end_period;
        $opcr->ratee = $this->ratee;
        $opcr->core_rating = $this->core_rating;
        $opcr->supp_admin_rating = $this->supp_admin_rating;
        $opcr->final_average_rating = $this->final_average_rating;
        $opcr->comments_and_reco = $this->comments_and_reco;
        $opcr->discussed_with = $this->discussed_with->store('photos', 'local');
        $opcr->disscused_with_date = $this->disscused_with_date;
        $opcr->assessed_by = $this->assessed_by->store('photos', 'local');
        $opcr->assessed_by_date = $this->assessed_by_date;
        $opcr->final_rating = $this->final_rating;
        $opcr->final_rating_by = $this->final_rating_by->store('photos', 'local');
        $opcr->final_rating_by_date = $this->final_rating_by_date;
        
        $jsonCoreData = [];
        $jsonSupportiveData = [];
        
        if($opcr->opcr_type == 'target'){
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

        $opcr->core_functions = $jsonCoreData;
        $opcr->supp_admin_functions = $jsonSupportiveData;

        $this->js("alert('Opcr submitted!')"); 
        // session()->flash('status', 'Ipcr successfully submitted.');

        // Ipcr::create($opcr);
        $opcr->save();

        return redirect()->to(route('opcrtable'));

    }

    public function render()
    {   
        return view('livewire.opcrform')->extends('layouts.app');
    }
}
