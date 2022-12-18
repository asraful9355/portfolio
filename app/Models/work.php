<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    protected $guarded =[];


    public function Sub_category()
    {
        return $this->belongsTo('App\Models\Sub_category');
    }

}
