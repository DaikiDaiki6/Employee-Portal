<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leaverequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class LeaveRequestController extends Controller
{
    public function turnToPdf($id){
        // $pdf = PDF::loadView('workpdf', ['works' => $ipcr, 'employees' => $employee,]);
        $leaveRequestData = Leaverequest::query()->where('id', $id)->first();
        $employee_id = Leaverequest::query()->where('id', $id)->value('employee_id');
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); 
        $image = Storage::disk('local')->get($leaveRequestData['commutation_signature_of_appli']);
        $logoUrl = Storage::disk('public')->get('plmlogo/plm-logo.png');
        $pdf = PDF::loadView('livewire.leaverequest.leave-request-pdf', ['leaveRequestData' => $leaveRequestData, 'employees' => $employee, 'image' => $image, 'logo' => $logoUrl]);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']);
        $customPaper = array(0, 0, 595.28, 870.89);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();   
    }


    public function view(){
        return view('resources.LeaveRequestTable');
    }
}
