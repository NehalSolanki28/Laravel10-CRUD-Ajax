<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'group_id',
        'business_name',
        'club_number',
        'club_name',
        'club_state',
        'club_description',
        'club_slug',
        'website_title',
        'website_link',
        'club_logo',
        'club_banner',
    ];

    public function products(){
        return $this->hasMany(Product::class,'club_id','id');
    }
}
