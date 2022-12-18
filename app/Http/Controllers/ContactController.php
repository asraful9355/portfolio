<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contact = Contact::all();
         return view('admin.contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $contact = new Contact;
         $this->validate($request,[
             'name'=>'required',
             'proffesion'=>'required',
             'email'=>'required',
             'number'=>'required',
             'address'=>'required',
         ]);

         $contact->name = $request->name;
         $contact->proffesion = $request->proffesion;
         $contact->email = $request->email;
         $contact->number = $request->number;
         $contact->address = $request->address;
         $contact->save();
         Toastr::success('Contact Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
         return redirect()->back();
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
         $con = Contact::find($id);
         return view('admin.contact.edit',compact('con'));
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
        $con = Contact::find($id);

        $this->validate($request,[
            'name'=>'required',
            'proffesion'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required',
        ]);

        $con->name = $request->name;
        $con->proffesion = $request->proffesion;
        $con->email = $request->email;
        $con->number = $request->number;
        $con->address = $request->address;
        $con->save();
        Toastr::success('Contact Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $con = Contact::find($id);
        $con->delete();
        Toastr::error('Contact Deleted Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
