<?php

namespace App\Http\Livewire\Admin\SubTreatment;

use Livewire\Component;
use App\Models\SubTreatment;

class SubTreatmentShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = SubTreatment::with('treatment')->find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.sub-treatment.sub-treatment-show');
    }
}
