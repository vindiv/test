<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];


    //questo metodo è quello di default. non c'è bisognod di scriverlo. 
    //serve però se ad esempio invece dell'id voglio usare lo slug come indice
    public function getRouteKeyName()
    {
        return 'id'; 
    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
        $this->belongsTo(Users::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
