<?php

namespace App\Http\Livewire\Admin\SubTreatment;

use Livewire\Component;
use App\Traits\ToastAlert;
use App\Models\SubTreatment;

class SubTreatmentCreate extends Component
{
    use ToastAlert;

    public $treatments;

    public $name, $currency, $price_day, $price_night, $price_weekend, $treatmentId;


    protected $listeners = ['showCreateModel'];

    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'currency' => ['required', 'string', 'max:3'],
            'price_day' => ['required', 'integer', 'min:10', 'max:300'],
            'price_night' => ['required', 'integer', 'min:25', 'max:500'],
            'price_weekend' => ['required', 'integer', 'min:25', 'max:500'],
            'treatmentId' => 'required|integer|exists:App\Models\treatment,id',
        ];
    }

    public function mount($treatments){
        $this->treatments = $treatments;
    }

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('treatments');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function create(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'currency' => $this->currency,
            'price_day' => $this->price_day,
            'price_night' => $this->price_night,
            'price_weekend' => $this->price_weekend,
            'treatment_id' => $this->treatmentId,
        ];

        SubTreatment::create($data);
        $this->closeCreateModel();
        $this->toast(__('subtreatment.create subtreatment'));
        $this->emit('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.admin.sub-treatment.sub-treatment-create');
    }
}
