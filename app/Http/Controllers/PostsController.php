<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Pow;
use Toastr;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::paginate(3);
      return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        if( $categories && $tags->count() >0 ) {

            return view('admin.posts.create',compact('categories','tags'));
        }else{
            Toastr::warning('you must have some categories and tags before attemping create post', 'Message', ["positionClass" => "toast-top-center"]);
            return redirect()->back();
        }

     
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
           'sub_title'       => 'required',
           'title'       => 'required',
           'skill'       => 'required',
           'featured'    => 'required',
           'category_id' => 'required',
           'cv'     => 'required',
           'btn_title'     => 'required',
           'btn_url'     => 'required',
         
           
       ]);

         $str = $request->title;
         $slug = trim(preg_replace('/\s+/','-',$str));
         
         $featured = $request->featured ;
         $featured_new_name = time().$featured->getClientOriginalName();
         $featured->move('uploads/posts/',$featured_new_name);

         $cv = $request->cv ;
         $cv_new_name = time().$cv->getClientOriginalName();
         $cv->move('uploads/posts/',$cv_new_name);

        $post = Post::create([
         'sub_title'         => $request->sub_title,
         'title'         => $request->title,
          'slug'         => $slug,
          'skill'         => $request->skill,
          'featured'     => 'uploads/posts/'.$featured_new_name,
          'category_id'  => $request->category_id,
          'cv'      => 'uploads/posts/'.$cv_new_name,
          'btn_title'         => $request->btn_title,
          'btn_url'         => $request->btn_url,

         ]);
     
         Toastr::success('Post Added Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
         return redirect()->route('create.post');

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
    {     $categories = Category::all();
          $tags = Tag::all();
          $post = Post::find($id);
        return view('admin.posts.edit',compact('post','categories','tags'));
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
        $post = Post::find($id);
        $this->validate($request,[
            'sub_title'       => 'required',
           'title'       => 'required',
           'skill'       => 'required',
           'btn_title'       => 'required',
           'btn_url'       => 'required',
           
         
        ]);

        $str = $request->title;
        $slug = trim(preg_replace('/\s+/','-',$str));


        if($request->hasfile('featured')){
            $featured = $request->featured ;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
            $file = $post->featured;
            // if($file){
            //     unlink($file);
            // }
           
            $post->featured = 'uploads/posts/'.$featured_new_name;

        }
        if($request->hasfile('cv')){
            $cv = $request->cv ;
            $cv_new_name = time().$cv->getClientOriginalName();
            $cv->move('uploads/posts/',$cv_new_name);
            $file = $post->cv;
            // if($file){
            //     unlink($file);
            // }
           
            $post->cv = 'uploads/posts/'.$cv_new_name;

        }

        
       
        $post->sub_title = $request->sub_title;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->skill = $request->skill;
        $post->created_at = Carbon::now();
        $post->btn_title  =$request->btn_title;
        $post->btn_url  =$request->btn_url;
        $post->save();
    
        Toastr::success('Post Updated Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('create.post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post = Post::find($id);
        $post->delete();
        Toastr::error('Post Trashed Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.post');
    }

    public function trash(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash',compact('posts'));
    }
    public function restore($id){
        $post= Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Toastr::error('Post restore Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.post');
    }
    public function kill($id){
        $post= Post::withTrashed()->where('id',$id)->first();
     
           $file = $post->featured;
           if($file){
                  unlink ($file);
            }
        $post->forceDelete();
        Toastr::error('Post Permanently Deleted Successfully ', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('trash.post');
    }

}
