<?php

namespace App\Livewire\Payroll;

use App\Models\Payroll;
use Livewire\Component;

class PayrollTable extends Component
{
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function view($index){
        return redirect()->to(route('PayrollView', ['index' => $index]));
    }



    public function render()
    {
        $loggedInUser = auth()->user();
        return view('livewire.payroll.payroll-table', [
            'PayrollData' => Payroll::where('employee_id', $loggedInUser->employeeId)->paginate(10),
        ]);
        
    }

    
}
