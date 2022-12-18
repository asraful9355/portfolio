<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Toastr;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.tags.skill_index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.tags.skill_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $skill = new Skill;
        $this->validate($request,[
        'skill'=>'required',
        'percen'=>'required',
        
    ]);

       
         $skill->skill = $request->skill;
         $skill->percen= $request->percen;
         $skill->save();
         Toastr::success('Skill Added Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
         $skill = Skill::find($id);
         return view('admin.tags.skill_edit',compact('skill'));
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
         $skill = Skill::find($id);
         $this->validate($request,[
            'skill'=>'required',
            'percen'=>'required',
            
        ]);

        $skill->skill = $request->skill;
        $skill->percen =$request->percen;
        $skill->save();
        Toastr::success('Skill Updated  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
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
        //
    }
}
