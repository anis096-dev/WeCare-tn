<?php

namespace App\Http\Livewire\Guest\Faqs;

use Livewire\Component;

class FaqsIndex extends Component
{
    public function render()
    {
        return view('livewire.guest.faqs.faqs-index')->layout('layouts.guest');
    }
}
