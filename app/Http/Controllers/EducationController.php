<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Toastr;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $education = Education::paginate(5);
         return view('admin.education.index',compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edu = new Education;
        $this->validate($request,[
           'exam'=>'required',
           'dept'=>'required',
           'institute'=>'required',
           'year'=>'required'
        ]);
    
      
         
        $edu->exam = $request->exam;
        $edu->dept = $request->dept;
        $edu->institute = $request->institute;
        $edu->year = $request->year;
        $edu->save();
        Toastr::success('Education Qualification Added  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        $edu = Education::find($id);
        return view('admin.education.edit',compact('edu'));
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
         $edu = Education::find($id);
          $this->validate($request,[
           'exam'=>'required',
           'dept'=>'required',
           'institute'=>'required',
           'year'=>'required'
        ]);
        $edu->exam = $request->exam;
        $edu->dept = $request->dept;
        $edu->institute = $request->institute;
        $edu->year = $request->year;
        $edu->save();
        Toastr::success('Education Qualification Added  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
       $edu = Education::find($id);
       $edu->delete();
       Toastr::error('Education Qualification Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
       return redirect()->back();

    }
}
