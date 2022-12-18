<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Toastr;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reviews = Review::all();
         return view('admin.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;

        $this->validate($request,[
            'name'=>'required',
            'proffesion'=>'required',
            'featured' =>'required',
            'about' =>'required'
         
            
        ]);

        $featured = $request->featured ;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$featured_new_name);

        Review::create([
            'name'=>$request->name,
            'proffesion'=>$request->proffesion,
            'featured'     => 'uploads/posts/'.$featured_new_name,
            'about'  => $request->about,
        ]);
        Toastr::success('Client Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
         $review = Review::find($id);
 
        return view('admin.review.edit',compact('review'));
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
        $review = Review::find($id);
        $this->validate($request,[
            'name'=>'required',
            'proffesion'=>'required',
            'about' =>'required'
         
           ]);

        if($request->hasfile('featured')){
             
            $featured = $request->featured; 
            $featured_new_name = time().$featured->getClientOriginalName(); 
            $featured->move('uploads/posts', $featured_new_name);
        
            $review->featured = 'uploads/posts/'.$featured_new_name;
            }

          $review->name = $request->name;
          $review->proffesion= $request->proffesion;
          $review->about= $request->about;
          $review->save();


        Toastr::info('Client Information Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
        $review = Review::find($id);
        $review->delete();
        Toastr::error('Client Information Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->back();

    }
}
