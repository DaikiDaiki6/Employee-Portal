<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Teachpermit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class TeachPermitController extends Controller
{
    public function turnToPdf($id){
        $stud = Teachpermit::query()->where('id', $id)->get(); 
        $teachpermit = Teachpermit::query()->where('id', $id)->first(); 
        $employee_id = Teachpermit::query()->where('id', $id)->value('employee_id'); 
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); 
        $image = Storage::disk('local')->get($teachpermit['applicant_signature']);
        $logoUrl = Storage::disk('public')->get('plmlogo/plm-logo.png');

        // $signature = Storage::disk('public')->url($studypermit['applicant_signature']);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']); 
        $pdf = PDF::loadView('livewire.teachpermit.teach-permit-pdf', ['teachpermit' => $teachpermit, 'employees' => $employee, 'stud' => $stud, 'signature' => $image, 'logo' => $logoUrl]); // Pass data to the blade file
        $pdf->setPaper('A4', 'portrait'); 
        return $pdf->stream();   
    }

    public function view(){
        return view('resources.LeaveRequestTable');
    }
}
