<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_category;
use App\Models\work;
use Toastr;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = work::all();
       return view('admin.portfolio.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Sub_category::all();
         return view('admin.portfolio.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new work;

        $this->validate($request,[
            'skill'=>'required',
            'featured' =>'required',
         
            
        ]);

        $featured = $request->featured ;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$featured_new_name);

        work::create([
            'skill'=>$request->skill,
            'featured'     => 'uploads/posts/'.$featured_new_name,
            'sub_category_id'  => $request->category_id,
        ]);
        Toastr::success('Post Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
        $work = work::find($id);
        $categories = Sub_category::all();
        return view('admin.portfolio.edit',compact('work','categories'));
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
        $work = work::find($id);
        $this->validate($request,[
            'skill'=>'required',
           ]);
        if($request->hasfile('featured')){
             
            $featured = $request->featured; 
            $featured_new_name = time().$featured->getClientOriginalName(); 
            $featured->move('uploads/posts', $featured_new_name);
          
            $work->featured = 'uploads/posts/'.$featured_new_name;
            }

          $work->skill = $request->skill;
          $work->sub_category_id= $request->category_id;
          $work->save();


        Toastr::info('Work Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
        $work = work::find($id);
        $work->delete();
        Toastr::error('Work Permanently Deleted Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();


    }
}
