<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::all();
        return view('admin.project.projects', compact('projects'));
    }

    public function addProject()
    {
        return view('admin.project.add_project');
    }

    public function storeProject(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable',
            'type' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                $filePath = $file->storeAs('project', $fileName, 'public');

                $images[] = $filePath;
            }
        }

        Project::create([
            'title' => $validatedData['title'],
            'link' => $validatedData['link'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'images' => $images,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project added successfully!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        if(!$project){
            return redirect()->back()->with('error', 'Project not found!');
        }
        if(!empty($project->images)){

            foreach ($project->images as $image) {

                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
    }

    public function editProject($id)
    {

        $project = Project::find($id);
        if(!$project){
            return redirect()->back()->with('error', 'Project not found!');
        }
        return view('admin.project.edit-project', compact('project'));
    }


    public function updateProject(Request $request, $id)
    {

        $project = Project::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
            'type' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update project attributes
        $project->title = $validatedData['title'];
        $project->link = $validatedData['link'];
        $project->type = $validatedData['type'];
        $project->description = $validatedData['description'];

        // Handle images if uploaded
        if ($request->hasFile('images')) {

            foreach ($project->images as $image) {

                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }

            $images = [];

            foreach ($request->file('images') as $file) {
                $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('project', $fileName, 'public');
                $images[] = $filePath;
            }

            $project->images = $images;
        }

        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }



}
