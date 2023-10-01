<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class RequiredFiles extends Component
{
    use WithFileUploads;
    public $CIN, $file;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function save()
    {
        $this->validate([
            'CIN' => ['required', 'string', 'min:8', 'max:8'],
            'file' => ['required','file','mimes:pdf'],
        ]);

        $data = [
            'CIN' => $this->CIN,
        ];

        $data['file'] = $this->file->store('files', 'public');

        auth()->user()->update($data);
        $this->emit('saved');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.user.required-files');
    }
}
