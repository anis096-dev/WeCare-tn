<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Specialty;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SpecialtyDelete extends Component
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
        $specialty = Specialty::findOrFail($this->itemId);
        $this->authorize('delete', $specialty);
        $specialty->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('specialty.delete specialty'));

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
        $specialty = Specialty::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('restore', $specialty);
        $specialty->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
        $this->toast(__('specialty.restore specialty'));
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
        $specialty = Specialty::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('forceDelete', $specialty);
        $specialty->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('specialty.force delete specialty'));
    }

    public function render()
    {
        return view('livewire.admin.specialty.specialty-delete');
    }
}
