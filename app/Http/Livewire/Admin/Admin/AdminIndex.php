<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use App\Traits\ToastAlert;

class AdminIndex extends Component
{
    use ToastAlert;

    public function render()
    {
        return view('livewire.admin.admin.admin-index')->layout('layouts.admin');
    }
}
