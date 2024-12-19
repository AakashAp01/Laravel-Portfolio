<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectsSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $projects = Project::latest()->take(2)->get();
        return view('components.projects-section',compact('projects'));
    }
}
