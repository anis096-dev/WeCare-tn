<?php

namespace App\Http\Livewire\Admin\Treatment;

use App\Models\Treatment;
use Livewire\Component;

class TreatmentShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Treatment::with('specialty')->find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.treatment.treatment-show');
    }
}
