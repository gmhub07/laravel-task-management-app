<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Project::query();

        $sortField = request("sort_field","created_at"); // setting the sort field with default fallback value
        $sortDirection = request("sort_direction","desc"); // setting the sort direction with default fallback value

        //retain the name query in the url (filter the data according)
        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%");
        }

        // retain the status query (filter the data accordingly)
        if (request("status")) {
            $query->where("status", request("status"));
        }

        $projects = $query->orderBy($sortField,$sortDirection)->paginate(10)->onEachside(1); // orderby sort field, showing 10 results per page
        return inertia("Project/Index", [
            "projects" => ProjectResource::collection($projects),
            "queryParams" => request()->query() ?: null, // retaining all the query parameters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Project/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        Project::create($data);

        return to_route('project.index')->with('success','project was created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $query = $project->tasks();

        $sortField = request("sort_field","created_at"); // setting the sort field with default fallback value
        $sortDirection = request("sort_direction","desc"); // setting the sort direction with default fallback value

        //retain the name query in the url
        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%");
        }
        if (request("status")) {
            $query->where("status", request("status"));
        }

        $tasks = $query->orderBy($sortField,$sortDirection)
        ->paginate(10)
        ->onEachside(1); // orderby sort field, showing 10 results per page

        return inertia('Project/Show',[
            'project' => new ProjectResource($project),
            "tasks" => TaskResource::collection($tasks),
            "queryParams" => request()->query() ?: null
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
