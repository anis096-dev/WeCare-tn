<?php

namespace App\Http\Livewire\Admin\Specialty;

use Livewire\Component;
use App\Models\Specialty;
use App\Traits\ToastAlert;
use Exception;

class SpecialtyUpdate extends Component
{
    use ToastAlert;

    public $name, $slug,  $desc;
    public $itemId;

    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'slug' => ['required'],
            'desc' => ['required', 'string', 'min:50', 'max:250'],
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel= true;

        if (!empty($this->itemId)){
            $item = Specialty::find($this->itemId);
            $this->name = $item->name;
            $this->slug = $item->slug;
            $this->desc = $item->desc;
        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel= false;
    }

    public function edit(){
        $this->validate();

        try{
            $data = [
                'name' => $this->name,
                'slug' => $this->slug,
                'desc' => $this->desc,
            ];
    
            Specialty::where('id',$this->itemId)->update($data);
            $this->closeUpdateModel();
            $this->toast(__('specialty.update specialty'));
            $this->emit('refreshParent');
        }
        catch(Exception $e){
            $this->toastError(__('specialty.failed specialty'));
        }

    }
    
    public function render()
    {
        return view('livewire.admin.specialty.specialty-update');
    }
}
