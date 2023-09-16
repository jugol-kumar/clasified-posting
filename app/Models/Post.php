<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(mixed $input)
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function child_category(){
        return $this->belongsTo(ChildCategory::class, 'child_category_id');
    }

    public function messageDetails(){
        return $this->hasMany(MessageDetail::class, 'post_id');
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function upazila(){
        return $this->belongsTo(Upazila::class);
    }



}
