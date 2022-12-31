<?php

namespace App\Models;
use App\Mail\poststoredmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $guarded=[];

       public function categories()
    {
       return $this->belongsTo(category::class,'category_id');
    }

    protected static function booted()
    {
        static::created(function ($post) {
          Mail::to('saikhantkyaw1551@gmail.com')->send(new poststoredmail($post));
        });
    }
}

