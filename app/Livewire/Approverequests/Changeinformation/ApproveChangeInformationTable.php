<?php

namespace App\Livewire\Approverequests\Changeinformation;

use App\Models\ChangeInformation;
use Livewire\Component;

class ApproveChangeInformationTable extends Component
{
    public function render()
    {
        $loggedInUser = auth()->user();
        return view('livewire.approverequests.changeinformation.approve-change-information-table', [
            'ChangeInformationData' => ChangeInformation::paginate(10),
        ]);

    }

   
}
