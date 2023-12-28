<?php

namespace App\Http\Livewire\Guest\Appointment;

use App\Models\Appointment;
use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use App\Models\Specialty;
use App\Models\Treatment;
use Livewire\WithFileUploads;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;

class AppointmentCreate extends Component
{
    use WithFileUploads;

    public $countryId;
    public $countries;
    
    public $cityId;
    public $cities;

    
    public $specialtyId;
    public $specialties;
    
    public $treatments;
    public $subtreatments = [];
    
    public $prescription;
    public $prescriptionFile;
    
    public $first_name;
    public $last_name;
    public $age;
    public $email;
    public $phone;
    public $gender;
    public $number_of_visits;
    public $duration;
    public $availability;
    public $start_date;
    public $Location_of_care;
    public $adress;
    

    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
        $this->countries = Country::all();
        $this->cities = collect();
        $this->specialties = Specialty::all();
        $this->treatments = collect();
    }

    public function updatedCountryId($value)
    {
        $this->cityId = [];
        $this->cities = City::where('country_id', $value)->get();
    }

    public function updatedSpecialtyId($value)
    {
        $this->subtreatments = [];
        $this->treatments = Treatment::where('specialty_id', $value)->get();
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if($this->currentStep == 1){
            $this->validate([
                'specialtyId' => 'required|integer|exists:App\Models\Specialty,id',
                'subtreatments' => 'required|array|max:3',
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'number_of_visits' => 'required',
                'duration' => 'required',
                'start_date' => ['required', 'date', new DateBetween, new TimeBetween],
                'Location_of_care' => 'required',
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'countryId' => 'required|integer|exists:App\Models\Country,id',
                'cityId' => 'required|integer|exists:App\Models\City,id',
                'adress' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'age' => 'required|numeric|max:99',
                'gender' => 'required',
                'phone' => 'required|numeric',
                'email' => 'nullable|email|max:255',
            ]);
        }
    }

    public function create()
    {
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'prescription' => 'required',
                'prescriptionFile' => 'nullable|image|mimes:jpeg,jpg|max:1024',
            ]);
        }

        if (!empty($this->prescriptionFile)) {
            $name = $this->prescriptionFile->getClientOriginalName();
            $this->prescriptionFile = $this->prescriptionFile->storeAs('prescription_file', $name, 'public');
        }

        Appointment::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'email' => $this->email,
            'adress' => $this->adress,
            'Location_of_care' => $this->Location_of_care,
            'number_of_visits' => $this->number_of_visits,
            'duration' => $this->duration,
            'start_date' => $this->start_date,
            'prescription' => $this->prescription,
            'country_id' => $this->countryId,
            'city_id' => $this->cityId,
            'specialty_id' => $this->specialtyId,
            'subtreatments' => json_encode($this->subtreatments),
            'prescription_file' => $this->prescriptionFile,
        ]);

        $this->currentStep = 1;
        $this->cleanVars();

    }

    public function updatedPrescriptionFile()
    {
        $this->validate([
            'prescriptionFile' => 'image|mimes:jpeg,jpg|max:1024',
        ]);
    }

    public function cleanVars()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->age = '';
        $this->email = '';
        $this->phone = '';
        $this->adress = '';
        $this->Location_of_care = '';
        $this->number_of_visits = '';
        $this->duration = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->availability = '';
        $this->prescription = '';
        $this->countryId = '';
        $this->cityId = '';
        $this->specialtyId = '';
        $this->subtreatments = [];
        $this->prescriptionFile = '';
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.guest.appointment.appointment-create');
    }
}
