<?php
namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogList extends Component
{
    public $latestBlogs;
    public $olderBlogs;

    
    public function __construct($latestBlogs = null, $olderBlogs = null)
    {
        // Fetch 3 random latest blogs
        $this->latestBlogs = $latestBlogs ?: Blog::with('likes')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $this->olderBlogs = $olderBlogs ?: Blog::with('likes')
            ->inRandomOrder()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('components.blog-list', [
            'latestBlogs' => $this->latestBlogs,
            'olderBlogs' => $this->olderBlogs,
        ]);
    }
}
