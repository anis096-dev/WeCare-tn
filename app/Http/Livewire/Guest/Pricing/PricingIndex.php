<?php

namespace App\Http\Livewire\Guest\Pricing;

use Livewire\Component;

class PricingIndex extends Component
{
    public function render()
    {
        return view('livewire.guest.pricing.pricing-index')->layout('layouts.guest');
    }
}
