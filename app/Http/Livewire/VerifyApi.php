<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use Twilio\Rest\Client;

class VerifyApi extends Component
{
    public $country_code;
    public $phone;
    public $code;
    public $status = '';
    public $error = '';


    public function sendCode()
    {
        $data = $this->validate([
            'phone' => ['required', 'numeric', 'unique:users'],
            'country_code' => ['required'],
        ]);

        $country_code = $this->country_code;

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        try {
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verifications
        ->create($country_code.$data['phone'], 'sms');
        $this->status = $verification->status;
        }
        catch (Exception $e) {
        $this->error = 'Invalid number';
        }
    }

    public function verifyCode()
    {
        $data =$this->validate([
            'code' => ['required','digits:6','numeric'],
            'phone' => ['required', 'string'],
        ]);

        $country_code = $this->country_code;

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        try {
            $verification_check = $twilio->verify->v2->services($twilio_verify_sid)
                 ->verificationChecks
                 ->create(['to' => $country_code . $data['phone'], "code" => $data['code']]);
            
            if ($verification_check->valid == false) {
                $this->error = 'This code is invalid, please try again';
            }else{
                auth()->user()->update([
                    'phone' => $this->phone, 
                    'phone_verified' => true,  
                ]);
                $this->error = '';
                $this->status = $verification_check->status;
                $this->cleanVars();
            }
            return redirect()->to('/dashboard');
        }
        catch (Exception $e) {
            // $this->error = $e->getMessage();
            $this->error = 'Invalid Code or Time out, Please retry';
        }
    }

    public function cleanVars()
    {
        $this->phone ='';
        $this->country_code  = '';
        $this->code  = '';
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.verify-api');
    }
}