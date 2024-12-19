<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactMe;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $contacts = ContactMe::orderBy('created_at', 'desc')->get();
        $projects = Project::all();
        $blogs = Blog::all();
        return view('admin.dashbord',compact('contacts','users','projects','blogs'));
    }

    public function website(){
        return view('admin.website');
    }


}
