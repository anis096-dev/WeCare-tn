<?php

namespace App\Http\Livewire\Guest\Contact;

use App\Models\Contact;
use App\Traits\ToastAlert;
use Livewire\Component;

class ContactCreate extends Component
{
    use ToastAlert;
    public $name;
    public $email;
    public $message;
    

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:50', 'max:250'],
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submitForm(){
        
        $this->validate();
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        
        $this->reset(['name', 'email', 'message']);
        $this->toast(__('contact.create contact'));

    }
    
    public function render()
    {
        return view('livewire.guest.contact.contact-create')->layout('layouts.guest');
    }
}
