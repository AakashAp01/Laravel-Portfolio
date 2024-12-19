<?php

namespace App\Livewire;

use App\Models\EmailTemplate;
use App\Models\User;
use Livewire\Component;
// use Illuminate\Pagination\Paginator;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class AdminUsersTable extends Component
{
    use WithoutUrlPagination;
    public $searchme = '';
    public $perPage = 10;


    public function render()
    {
        // Paginator::useBootstrap();
        $templates = EmailTemplate::where('status', 'active')->get();

        $users = User::where('id', '!=', auth()->id())
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->searchme . '%')
                      ->orWhere('email', 'like', '%' . $this->searchme . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin-users-table', [
            'users' => $users,
            'templates' => $templates
        ]);
    }

}
