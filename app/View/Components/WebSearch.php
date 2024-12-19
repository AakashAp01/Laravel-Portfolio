<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class WebSearch extends Component
{
    public $blogs;

    // Fetch all blogs or just titles for the search
    public function __construct()
    {
        $this->blogs = Blog::select('id', 'title')->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('components.web-search', ['blogs' => $this->blogs]);
    }
}
