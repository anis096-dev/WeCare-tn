<?php

namespace App\Http\Livewire\Admin\Treatment;

use App\Models\Treatment;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TreatmentDelete extends Component
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
        $treatment = Treatment::findOrFail($this->itemId);
        $this->authorize('delete', $treatment);
        $treatment->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('treatment.delete treatment'));

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
        $treatment = Treatment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('restore', $treatment);
        $treatment->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
        $this->toast(__('treatment.restore treatment'));
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
        $treatment = Treatment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('forceDelete', $treatment);
        $treatment->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('treatment.force delete treatment'));
    }

    public function render()
    {
        return view('livewire.admin.treatment.treatment-delete');
    }
}
