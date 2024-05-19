<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use App\Livewire\Ipcr\IpcrForm;
use App\Livewire\Opcr\OpcrForm;
use App\Livewire\Ipcr\IpcrTable;
use App\Livewire\Opcr\OpcrTable;
use App\Livewire\Ipcr\IpcrUpdate;
use App\Livewire\Opcr\OpcrUpdate;
use App\Livewire\Employeeinformation;
use App\Livewire\Payroll\PayrollView;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Payroll\PayrollTable;
use App\Http\Controllers\IpcrController;
use App\Http\Controllers\OpcrController;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Trainings\TrainingForm;
use App\Livewire\Trainings\TrainingView;
use App\Livewire\Dashboard\DashboardView;
use App\Livewire\Trainings\TrainingUpdate;
use App\Http\Controllers\ProfileController;
use App\Livewire\Activities\ActivitiesForm;
use App\Livewire\Activities\ActivitiesView;
use App\Livewire\Trainings\TrainingGallery;
use App\Http\Controllers\PayrolPdfController;
use App\Livewire\Activities\ActivitiesUpdate;
use App\Livewire\Studypermit\StudyPermitForm;
use App\Livewire\Teachpermit\TeachPermitForm;
use App\Livewire\Activities\ActivitiesGallery;
use App\Livewire\Studypermit\StudyPermitTable;
use App\Livewire\Teachpermit\TeachPermitTable;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StudyPermitController;
use App\Http\Controllers\TeachPermitController;
use App\Livewire\Leaverequest\LeaveRequestForm;
use App\Livewire\Studypermit\StudyPermitUpdate;
use App\Livewire\Teachpermit\TeachPermitUpdate;
use App\Livewire\Trainings\TrainingPreTestForm;
use App\Http\Controllers\LeaveRequestController;
use App\Livewire\Trainings\TrainingPostTestForm;
use App\Http\Controllers\AttendancePdfController;
use App\Livewire\Dailytimerecord\AttendanceTable;
use App\Livewire\Leaverequest\LeaveRequestUpdate;
use App\Http\Controllers\RequestDocumentController;
use App\Livewire\Changeinformation\ChangeInformation;
use App\Livewire\Approverequests\Ipcr\ApproveIpcrForm;
use App\Livewire\Approverequests\Opcr\ApproveOpcrForm;
use App\Livewire\Requestdocuments\RequestDocumentForm;
use App\Livewire\Approverequests\Ipcr\ApproveIpcrTable;
use App\Livewire\Approverequests\Opcr\ApproveOpcrTable;
use App\Livewire\Requestdocuments\RequestDocumentTable;
use App\Livewire\Requestdocuments\RequestDocumentUpdate;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Approverequests\Changeinformation\ApproveChangeInformationForm;
use App\Livewire\Approverequests\ChangeInformation\ApproveChangeInformationRequest;
use App\Livewire\Approverequests\Changeinformation\ApproveChangeInformationTable;
use App\Livewire\Approverequests\Studypermit\ApproveStudyPermitForm;
use App\Livewire\Approverequests\Teachpermit\ApproveTeachPermitForm;
use App\Livewire\Approverequests\Studypermit\ApproveStudyPermitTable;
use App\Livewire\Approverequests\Teachpermit\ApproveTeachPermitTable;
use App\Livewire\Approverequests\Leaverequest\ApproveLeaveRequestForm;
use App\Livewire\Approverequests\Leaverequest\ApproveLeaveRequestTable;
use App\Livewire\Approverequests\Requestdocument\ApproveRequestDocumentForm;
use App\Livewire\Approverequests\Requestdocument\ApproveRequestDocumentTable;
use App\Livewire\Leaverequest\LeaveRequestTable;
use App\Livewire\Sidebar\Notifications\NotificationsTable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function(){
    return redirect()->route('dashboard');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
 
    Route::get('register', Register::class)
        ->name('register');
});

// Route::get('password/reset', Email::class)
//     ->name('password.request');

