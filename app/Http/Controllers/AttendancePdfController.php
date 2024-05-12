<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Dailytimerecord;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendancePdfController extends Controller
{
    public function turnToPdf($dates){
        $dates = json_decode($dates);
        $employee_id = auth()->user()->employee_id;
        $dtr = Dailytimerecord::select('*')->where('employee_id', $employee_id)->get();
        // dd($dtr[0]->attendance_date);
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); // Get Employee Records
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); // Set PDF settings
        $pdf = PDF::loadView('livewire.dailytimerecord.attendance-pdf', ['dates' => $dates, 'employee' => $employee, 'dtrs' => $dtr]); // Pass data to the blade file
        $pdf->setPaper('A4', 'portrait'); // Set paper type and orientation
        return $pdf->stream();   // Load the pdf
    }
}
