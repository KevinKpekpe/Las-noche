<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function specificities(){
        return $this->belongsToMany(Specificity::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}