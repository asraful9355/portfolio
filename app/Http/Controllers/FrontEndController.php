<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;
use App\Models\Sub_category;
use App\Models\work;
use App\Models\Contact;
use App\Models\Media;
use App\Models\By;
use App\Models\Review;


class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // $top_menu = Category::orderBy('created_at','ASC')->where('location','=', 1)->take(8)->get(); 
        // $main_menu = Category::orderBy('created_at','ASC')->where('location','=', 2)->take(1)->get();
        // $main_second = Category::orderBy('created_at','ASC')->where('location','=', 2)->skip(1)->take(1)->get();
        // $main_third = Category::orderBy('created_at','ASC')->where('location','=', 2)->skip(2)->take(1)->get();
        // $main_four = Category::find(6);
        // $main_five = Category::find(3);
        // $main_six = Category::find(4);
        // $main_seven = Category::find(12);
        // $logoImg    = Setting::first();
        // $chobi    = Category::find(46);
        // $footer_category = Category::orderBy('created_at','ASC')->where('location','=', 3)->take(14)->get();
        // $posts      = Post::all();
        // $first_posts = Post::orderBy('created_at', 'desc')->limit(45)->get();
        // $second_posts = Post::orderBy('created_at', 'desc')->skip('12')->limit(4)->get();
        // $today_news   = Post::inRandomOrder()->limit(3)->get();
        // $today_second   = Post::inRandomOrder()->skip('12')->limit(3)->get();
        // $today   = Post::inRandomOrder()->skip('12')->limit(1)->get();
        // $todayOne   = Post::inRandomOrder()->limit(1)->get();
        $cat_first = Category::find(2);
        $cat_second = Category::find(3);
        $cat_third = Category::find(4);
        $cat_four = Category::find(5);
        $cat_five = Category::find(6);
        $cat_six = Category::find(7);
        $cat_seven = Category::find(8);

        $posts = Post::all();
        $skill_one = Skill::find(1);
        $skill_two = Skill::find(2);
        $skill_three = Skill::find(3);
        $skill_four = Skill::find(4);
        $tags = Tag::all();
        $education = Education::all()->take(4);
        $experience = Experience::all()->take(4);
        $services = Service::all()->take(4);
        $sub_one =Sub_category::find(1);
        $sub_two =Sub_category::find(2);
        $sub_three =Sub_category::find(3);
        $sub_four =Sub_category::find(4);
        $category_one = Sub_category::orderBy('created_at', 'ASC')->skip(1)->first();
        $category_two= Sub_category::orderBy('created_at', 'ASC')->skip(2)->first();
        $category_three= Sub_category::orderBy('created_at', 'ASC')->skip(3)->first();
        $contact = Contact::all();
        $media = Media::all()->take(5);
        $copyRight = By::all()->take(1);
        $reviews = Review::all();
        // $category = Sub_category::orderBy('created_at', 'ASC')->skip(1)->first();
        return view('welcome',compact('reviews','copyRight','media','contact','category_three','category_one','category_two','sub_one','sub_two','sub_three','sub_four','services','skill_one','skill_two','skill_three','skill_four','cat_first','cat_second','cat_third','cat_four','cat_five','cat_six','cat_seven','posts','tags','education','experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function name($id)
    {
      
       
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryPost($id)
    {
        $logoImg    = Setting::first();
        $top_menu = Category::orderBy('created_at','ASC')->where('location','=', 1)->take(8)->get(); 
        $posts      = Post::all();
        $category = Category::find($id);
        $footer_category = Category::orderBy('created_at','ASC')->where('location','=', 3)->get();

        return view('vendor.category',compact('logoImg','top_menu','posts','footer_category','category'));
    }
    public function tagPost($id)
    {
        $logoImg    = Setting::first();
        $top_menu = Category::orderBy('created_at','ASC')->where('location','=', 1)->take(8)->get(); 
        $posts      = Post::all();
        $tag = Tag::find($id);
        $footer_category = Category::orderBy('created_at','ASC')->where('location','=', 3)->get();

        return view('vendor.tag',compact('logoImg','top_menu','posts','footer_category','tag'));
    }

    public function singlePost($id,$slug){

        $post = Post::find($id);
        $view = $post->view ;
        $post->view = $view +1 ;
        $post->save();
    
        $top_menu = Category::orderBy('created_at','ASC')->where('location','=', 1)->take(8)->get(); 
        $logoImg    = Setting::first();
        $posts      = Post::all();

        $next_id = Post::where('id', '>', $post->id )->min('id');
        $next_post = Post::find($next_id);

        $prev_id = Post::where('id', '<', $post->id )->max('id');
        $prev_post = Post::find($prev_id);
        $footer_category = Category::orderBy('created_at','ASC')->where('location','=', 3)->get();
        $slider = Post::find($id);
      
         return view('vendor.single',compact('slider','logoImg','top_menu','posts','next_id','prev_post','next_post','footer_category'));
  
      }

      public function searchPost(){
        $footer_category = Category::orderBy('created_at','ASC')->where('location','=', 3)->get();

        $search = request('query');
        $logoImg    = Setting::first();
        $posts = Post::where('title','like','%'.$search.'%')->get();

        $top_menu = Category::orderBy('created_at','ASC')->where('location','=', 1)->take(8)->get(); 
        return view('vendor.search',compact('search','logoImg','top_menu','posts','footer_category'));
      }


    
}
