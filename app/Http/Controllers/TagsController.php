<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Toastr;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tags = Tag::paginate(5);
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $this->validate($request,[
          
           'myself'=>'required',
           'btn_title'=>'required',
           'btn_url'=>'required'

         ]);

  
         $featured = $request->featured ;
         $featured_new_name = time().$featured->getClientOriginalName();
         $featured->move('uploads/posts/',$featured_new_name);

         $tag = Tag::create([
          
             'myself'         => $request->myself,
             'featured'     => 'uploads/posts/'.$featured_new_name,
             'featured'      => 'uploads/posts/'.$featured_new_name,
             'btn_title'         => $request->btn_title,
             'btn_url'         => $request->btn_url,
   
            ]);

          Toastr::success('About Me Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
          return redirect()->route('create.tag');


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
       $tag = Tag::find($id);
       return view('admin.tags.edit',compact('tag'));
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
        $tag = Tag::find($id);

        $this->validate($request,[
            'myself'=>'required',
            'btn_title'=>'required',
            'btn_url'=>'required'
 
          ]);


          if($request->hasfile('featured')){
             
            $featured = $request->featured; 
            $featured_new_name = time().$featured->getClientOriginalName(); 
            $featured->move('uploads/posts', $featured_new_name);
            unlink($tag->featured);
            $tag->featured = 'uploads/posts/'.$featured_new_name;
            }

         $tag->myself = $request->myself;
          $tag->btn_title= $request->btn_title;
          $tag->btn_url= $request->btn_url;
          $tag->save();
        Toastr::success('About Me Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        Toastr::error('About Me Information Deleted Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.tag');
    }
}
