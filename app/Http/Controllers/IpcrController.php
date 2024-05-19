<?php

namespace App\Http\Controllers;

use App\Models\Ipcr;
use App\Models\Employee;
// use Barryvdh\DomPDF\PDF;
use App\Enums\DeanNamesEnum;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class IpcrController extends Controller
{
    public $ipcrRecords;

    public function imageServe($path){
        dd($path);
    }

    public function view(){
        // $this->ipcrRecords = 
        return view('resources.ipcrtable');
    }
    public function create(){
        // dd("seal");
        return view('ipcrformview');
    }

    public function update(){
        return view('ipcredit');
    }

    // public function image($index){
    //     $ipcr = Ipcr::query()->where('id', $index)->get(); // Get IPCR Records
    //     $ipcrData =  Storage::disk('local')->get($ipcr[0]['discussed_with']);
    //     dd($index);
    //     $ipcrData = base64_encode($ipcrData);
    //     return $ipcrData;
    // }

    public function turnToPdf($index){
        $images = [];
        $ipcr = Ipcr::query()->where('id', $index)->get(); // Get IPCR Records
        $employee_id = Ipcr::query()->where('id', $index)->value('employee_id'); // Get Employee ID
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
        $images['discussed_with'] = Storage::disk('local')->get($ipcr[0]['discussed_with']);
        if(isset($ipcr[0]['assessed_by'])){
            if($ipcr[0]['assessed_by_verdict'] == 1){
                $images['assessed_by'] = Storage::disk('local')->get($ipcr[0]['assessed_by']);
            }
        }
        if(isset($ipcr[0]['final_rating_by'])){
            if($ipcr[0]['final_rating_by_verdict'] == 1){
                $images['final_rating_by'] = Storage::disk('local')->get($ipcr[0]['final_rating_by']);
            }
        }
        $pdf = Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
        $pdf = PDF::loadView('livewire.ipcr.ipcr-pdf', ['ipcrs' => $ipcr, 'employees' => $employee, 'images' => $images]); // Pass data to the blade file
        $pdf->setPaper('A4', 'landscape'); // Set paper type and orientation
        return $pdf->stream();
    }

   
}
