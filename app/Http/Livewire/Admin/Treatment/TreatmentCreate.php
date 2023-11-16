<?php

namespace App\Http\Livewire\Admin\Treatment;

use Livewire\Component;
use App\Models\Treatment;
use App\Traits\ToastAlert;

class TreatmentCreate extends Component
{
    use ToastAlert;

    public $specialties;

    public $name, $currency, $price_day, $price_night_weekend, $specialtyId;


    protected $listeners = ['showCreateModel'];

    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'currency' => ['required', 'string', 'max:3'],
            'price_day' => ['required', 'integer', 'min:10', 'max:300'],
            'price_night_weekend' => ['required', 'integer', 'min:25', 'max:500'],
            'specialtyId' => 'required|integer|exists:App\Models\Specialty,id',
        ];
    }

    public function mount($specialties){
        $this->specialties = $specialties;
    }

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('specialties');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function create(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'currency' => $this->currency,
            'price_day' => $this->price_day,
            'price_night_weekend' => $this->price_night_weekend,
            'specialty_id' => $this->specialtyId,
        ];

        Treatment::create($data);
        $this->closeCreateModel();
        $this->toast(__('treatment.create treatment'));
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.treatment.treatment-create');
    }
}
