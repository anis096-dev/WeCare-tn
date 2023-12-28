<?php

namespace App\Http\Livewire\Admin\Treatment;

use App\Models\Treatment;
use Livewire\Component;
use App\Traits\ToastAlert;

class TreatmentUpdate extends Component
{
    use ToastAlert;

    public $specialties;
    public $itemId;
    public $name, $specialtyId;


    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'specialtyId' => 'required|integer|exists:App\Models\Specialty,id',
        ];
    }

    public function mount($specialties){
        $this->specialties = $specialties;
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Treatment::find($this->itemId);
            $this->name = $item->name;
            $this->specialtyId = $item->specialty_id;
        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('specialties');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name' => $this->name,            
            'specialty_id' => $this->specialtyId,
        ];

        Treatment::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('treatment.update treatment'));
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.treatment.treatment-update');
    }
}
