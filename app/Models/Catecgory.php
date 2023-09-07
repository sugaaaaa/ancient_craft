<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catecgory extends Model
{
    protected $table='catecgories';
    protected $fillable = ['name'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    use HasFactory;
}
