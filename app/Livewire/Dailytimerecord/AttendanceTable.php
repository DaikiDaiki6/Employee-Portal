<?php

namespace App\Livewire\Dailytimerecord;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use Livewire\WithoutUrlPagination;

class AttendanceTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    

    public $options = [];
    public $dateChosen = [];
    
    public function mount(){
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $years = range( $currentYear, 2000, -1);
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        foreach ($years as $year) {
            foreach ($months as $monthNumber => $monthName) {
                if ($year == $currentYear && $monthNumber > $currentMonth) {
                    break;
                }
                $this->options["{$year}-{$monthNumber}"] = "{$year} - {$monthName}";
            }
        }
    }

    public function test(){
        dd('seal');
    }
    public function submit(){
        return redirect()->to(route('AttendancePdf', json_encode($this->dateChosen))); 
    }

    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $loggedInUser = auth()->user();
        return view('livewire.dailytimerecord.attendance-table', [
            'DtrData' => Dailytimerecord::where('employee_id', $loggedInUser->employeeId)->paginate(10),
        ]);
        
    }


}
