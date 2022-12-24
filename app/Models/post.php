<?php

namespace App\Models;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $guarded=[];

       public function categories()
    {
      
         return $this->belongsTo(category::class,'category_id','id');
    }
}

