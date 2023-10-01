<?php

namespace App\Http\Livewire\Admin\Treatment;

use App\Models\Specialty;
use App\Models\Treatment;
use Livewire\Component;
use Livewire\WithPagination;

class TreatmentIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public int $perPage = 10;
    public bool $trashed = false;
    public ?string $specialty = null;


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

    public function updatingCountry(){
        $this->resetPage();
    }

    public function updatingRole(){
        $this->resetPage();
    }



    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->emit('showCreateModel');
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }elseif ($action == 'forceDelete'){
            $this->emit('showForceDeleteModel', $itemId);
        }
    }



    public function getItem(){
        $treatments = Treatment::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $treatments = $treatments->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $treatments = $treatments->onlyTrashed();
        }

        $treatments = $treatments->with(['specialty:id,slug,name']);

        if (!empty($this->specialty)){
            $treatments = $treatments->where('specialty_id',$this->specialty);
        }

        $treatments = $treatments->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $treatments;

    }


    public function render()
    {
        return view('livewire.admin.treatment.treatment-index',[
            'treatments' => $this->readyToLoad ? $this->getItem() : [],
            'specialties' => Specialty::all()->pluck('name', 'id'),
        ])->layout('layouts.admin');
    }
}
