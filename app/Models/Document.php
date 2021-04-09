<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['protocol','number','title','date','vol','user_id','acept'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
