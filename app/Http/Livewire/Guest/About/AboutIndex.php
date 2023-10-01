<?php

namespace App\Http\Livewire\Guest\About;

use Livewire\Component;

class AboutIndex extends Component
{
    public function render()
    {
        return view('livewire.guest.about.about-index')->layout('layouts.guest');
    }
}
