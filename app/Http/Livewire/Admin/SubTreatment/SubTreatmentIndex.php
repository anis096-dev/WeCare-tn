<?php

namespace App\Http\Livewire\Admin\SubTreatment;

use App\Models\SubTreatment;
use Livewire\Component;
use App\Models\Treatment;
use Livewire\WithPagination;

class SubTreatmentIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public int $perPage = 10;
    public bool $trashed = false;
    public ?string $treatment = null;


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
        $subtreatments = SubTreatment::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $subtreatments = $subtreatments->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $subtreatments = $subtreatments->onlyTrashed();
        }

        $subtreatments = $subtreatments->with(['treatment:id,specialty_id,name']);

        if (!empty($this->treatment)){
            $subtreatments = $subtreatments->where('treatment_id',$this->treatment);
        }

        $subtreatments = $subtreatments->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $subtreatments;

    }


    public function render()
    {
        return view('livewire.admin.sub-treatment.sub-treatment-index',[
            'subtreatments' => $this->readyToLoad ? $this->getItem() : [],
            'treatments' => Treatment::all()->pluck('name', 'id'),
        ])->layout('layouts.admin');
    }
}