// Route::get('password/reset/{token}', Reset::class)
//     ->name('password.reset');

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify', Verify::class)
//         ->middleware('throttle:6,1')
//         ->name('verification.notice');

//     Route::get('password/confirm', Confirm::class)
//         ->name('password.confirm');
// });

Route::middleware('auth')->group(function () {
    // Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
    //     ->middleware('signed')
    //     ->name('verification.verify');


    // Original
    Route::get('logout', LogoutController::class)
        ->name('logout');
    // Route::get('logout', LogoutController::class)
    //     ->name('logout');
});


Route::middleware('auth')->group(function (){
    Route::get("/dashboard", DashboardView::class)->name('dashboard');

    Route::get("/profile", Employeeinformation::class)->name('profile');

    // Route::view('/', 'dashboardview')->name('home');

    Route::get('/profile/{file}', [Employeeinformation::class, 'download'])->name('downloadFile');

    Route::get('/profile/{media}/{filename}', [Employeeinformation::class, 'privateStorage'])->name('privateStorage');

    Route::get('/changeinformation', ChangeInformation::class)->name('changeInformation');

    Route::get('/changeinformationrequests', ApproveChangeInformationTable::class)->name('ApproveChangeInformationTable');
    
    Route::get('/changeinformationrequests/approve/{index}', ApproveChangeInformationForm::class)->name('ApproveChangeInformationForm');

    Route::get('/notifications', NotificationsTable::class)->name('NotificationsTable');
});





Route::middleware('auth')->group(function () {
    Route::get("/ipcr", IpcrTable::class)->name("IpcrTable");

    Route::get("/ipcr/form/{type}", IpcrForm::class)->name('IpcrForm');

    // Route::get("/submitipcr", [IpcrController::class, 'submit'])->name("submitipcr");

    Route::get("/ipcr/edit/{index}", IpcrUpdate::class)->name('IpcrEdit');

    Route::get("ipcr/pdf/{index}", [IpcrController::class, 'turnToPdf'])->name('IpcrPdf');

    Route::get("/ipcr/approve/{index}", ApproveIpcrForm::class)->name('ApproveIpcrForm');

    Route::get("/ipcr/requests/", ApproveIpcrTable::class)->name('ApproveIpcrTable');

    // Route::get("ipcr/{path}", PrivateController::class)->name('ipcrimage');

    // Route::get("ipcr/{index}", [IpcrController::class, 'image'])->name('ipcrimage');

    // Route::get("ipcr/pdf/{index}", Ipcrpdf::class)->name('ipcrpdf');

});

Route::middleware('auth')->group(function () {

    Route::get("/opcr", OpcrTable::class)->name("OpcrTable");

    Route::get("/opcr/form/{type}", OpcrForm::class)->name('OpcrForm');

    Route::get("/opcr/edit/{index}", OpcrUpdate::class)->name('OpcrEdit');

    Route::get("/opcr/pdf/{index}", [OpcrController::class, 'turnToPdf'])->name('OpcrPdf');

    Route::get("/opcr/request/", ApproveOpcrTable::class)->name('ApproveOpcrTable');

    Route::get("/opcr/approve/{index}", ApproveOpcrForm::class)->name('ApproveOpcrForm');

});


Route::middleware('auth')->group(function () {

    Route::get("/leaverequest", LeaveRequestTable::class)->name('LeaveRequestTable');

    Route::get("/leaverequest/form", LeaveRequestForm::class)->name('LeaveRequestForm');

    Route::get("/leaverequest/edit/{index}", LeaveRequestUpdate::class)->name('LeaveRequestEdit');

    Route::get("/leaverequest/pdf/{index}", [LeaveRequestController::class, 'turnToPdf'])->name('LeaveRequestPdf');

    Route::get("leaverequest/requests/", ApproveLeaveRequestTable::class)->name('ApproveLeaveRequestTable');

    Route::get("leaverequest/approve/{index}", ApproveLeaveRequestForm::class)->name('ApproveLeaveRequestForm'); 

});


