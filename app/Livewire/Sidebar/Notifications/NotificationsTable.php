<?php

namespace App\Livewire\Sidebar\Notifications;

use Livewire\Component;

class NotificationsTable extends Component
{
    public function render()
    {
        $loggedInUser = auth()->user();
        return view('livewire.sidebar.notifications.notifications-table', [
            'NotificationsData' => $loggedInUser->notifications()->paginate(10),
        ]);
    }
}
