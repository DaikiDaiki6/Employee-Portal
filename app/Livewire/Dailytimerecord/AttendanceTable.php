<?php

namespace App\Livewire\Dailytimerecord;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use Livewire\WithoutUrlPagination;

class AttendanceTable extends Component
{
    use WithPagination;
    

    public $options = [];
    public $dateChosen = [];

    public $currentYear;

    public $currentMonth;

    public $search = "";

    public $filter;

    public $filterName;

    protected $queryString = [
        'category',
        'sort',
    ];
    
    public function mount()
{
    $currentYear = Carbon::now()->year;
    $currentMonth = Carbon::now()->month;
    $years = range($currentYear, 2000, -1);
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

    // Add options for the current month and year
    $this->options["{$currentYear}-{$currentMonth}"] = "{$currentYear} - {$months[str_pad($currentMonth, 2, '0', STR_PAD_LEFT)]}";

    // Add options for the previous months of the current year
    for ($i = $currentMonth - 1; $i > 0; $i--) {
        $monthNumber = str_pad($i, 2, '0', STR_PAD_LEFT);
        $this->options["{$currentYear}-{$monthNumber}"] = "{$currentYear} - {$months[$monthNumber]}";
    }

   

    // Loop through previous years and add options for each month
    foreach (array_slice($years, 1) as $year) {
        foreach ($months as $monthNumber => $monthName) {
            $this->options["{$year}-{$monthNumber}"] = "{$year} - {$monthName}";
        }
    }

    // dd($this->options); 

    $this->currentYear = Carbon::now()->year;
    $this->currentMonth = Carbon::now()->month;

}
    public function setFilter($filter){
        $this->filter = $filter;
    }

    public function test(){
        dd('seal');
    }

    protected $rules = [
        'dateChosen' => 'required|max:3',
    ];
    public function submit(){
        $countArray = count($this->dateChosen);
        if($countArray > 12 or $countArray < 1){
            return redirect()->to(route('AttendanceTable'));
        }
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
        $query = Dailytimerecord::where('employee_id', $loggedInUser->employee_id);
        switch ($this->filter) {
            case '1':
                $query->whereDate('attendance_date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $query->whereBetween('attendance_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('attendance_date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $query->whereDate('attendance_date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('attendance_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('attendance_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('attendance_date', [Carbon::today()->subYear(), Carbon::today()]);
                // $query->whereDate('attendance_date', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('attendance_date', 'like', '%' . $this->search . '%')->orderBy('attendance_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('attendance_date', 'desc')->paginate(5);
        }
        
        return view('livewire.dailytimerecord.attendance-table', [
            'DtrData' => $results,
        ]);
        
    }


}
