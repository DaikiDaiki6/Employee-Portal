<?php

namespace App\Http\Controllers;

use App\Models\Opcr;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class OpcrController extends Controller
{

    public function turnToPdf($index){
        $images = [];
        $opcr = Opcr::query()->where('id', $index)->get(); // Get IPCR Records
        $employee_id = Opcr::query()->where('id', $index)->value('employee_id'); // Get Employee ID
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
        $images['discussed_with'] = Storage::disk('local')->get($opcr[0]['discussed_with']);
        $images['assessed_by'] = Storage::disk('local')->get($opcr[0]['assessed_by']);
        $images['final_rating_by'] = Storage::disk('local')->get($opcr[0]['final_rating_by']);
        $pdf = Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
        $pdf = PDF::loadView('resources.opcr.Opcrpdf', ['ipcrs' => $opcr, 'employees' => $employee, 'images' => $images]); // Pass data to the blade file
        $pdf->setPaper('A4', 'landscape'); // Set paper type and orientation
        return $pdf->stream();
      
    }

    
    public function view(){
        return view('resources.opcrtable');  
    }
}
