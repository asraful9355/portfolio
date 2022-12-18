<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['sub_title','title','slug','skill','featured','category_id','cv','btn_title','btn_url'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function tags(){
       return $this->belongsToMany('App\Models\Tag');
    }
    protected $dates = ['deleted_at'];
     
}
