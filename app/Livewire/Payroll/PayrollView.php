<?php

namespace App\Livewire\Payroll;

use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Dailytimerecord;

class PayrollView extends Component
{
    public $payrollData;
    public $index;
    public $faculty;
    public $total_earnings;
    public $total_deductions;
    public $net_pay;
    public $nameOfDate;

    public function mount($index){
        $this->index = $index;
        $this->transferData();
        $this->calculateSummary();
    }

    private function calculateSummary(){
        $loggedInUser = auth()->user()->employee_id;
        $date = Carbon::createFromFormat('Y-m-d', $this->payrollData->date);
        $this->nameOfDate = $date->format('F Y');
        $month = (int) $date->format('m');
        $attendanceNumber = Dailytimerecord::orderby('id','asc')
                            ->where('employee_id', $loggedInUser)
                            ->whereMonth('attendance_date', $month)
                            ->get();
        $attendanceNumber = count($attendanceNumber);   
        $this->total_earnings = ($this->payrollData->lvt_pay ?? 0) + ($this->payrollData->pera ?? 0) + ($this->payrollData->lvt_pay ?? 0) + ($this->payrollData->study_grant ?? 0) + ($this->payrollData->plmpcci ?? 0) +  ($this->payrollData->other_earnings ?? 0);
        $this->total_deductions = ($this->payrollData->gsis_deduction ?? 0) + ($this->payrollData->wtax ?? 0) + ($this->payrollData->philhealth ?? 0) + ($this->payrollData->pag_ibig ?? 0) + ($this->payrollData->maxicare ?? 0)  + ($this->payrollData->other_deductions ?? 0) ;
        $this->net_pay =  (($this->payrollData->salary * $attendanceNumber) + $this->total_earnings) - $this->total_deductions;
    }

    private function transferData(){
        $payrollData = Payroll::findOrFail($this->index);
        $loggedInUser = auth()->user()->employee_id;
        $employeeData = Employee::where('employee_id', $loggedInUser)->value('faculty_or_not');
        if($payrollData->employee_id == $loggedInUser){
            $this->payrollData = $payrollData;
            $this->faculty = True;
        }
        return;
    }
    public function render()
    {
        return view('livewire.payroll.payroll-view')->extends('layouts.app');
    }
}
