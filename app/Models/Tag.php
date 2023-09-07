<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;

    protected $primarykey ='id';
    protected $fillable = ['name'];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

}
