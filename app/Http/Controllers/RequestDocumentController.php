<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Documentrequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class RequestDocumentController extends Controller
{
    public function turnToPdf($id){
        // $pdf = PDF::loadView('workpdf', ['works' => $ipcr, 'employees' => $employee,]);
        $requestDocumentData = Documentrequest::query()->where('id', $id)->first();
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::query()->where('employee_id', $employee_id)->first(); 
        $image = Storage::disk('local')->get($requestDocumentData['signature_requesting_party']);
        $logoUrl = Storage::disk('public')->get('plmlogo/plm-logo.png');

        // $legalAffairs = LegalAffair::query()->where('employee_id', $employee_id)->first(); 
        $pdf = PDF::loadView('livewire.requestdocuments.request-document-pdf', ['requestDocument' => $requestDocumentData, 'employees' => $employee, 'signature' => $image, 'logo' => $logoUrl ]);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();   
        // return view('livewire.requestdocuments.request-document-pdf');
    }
}
