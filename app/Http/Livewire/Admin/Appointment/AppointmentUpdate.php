<?php

namespace App\Http\Livewire\Admin\Appointment;

use Livewire\Component;
use App\Traits\ToastAlert;
use App\Models\Appointment;
use App\Models\Specialty;
use App\Models\User;
use Livewire\WithPagination;

class AppointmentUpdate extends Component
{
    use ToastAlert;
    use WithPagination;

    public $users = [];
    public $itemId;

    public $userId;
    public $specialty_id;
    public $country_id;
    public $city_id;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'userId' => 'required|integer|exists:App\Models\User,id',
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Appointment::find($this->itemId);
            $this->userId = $item->user_id;
            $this->specialty_id = $item->specialty_id;
            $this->country_id = $item->county_id;
            $this->city_id = $item->city_id;

            $this->users = User::where('specialty_id',$item->specialty_id)
            ->where('country_id',$item->country_id)
            ->where('city_id',$item->city_id)                        
            ->get();

        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('users');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'user_id' => $this->userId,
        ];

        Appointment::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('appointment.update appointment'));
        $this->emit('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.admin.appointment.appointment-update');
    }
}
