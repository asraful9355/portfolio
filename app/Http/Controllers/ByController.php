<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\By;
use Toastr;

class ByController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $copyRight = By::all();

       return view('admin.copy&right.index',compact('copyRight'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.copy&right.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $copy = new By;
        $this->validate($request,[
          'name'=>'required',
          'link'=>'required'
        ]);

        $copy->name = $request->name ;
        $copy->link = $request->link ;
        $copy->save();
        Toastr::success('Copy & Right  Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
         $copy = By::find($id);
         return view('admin.copy&right.edit',compact('copy'));
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
        $copy = By::find($id);

        $this->validate($request,[
            'name'=>'required',
            'link'=>'required'
          ]);
  
          $copy->name = $request->name ;
          $copy->link = $request->link ;
          $copy->save();
          Toastr::success('Copy & Right  Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
        $copy = By::find($id);
        $copy->delete();
        Toastr::error('Copy & Right  Deleted Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }
}
