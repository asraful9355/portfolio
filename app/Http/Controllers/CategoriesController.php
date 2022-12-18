<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Toastr;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
                 'name'=>'required',
                
               ]);

        $category = new category;

            $category->name = $request->name;
            $category->location = $request->radio;
            $category->save();
            Toastr::info('Category Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
          $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $this->validate($request,[
            'name'=>'required'
 
          ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Toastr::info('Category Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
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
        $category = Category::find($id);
        // $category->delete();
        Toastr::error('It contains many posts which are not allowed to be deleted ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.category');
    }
    public function deactive($id)
    {
        $cat = Category::find($id);
        $cat->status =0;
        $cat->save();
        Toastr::error('Category deactive successfully', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();


    }
    public function active($id)
    {
       
        $cat = Category::find($id);
        $cat->status =1;
        $cat->save();
        Toastr::error('Category active successfully', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
