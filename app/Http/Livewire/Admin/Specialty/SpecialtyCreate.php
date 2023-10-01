<?php

namespace App\Http\Livewire\Admin\Specialty;

use Livewire\Component;
use App\Models\Specialty;
use App\Traits\ToastAlert;
use Illuminate\Validation\Rule;

class SpecialtyCreate extends Component
{
    use ToastAlert;

    public $name, $slug,  $desc;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5', Rule::unique(Specialty::class)],
            'slug' => ['required', Rule::unique(Specialty::class)],
            'desc' => ['required', 'string', 'min:50', 'max:250'],
        ];
    }

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function cleanVars()
    {
        $this->name ='';
        $this->slug  = '';
        $this->desc  = '';
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->cleanVars();
    }

    public function create(){
        $this->validate();

         $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'desc' => $this->desc,
        ];

        Specialty::create($data);
        $this->closeCreateModel();
        $this->toast(__('specialty.create specialty'));
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.specialty.specialty-create');
    }
}
