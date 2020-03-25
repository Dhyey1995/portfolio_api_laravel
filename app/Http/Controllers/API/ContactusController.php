<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactus;
use App\Mail\Contactusadmin;


class ContactusController extends Controller
{
    protected $data = array();

    protected $response = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
    public function store(Request $request , Contactus $contactus)
    {   
        try {
            $request->validate([
                'name'  => 'required',
                'email' => 'required',
                'contact' => 'required',
                'user_message' => 'required',
            ]);    
            $contactus->name = $request->name;
            $contactus->email = $request->email;
            $contactus->contact_number = $request->contact;
            $contactus->messsage = $request->user_message;
            \Mail::to('dhyeyrathod111@gmail.com')->send(new Contactusadmin($request->all()));    
            if ($contactus->save()) {    
                $this->response['status'] = 'T';
                $this->response['message'] = 'Thank you for contact with us.';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
