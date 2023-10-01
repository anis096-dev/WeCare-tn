<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Specialty::with('user')->find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.specialty.specialty-show');
    }
}
