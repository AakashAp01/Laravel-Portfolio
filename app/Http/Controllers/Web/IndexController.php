<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Like;
use App\Models\Project;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    public function aboutMe()
    {
        return view('web.about');
    }

    public function projects()
    {
        $projects = Project::get();
        return view('web.projects', compact('projects'));
    }

    public function chat()
    {
        return view('web.chat');
    }

    public function blog()
    {
        $categories = BlogCategory::with('blogs')->where('status', 'active')->get();

        $blogs = Blog::with('category')
                    ->withCount('likes')
                    ->where('status', 'active')
                    ->get();
        $blogs = $blogs->map(function ($blog) {
            $blog['liked'] = $blog->isLikedByUser();
            return $blog;
        });

        return view('web.blog.blog', compact('categories', 'blogs'));
    }


    public function getBlogs($categoryId = null)
    {
        // $categoryId = Crypt::decrypt($encryptedId);
        $categories = BlogCategory::with('blogs')->where('status', 'active')->get();

        if ($categoryId) {
            $blogs = Blog::with('likes')->where('category_id', $categoryId)->where('status', 'active')->paginate();
        } else {
            $blogs = Blog::with('likes')->where('status', 'active');
        }
        $blogs = $blogs->map(function ($blog) {
            $blog->liked = $blog->isLikedByUser();
            return $blog;
        });

        return view('web.blog.blog', compact('categories', 'blogs'));
    }

    public function likeBlog($blog_id)
    {

        $blog = Blog::withCount('likes')->findOrFail($blog_id);
        $user_id = Auth::user()->id;

        $like = Like::where('blog_id', $blog_id)
                    ->where('user_id', $user_id)
                    ->first();

        if ($like) {
            $like->delete();
            $message = 'Like removed successfully!';
            $liked = false;
        } else {

            Like::create([
                'user_id' => $user_id,
                'blog_id' => $blog_id,
            ]);
            $message = 'Liked successfully!';
            $liked = true;
        }

        $response =[
            'likes' => count($blog->likes),
            'id'=> $blog_id,
            'liked' => $liked
        ];
        return response()->json([
            'success' => true,
            'message' => $message,
            'blog' => $response
        ]);
    }


}
