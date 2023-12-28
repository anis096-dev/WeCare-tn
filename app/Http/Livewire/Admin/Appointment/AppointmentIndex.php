<?php

namespace App\Http\Livewire\Admin\Appointment;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use App\Models\Specialty;
use App\Models\Appointment;
use Livewire\WithPagination;

class AppointmentIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public int $perPage = 10;
    public bool $trashed = false;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function updatingTerm(){
       $this->resetPage();
    }

    public function updatingOrderBy(){
        $this->resetPage();
    }

    public function updatingSortBy(){
        $this->resetPage();
    }

    public function updatingPerPage(){
        $this->resetPage();
    }

    public function updatingTrashed(){
        $this->resetPage();
    }

    public function updatingSpecialty(){
        $this->resetPage();
    }

    public function updatingCountry(){
        $this->resetPage();
    }

    public function updatingCity(){
        $this->resetPage();
    }


    public function selectedItem($action ,$itemId = null){
        if ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }elseif ($action == 'forceDelete'){
            $this->emit('showForceDeleteModel', $itemId);
        }
    }



    public function getItem(){
        $appointments = Appointment::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $appointments = $appointments->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $appointments = $appointments->onlyTrashed();
        }

        $appointments = $appointments->with(['specialty:id,name', 'country:id,name', 'city:id,name']);

        if (!empty($this->country)){
            $appointments = $appointments->where('country_id',$this->country);
        }

        if (!empty($this->specialty)){
            $appointments = $appointments->where('specialty_id',$this->specialty);
        }

        if (!empty($this->city)){
            $appointments = $appointments->where('city_id',$this->city);
        }

        $appointments = $appointments->paginate($this->perPage);

        return $appointments;

    }


    public function render()
    {
        return view('livewire.admin.appointment.appointment-index',[
            'appointments' => $this->readyToLoad ? $this->getItem() : [],
            'specialties' => Specialty::all()->pluck('name', 'id'),
            'countries' => Country::all()->pluck('name' , 'id'),
            'cities' => City::all()->pluck('name' , 'id'),
        ])->layout('layouts.admin');
    }

}
