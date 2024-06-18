<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'club_id',
        'title',
        'product_title',
        'type',
    ];

    public function clubs(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
    
}