Route::middleware('auth')->group(function (){

    Route::get("/studypermit", StudyPermitTable::class)->name('StudyPermitTable');

    Route::get("/studypermit/form", StudyPermitForm::class)->name('StudyPermitForm');

    Route::get("/studypermit/edit/{index}", StudyPermitUpdate::class)->name('StudyPermitEdit');

    Route::get("/studypermit/pdf/{index}", [StudyPermitController::class, 'turnToPdf'])->name('StudyPermitPdf');

    Route::get("/studypermit/requests", ApproveStudyPermitTable::class)->name('ApproveStudyPermitTable');

    Route::get("/studypermit/approve/{index}", ApproveStudyPermitForm::class)->name('ApproveStudyPermitForm');
});


Route::middleware('auth')->group(function (){

    Route::get("/teachpermit", TeachPermitTable::class)->name('TeachPermitTable');

    Route::get("/teachpermit/form", TeachPermitForm::class)->name('TeachPermitForm');

    Route::get("/teachpermit/edit/{index}", TeachPermitUpdate::class)->name('TeachPermitEdit');

    Route::get("/teachpermit/pdf/{index}", [TeachPermitController::class, 'turnToPdf'])->name('TeachPermitPdf');

    Route::get("/teachpermit/requests", ApproveTeachPermitTable::class)->name('ApproveTeachPermitTable');

    Route::get("/teachpermit/approve/{index}", ApproveTeachPermitForm::class)->name('ApproveTeachPermitForm');
});


Route::middleware('auth')->group(function (){
    Route::get("/requestdocument", RequestDocumentTable::class)->name('RequestDocumentTable');

    Route::get("/requestdocument/form", RequestDocumentForm::class)->name('RequestDocumentForm');

    Route::get("/requestdocument/edit/{index}", RequestDocumentUpdate::class)->name('RequestDocumentEdit');

    Route::get("/requestdocument/pdf/{index}", [RequestDocumentController::class, 'turnToPdf'])->name('RequestDocumentPdf');

    Route::get("/requestdocument/requests", ApproveRequestDocumentTable::class)->name('ApproveRequestDocumentTable');

    Route::get("/requestdocument/approve/{index}", ApproveRequestDocumentForm::class)->name('ApproveRequestDocumentForm');
});


Route::middleware('auth')->group(function (){
    Route::get("/activties", ActivitiesGallery::class)->name('ActivitiesGallery');

    Route::get("/activties/form", ActivitiesForm::class)->name('ActivitiesForm');

    Route::get("/activties/form/edit/{index}", ActivitiesUpdate::class)->name('ActivitiesUpdate');

    Route::get("/activties/view/{index}", ActivitiesView::class)->name('ActivitiesView');

});


Route::middleware('auth')->group(function (){
    Route::get("/trainings", TrainingGallery::class)->name('TrainingGallery');

    Route::get("/trainings/form", TrainingForm::class)->name('TrainingForm');

    Route::get("/trainings/form/edit/{index}", TrainingUpdate::class)->name('TrainingUpdate');

    Route::get("/trainings/view/{index}", TrainingView::class)->name('TrainingView');
    
    Route::get("/trainings/pretest/{index}", TrainingPreTestForm::class)->name('TrainingPreTestForm');

    Route::get("/trainings/posttest/{index}", TrainingPostTestForm::class)->name('TrainingPostTestForm');

});


Route::middleware('auth')->group(function (){
    Route::get("/dailytimerecord", AttendanceTable::class)->name('AttendanceTable');

    Route::get("/dailytimerecord/pdf/{dates}", [AttendancePdfController::class, 'turnToPdf'])->name('AttendancePdf');

});

Route::middleware('auth')->group(function (){
    Route::get("/payroll", PayrollTable::class)->name("PayrollTable");

    Route::get("/payroll/pdf/{index}", [PayrolPdfController::class, 'turnToPdf'])->name("PayrollPdf");

    Route::get("/payroll/view/{index}", PayrollView::class)->name("PayrollView");

});




    