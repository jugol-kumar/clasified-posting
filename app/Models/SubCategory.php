<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static where(string $string, $id)
 */
class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function child_categories()
    {
        return $this->hasMany('App\Models\ChildCategory');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function mocktests()
    {
        return $this->belongsToMany('App\Models\Mocktest')->withPivot('question')->withTimestamps();
    }

    public function jobs(){
        return $this->hasMany(SubCategory::class, 'category_id');
    }

}
