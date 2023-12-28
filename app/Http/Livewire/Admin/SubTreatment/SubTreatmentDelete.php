<?php

namespace App\Http\Livewire\Admin\SubTreatment;

use App\Models\SubTreatment;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubTreatmentDelete extends Component
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
        $subtreatment = SubTreatment::findOrFail($this->itemId);
        $this->authorize('delete', $subtreatment);
        $subtreatment->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('subtreatment.delete subtreatment'));

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
        $subtreatment = SubTreatment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('restore', $subtreatment);
        $subtreatment->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
        $this->toast(__('subtreatment.restore subtreatment'));
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
        $subtreatment = SubTreatment::onlyTrashed()->findOrFail($this->itemId);
        $this->authorize('forceDelete', $subtreatment);
        $subtreatment->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
        $this->toast(__('subtreatment.force delete subtreatment'));
    }
    public function render()
    {
        return view('livewire.admin.sub-treatment.sub-treatment-delete');
    }
}
