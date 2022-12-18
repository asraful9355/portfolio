<?php

namespace App\Http\Controllers;
use App\Models\Media;
use Toastr;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::all();
        return view('admin.contact.icon.index',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.icon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = new Media;

        $this->validate($request,[
            'icon'=>'required',
            'url'=>'required'
        ]);

        $media->icon = $request->icon;
        $media->url = $request->url;
        $media->save();
        Toastr::success('Media Icon Added  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        $med = Media::find($id);
        return view('admin.contact.icon.edit',compact('med'));
        
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
        $med = Media::find($id);

        $this->validate($request,[
            'icon'=>'required',
            'url'=>'required'
        ]);

        $med->icon = $request->icon;
        $med->url = $request->url;
        $med->save();
        Toastr::success('Media Icon Updated  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        $med = Media::find($id);
        $med->delete();
        Toastr::error('Media Icon Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
