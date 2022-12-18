<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Toastr;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::paginate(5);
        return view('admin.experience.index',compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $exp = new Experience;
       
       $this->validate($request,[
        'company'=>'required',
        'place'=>'required',
        'join_end'=>'required',
        'job_title'=>'required'
     ]);

     $exp->company = $request->company;
     $exp->place = $request->place;
     $exp->join_end = $request->join_end;
     $exp->job_title = $request->job_title;
     $exp->save();
     Toastr::success('Experience Added  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
         $exp = Experience::find($id);
         return view('admin.experience.edit',compact('exp'));
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
        $exp = Experience::find($id);

       
        $this->validate($request,[
         'company'=>'required',
         'place'=>'required',
         'join_end'=>'required',
         'job_title'=>'required'
      ]);
 
      $exp->company = $request->company;
      $exp->place = $request->place;
      $exp->join_end = $request->join_end;
      $exp->job_title = $request->job_title;
      $exp->save();
      Toastr::success('Experience Updated Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        $exp = Experience::find($id);
        $exp->delete();
        Toastr::error('Experience Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
