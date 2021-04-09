<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use HasFactory;

    protected $fillable=['user_id','document_id','updated_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function documents()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
}
