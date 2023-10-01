<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
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
        if ($action == 'show'){
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
        $contacts = Contact::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $contacts = $contacts->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $contacts = $contacts->onlyTrashed();
        }

        $contacts = $contacts->paginate($this->perPage);

        return $contacts;

    }


    public function render()
    {
        return view('livewire.admin.contact.contact-index',[
            'contacts' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.admin');
    }
}
