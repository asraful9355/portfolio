<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Toastr;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $services = Service::all();
         return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;
        $this->validate($request,[
           'title'=>'required',
           'icon_link'=>'required',
           'sub_title'=>'required',
        ]);
        $service->title = $request->title;
        $service->icon_link = $request->icon_link;
        $service->sub_title = $request->sub_title;
        $service->save();
        Toastr::success('Service Added  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
         $service = Service::find($id);
         return view('admin.service.edit',compact('service'));
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
        $service = Service::find($id);

        $this->validate($request,[
            'title'=>'required',
            'icon_link'=>'required',
            'sub_title'=>'required',
         ]);

   
        $service->title = $request->title;
        $service->icon_link = $request->icon_link;
        $service->sub_title = $request->sub_title;
        $service->save();
        Toastr::success('Service Update  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        $service = Service::find($id);
        $service->delete();
        Toastr::error('Service Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->back();

    }
}
