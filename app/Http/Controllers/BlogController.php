<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class BlogController extends Controller
{
    public function blog()
    {
        $categories = BlogCategory::paginate(10);
        $blogs = Blog::with('category','likes')->paginate(10);
        return view('admin.blog.blog', compact('categories', 'blogs'));
    }

    public function blogStatus(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:blogs,id',
            'status' => 'required|in:active,inactive',
        ]);

        $template = Blog::find($request->id);

        if ($template) {
            $template->status = $request->status;
            $template->save();

            return ResponseHelper::success(null, 'Status updated successfully!');
        }

        return ResponseHelper::error('Status update failed');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blog')->with('success', 'Blog deleted successfully.');
    }

    public function blogCatStatus(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:blog_categories,id',
            'status' => 'required|in:active,inactive',
        ]);

        $template = BlogCategory::find($request->id);

        if ($template) {
            $template->status = $request->status;
            $template->save();

            return ResponseHelper::success(null, 'Status updated successfully!');
        }

        return ResponseHelper::error('Status update failed');
    }


    public function addBlogCategory(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {

            $category = BlogCategory::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'] ?? '',
            ]);

            return ResponseHelper::success(null, 'Blog category added successfully.');
        } catch (\Exception $e) {
            return ResponseHelper::error('Failed to add blog category. Please try again.');
        }
    }

    public function updateBlog(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'thumbnail' => 'file|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);
        if ($request->hasFile('thumbnail')) {

            if ($blog->thumbnail) {
                $oldThumbnailPath = public_path('storage/blog_thumbnail/' . basename($blog->thumbnail));
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('blog_thumbnail', $thumbnailName, 'public');
            $blog->thumbnail = $thumbnailName;
        }
        $blog->save();

        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully');
    }

    public function deleteBlogCat($id)
    {
        $hasBlogs = Blog::where('category_id', $id)->exists();

        if ($hasBlogs) {
            return redirect()->route('admin.blog')->with('error', 'Cannot delete category as it has associated blogs.');
        }

        $cat = BlogCategory::findOrFail($id);
        $cat->delete();

        return redirect()->route('admin.blog')->with('success', 'Blog category deleted successfully.');
    }


    public function addBlog()
    {
        $categories = BlogCategory::where('status', 'active')->get();
        return view('admin.blog.add_blog', compact('categories'));
    }

    public function editBlog($id)
    {
        $categories = BlogCategory::where('status', 'active')->get();
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->route('admin.blog')->with('error', 'Blog not found');
        }
        return view('admin.blog.edit_blog', compact('categories', 'blog'));
    }


    public function storeBlog(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'thumbnail' => 'required|file|mimes:jpeg,png,jpg,gif',
        ]);

        $blog = new Blog;
        $blog->title = $validated['title'];
        $blog->category_id = $validated['category_id'];
        $blog->content = $validated['content'];
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('blog_thumbnail', $thumbnailName, 'public');
            $blog->thumbnail = $thumbnailName;
        }
        $blog->save();


        return redirect()->route('admin.blog')->with('success', 'Blog added successfully');
    }

    public function viewBlog($blog_id){
        $blog_id = Crypt::decrypt($blog_id);
        $latestBlog = Blog::find($blog_id);
        $latestBlog->liked = $latestBlog->isLikedByUser();
        if (!$latestBlog) {
            return redirect()->route('web.blog')->with('error', 'Blog not found');
        }
        return view('web.blog.view-blog', compact( 'latestBlog'));
    }

}
