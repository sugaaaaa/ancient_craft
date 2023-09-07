<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
  protected $table='posts'; 
  protected $primarykey ='id';
  protected $fillable = ['title', 'content', 'image' , 'category', 'tag'];
 
  

  public function catecgory()
    {
        return $this->hasMany(Catecgory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

  // use HasFactory;
}





