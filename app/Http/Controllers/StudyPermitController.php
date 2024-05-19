<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Studypermit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class StudyPermitController extends Controller
{

    public function turnToPdf($id){
        $stud = Studypermit::query()->where('id', $id)->get(); 
        $studypermit = Studypermit::query()->where('id', $id)->first(); 
        $employee_id = Studypermit::query()->where('id', $id)->value('employee_id'); 
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); 
        $logoUrl = Storage::disk('public')->get('plmlogo/plm-logo.png');
        $image = Storage::disk('local')->get($studypermit['applicant_signature']);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); 
        $pdf = PDF::loadView('livewire.studypermit.study-permit-pdf', ['studypermits' => $studypermit, 'employees' => $employee, 'stud' => $stud, 'signature' => $image, 'logo' => $logoUrl ]); // Pass data to the blade file
        $pdf->setPaper('A4', 'portrait'); 
        return $pdf->stream();   
    }

    public function view(){
        return view('resources.LeaveRequestTable');
    }
}
