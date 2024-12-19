<?php

namespace App\Livewire;

use App\Models\ContactMe;
use Livewire\Component;

class WebContactMePage extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public function render()
    {
        return view('livewire.web-contact-me-page');
    }

    public function storeContactMe()
    {
        // Validate form data
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store data in the ContactMe model
        ContactMe::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        // Optionally, you can reset the form fields
        $this->reset(['name', 'email', 'subject', 'message']);

        // Emit an event to notify the user of success
        session()->flash('successContact', 'Your message has been sent successfully!');
    }
}
