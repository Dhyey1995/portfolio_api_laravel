<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
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
        //
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
    public function store(Request $request , Skill $skill)
    {
        try {
            $request->validate([
                'skill_name' => 'required',
                'lavel' => 'required',
                'description' => 'required',
            ]);
            $skill->skills_name = $request->skill_name ;
            $skill->lavel = $request->lavel ;
            $skill->descriptions = $request->description ;
            if ($skill->save()) {
                $this->response['status'] = 'T';
                $this->response['message'] = 'skill has been added successfully.';
            } else {
                $this->response['status'] = 'F';
                $this->response['message'] = 'Sorry, we have to face some technical issues please try again later.';
                $this->response['log'] = 'query is not running';
            }
        } catch (\Exception $e) {
            $this->response['status'] = 'F';
                $this->response['message'] = 'Sorry, we have to face some technical issues please try again later.';
                $this->response['log'] = 'try and catche error';
        }
        return response($this->response, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
    public function add_new_skills(Request $request)
    {
        return view('admin.pages.add_new_skills');
    }
}
