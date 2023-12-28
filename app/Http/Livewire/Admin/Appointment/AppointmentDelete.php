<?php

namespace App\Http\Livewire\Admin\Appointment;

use Livewire\Component;
use App\Traits\ToastAlert;
use App\Models\Appointment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppointmentDelete extends Component
{
    use ToastAlert;
    use AuthorizesRequests;


    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $appointment = Appointment::findOrFail($this->itemId);
        $this->authorize('delete', $appointment);
        $appointment->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('appointment.delete appointment'));

    }

    public function showRestoreModel($itemId){
        $this->itemId = $itemId;
        $this->showRestoreModel = true;
    }

    public function closeRestoreModel(){
        $this->showRestoreModel = false;
        $this->reset();
    }
    
    public function restore(){
        $appointment = Appointment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('restore', $appointment);
        $appointment->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
        $this->toast(__('appointment.restore appointment'));
    }

    public function showForceDeleteModel($itemid){
        $this->itemId = $itemid;
        $this->showForceDeleteModel = true;
    }
    public function closeForceDeleteModel(){
        $this->showForceDeleteModel = false;
        $this->reset();
    }

    public function forceDelete(){
        $appointment = Appointment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('forceDelete', $appointment);
        $appointment->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('appointment.force delete appointment'));
    }
    
    public function render()
    {
        return view('livewire.admin.appointment.appointment-delete');
    }
}
