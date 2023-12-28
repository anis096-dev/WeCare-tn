<?php

namespace App\Http\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;
    public $subtreatments;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Appointment::with('specialty','country','city')->find($this->itemId);

    $subtreatments_Ids = json_decode($this->item->subtreatments);
    $this->subtreatments = \App\Models\SubTreatment::whereIn('id', $subtreatments_Ids)->get();
    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.appointment.appointment-show');
    }
}
