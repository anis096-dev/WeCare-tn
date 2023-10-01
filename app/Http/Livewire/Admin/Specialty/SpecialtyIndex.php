<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtyIndex extends Component
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
        $specialties = Specialty::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $specialties = $specialties->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $specialties = $specialties->onlyTrashed();
        }

        $specialties = $specialties->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $specialties;

    }


    public function render()
    {
        return view('livewire.admin.specialty.specialty-index',[
            'specialties' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.admin');
    }
}
