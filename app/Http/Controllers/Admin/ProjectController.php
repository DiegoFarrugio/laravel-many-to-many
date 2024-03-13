<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Str;

use App\Http\Requests\Project\StoreRequest as ProjectStoreRequest;
use App\Http\Requests\Project\UpdateRequest as ProjectUpdateRequest;



//Models 
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

// Helpers
use Illuminate\Support\Str;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        //$technologies = Technology::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $projectData = $request->validated();

        $slug = Str::slug($projectData['title']);
        
        //$projectData['slug'] =$slug;

        $project = Project::create([
            'title' => $projectData['title'],
            'slug' => $slug,
            'content' => $projectData['content'],
            'type_id' => $projectData['type_id'],
        ]);

        if (isset($projectData['technologies'])) {
            foreach ($projectData['technologies'] as $singleTechnologyId) {
                
                $project->technologies()->attach($singleTechnologyId);
            }
        }

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $projectData = $request->validated();

        $slug = Str::slug($projectData['title']);
        

        $project->update([
            'title' => $projectData['title'],
            'slug' => $slug,
            'content' => $projectData['content'],
            'type_id' => $projectData['type_id'],
        ]);

        if (isset($projectData['technologies'])) {
            $project->technologies()->sync($projectData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }

        //return view('admin.projects.show', compact('project'));
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
