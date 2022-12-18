<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Sub_categoryController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ByController;
use App\Http\Controllers\ReviewController;

use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!




|
*/

// Route::get('/test',   function(){ 
// 	return App\Models\Post::find(13)->tags;
//  });


Route::get('/', [ FrontEndController::class, 'index']);
Route::get('/post/{id}/{slug}', [FrontEndController::class, 'singlePost'])->name('single.post');
Route::get('/search-post', [FrontEndController::class, 'searchPost'])->name('search.post');
Route::get('/category/post/{id}', [FrontEndController::class, 'categoryPost'])->name('category.single');
Route::get('/tag/post/{id}', [FrontEndController::class, 'tagPost'])->name('tag.single');
Route::get('/post/{id}', [FrontEndController::class, 'name'])->name('category.name');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
       //   ----Dashboard Controler ------
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

     //   ----category route start now------

    Route::get('/create-category', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/store-category', [CategoriesController::class, 'store'])->name('store.category');
    Route::get('/index-category', [CategoriesController::class, 'index'])->name('index.category');
    Route::get('/edit-category/{id}', [CategoriesController::class, 'edit'])->name('edit.category');
    Route::get('/destroy-category/{id}', [CategoriesController::class, 'destroy'])->name('destroy.category');
    Route::post('/update-category/{id}', [CategoriesController::class, 'update'])->name('update.category');
    Route::get('/category/deactive/{id}', [CategoriesController::class, 'deactive'])->name('category.deactive');
    Route::get('/category/active/{id}', [CategoriesController::class, 'active'])->name('category.active');

                                            // ------post start-----
    Route::get('/create-home', [PostsController::class, 'create'])->name('create.post');
    Route::post('/store-home', [PostsController::class, 'store'])->name('store.post');
    Route::get('/index-home', [PostsController::class, 'index'])->name('index.post');
    Route::get('/edit-home/{id}', [PostsController::class, 'edit'])->name('edit.post');
    Route::get('/destroy-home/{id}', [PostsController::class, 'destroy'])->name('destroy.post');
    Route::post('/update-home/{id}', [PostsController::class, 'update'])->name('update.post');
    Route::get('/trash-home', [PostsController::class, 'trash'])->name('trash.post');
    Route::get('/restore-home/{id}', [PostsController::class, 'restore'])->name('restore.post');
    Route::get('/kill-home/{id}', [PostsController::class, 'kill'])->name('kill.post');

                                           //   ---- tag start ------
    Route::get('/create-about-me', [TagsController::class, 'create'])->name('create.tag');
    Route::post('/store-about-me', [TagsController::class, 'store'])->name('store.tag');
    Route::get('/index-about-me', [TagsController::class, 'index'])->name('index.tag');
    Route::get('/edit-about-me/{id}', [TagsController::class, 'edit'])->name('edit.tag');
    Route::post('/update-about-me/{id}', [TagsController::class, 'update'])->name('update.tag');
    Route::get('/destroy-about-me/{id}', [TagsController::class, 'destroy'])->name('destroy.tag');

                                 /*========> User <========  */
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('user.store');
    Route::get('/users/admin/{id}', [UsersController::class, 'admin'])->name('user.admin');
    Route::get('/users/not-admin/{id}', [UsersController::class, 'notAdmin'])->name('user.not.admin');
    Route::get('/my/profile',[UsersController::class,'myProfile'])->name('my.profile');
    Route::get('/card/profile',[UsersController::class,'cardProfile'])->name('card.profile');
    Route::get('/my/change/profile',[UsersController::class,'changeProfile'])->name('change.profile')->middleware('admin');
    Route::post('/my/update/profile/{id}',[UsersController::class,'updateProfile'])->name('update.profile');


       /*========> settings <========  */
    Route::get('/setting/index',[ SettingsController::class,'index'])->name('setting.index');
    Route::get('/setting/edit/{id}',[ SettingsController::class,'edit'])->name('setting.edit');
    Route::post('/setting/update/{id}',[SettingsController::class,'update'])->name('setting.update');
    Route::get('/logo/index',[SettingsController::class,'logoIndex'])->name('logo.index');
    Route::post('/logo/store',[SettingsController::class,'logoStore'])->name('logo.store');

                  //subscribe start 
    Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');

                        //  skill route start now 
    Route::get('/skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('/skill/store', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/skill/index', [SkillController::class, 'index'])->name('skill.index');
    Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::post('/skill/update/{id}', [SkillController::class, 'update'])->name('skill.update');
                          
                        //education route start now
    Route::get('/edu/create',[EducationController::class,'create'])->name('edu.create');
    Route::post('/edu/store',[EducationController::class,'store'])->name('edu.store');
    Route::get('/edu/index',[EducationController::class,'index'])->name('edu.index');
    Route::get('/edu/edit/{id}',[EducationController::class,'edit'])->name('edu.edit');
    Route::post('/edu/update/{id}',[EducationController::class,'update'])->name('edu.update');
    Route::get('/edu/delete/{id}',[EducationController::class,'destroy'])->name('edu.delete');

                        //   experience route start now

    Route::get('/exp/create',[ExperienceController::class,'create'])->name('exp.create');
    Route::post('/exp/store',[ExperienceController::class,'store'])->name('exp.store');
    Route::get('/exp/index',[ExperienceController::class,'index'])->name('exp.index');
    Route::get('/exp/edit/{id}',[ExperienceController::class,'edit'])->name('exp.edit');
    Route::post('/exp/update/{id}',[ExperienceController::class,'update'])->name('exp.update');
    Route::get('/exp/delete/{id}',[ExperienceController::class,'destroy'])->name('exp.delete');

                        //   service route start now

    Route::get('/service/create',[serviceController::class,'create'])->name('service.create');
    Route::post('/service/store',[serviceController::class,'store'])->name('service.store');
    Route::get('/service/index',[serviceController::class,'index'])->name('service.index');
    Route::get('/service/edit/{id}',[serviceController::class,'edit'])->name('service.edit');
    Route::post('/service/update/{id}',[serviceController::class,'update'])->name('service.update');
    Route::get('/service/delete/{id}',[serviceController::class,'destroy'])->name('service.delete');

    
             //   Portfolio route start now

    Route::get('/sub-category/create',[Sub_categoryController::class,'create'])->name('sub_category.create');
    Route::post('/sub-category/create',[Sub_categoryController::class,'store'])->name('sub_category.store');
   
    Route::get('/work/create',[WorksController::class,'create'])->name('work.create');
    Route::post('/work/store',[WorksController::class,'store'])->name('work.store');
    Route::get('/work/index',[WorksController::class,'index'])->name('work.index');
    Route::get('/work/edit/{id}',[WorksController::class,'edit'])->name('work.edit');
    Route::post('/work/update/{id}',[WorksController::class,'update'])->name('work.update');
    Route::get('/work/destroy/{id}',[WorksController::class,'destroy'])->name('work.delete');

    // contact route suru 
    Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
    Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
    Route::get('/contact/index',[ContactController::class,'index'])->name('contact.index');
    Route::get('/contact/edit/{id}',[ContactController::class,'edit'])->name('contact.edit');
    Route::post('/contact/update/{id}',[ContactController::class,'update'])->name('contact.update');
    Route::get('/contact/delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');
    
    // media part 
    Route::get('/media/create',[MediaController::class,'create'])->name('media.create');
    Route::post('/media/store',[MediaController::class,'store'])->name('media.store');
    Route::get('/media/index',[MediaController::class,'index'])->name('media.index');
    Route::get('/media/edit/{id}',[MediaController::class,'edit'])->name('media.edit');
    Route::post('/media/update/{id}',[MediaController::class,'update'])->name('media.update');
    Route::get('/media/delete/{id}',[MediaController::class,'destroy'])->name('media.delete');

    // by route start now 
    Route::get('/copy&right/create',[ByController::class,'create'])->name('copy.create');
    Route::post('/copy&right/store',[ByController::class,'store'])->name('copy.store');
    Route::get('/copy&right/index',[ByController::class,'index'])->name('copy.index');
    Route::get('/copy&right/edit/{id}',[ByController::class,'edit'])->name('copy.edit');
    Route::post('/copy&right/update/{id}',[ByController::class,'update'])->name('copy.update');
    Route::get('/copy&right/delete/{id}',[ByController::class,'destroy'])->name('copy.delete');

    // review route start 
    Route::get('/Client/create',[ReviewController::class,'create'])->name('client.create');
    Route::post('/Client/store',[ReviewController::class,'store'])->name('client.store');
    Route::get('/Client/index',[ReviewController::class,'index'])->name('client.index');
    Route::get('/Client/edit/{id}',[ReviewController::class,'edit'])->name('client.edit');
    Route::post('/Client/update/{id}',[ReviewController::class,'update'])->name('client.update');
    Route::get('/Client/delete/{id}',[ReviewController::class,'destroy'])->name('client.delete');


});
