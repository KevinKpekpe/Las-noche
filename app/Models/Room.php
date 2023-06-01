<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function specificities(){
        return $this->belongsToMany(Specificity::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
