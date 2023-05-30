<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function time() 
    {
        return $this->belongsTo(Room::class);
    }
}
