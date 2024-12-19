<?php

namespace App\Livewire;

use App\Models\ContactMe;
use App\Models\EmailTemplate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;


class AdminContactMeTable extends Component
{
    use WithoutUrlPagination;

    public $searchme = '';
    public $perPage = 5;

    public function updatedSearchme()
    {
        $this->resetPage();
    }


    public function render()
    {
        $templates = EmailTemplate::where('status', 'active')->get();
        $contacts = ContactMe::query()
            ->when($this->searchme, function ($query) {
                $query->where('name', 'like', '%' . $this->searchme . '%')
                    ->orWhere('email', 'like', '%' . $this->searchme . '%')
                    ->orWhere('subject', 'like', '%' . $this->searchme . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin-contact-me-table', [
            'contacts' => $contacts,
            'templates' => $templates
        ]);
    }
}
