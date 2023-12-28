<?php

namespace App\Http\Livewire\Admin\SubTreatment;

use Livewire\Component;
use App\Traits\ToastAlert;
use App\Models\SubTreatment;

class SubTreatmentUpdate extends Component
{
    use ToastAlert;

    public $treatments;
    public $itemId;
    public $name, $currency, $price_day, $price_night, $price_weekend, $treatmentId;


    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

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

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = SubTreatment::find($this->itemId);
            $this->name = $item->name;
            $this->currency = $item->currency;
            $this->treatmentId = $item->treatment_id;
            $this->price_day = $item->price_day;
            $this->price_night = $item->price_night;
            $this->price_weekend = $item->price_weekend;
        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('treatments');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'currency' => $this->currency,
            'price_day' => $this->price_day,
            'price_night' => $this->price_night,
            'price_weekend' => $this->price_weekend,
            'treatment_id' => $this->treatmentId,
        ];

        SubTreatment::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('subtreatment.update subtreatment'));
        $this->emit('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.admin.sub-treatment.sub-treatment-update');
    }
}
