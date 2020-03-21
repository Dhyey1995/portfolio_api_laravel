<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

class ProjectController extends Controller
{
    protected $data = array();

    protected $response = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Project $project)
    {
        
        try {
            $request->validate([
                'project_file'  => 'required|mimes:jpg,jpeg,png',
                'description' => 'required',
                'website_url' => 'required',
                'title' => 'required',
            ]);
            $project->title = $request->title;
            $project->website_url = $request->website_url;
            $project->description = $request->description;
            $project->file_name = $request->project_file->store('project_images');
            if ($project->save()) {
                $this->response['status'] = 'T';
                $this->response['message'] = 'project has been added successfully.';
            } else {
                $this->response['status'] = 'F';
                $this->response['message'] = 'Sorry, we have to face some technical issues please try again later.';
            }
        } catch (\Exception $e) {
            $this->response['status'] = 'F';
            $this->response['message'] = 'Sorry, we have to face some technical issues please try again later.';
        }
        return response($this->response, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
    public function add_new_project(Request $request)
    {
        return view('admin.pages.add_new_project');
    }
}
