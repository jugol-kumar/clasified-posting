<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static where(string $string, int $int)
 * @method static create(array $array)
 * @method static withCount(string $string)
 */
class Category extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

//    protected $fillable = [
//        'name',
//        'photo',
//        'slug',
//    ];

    protected $guarded = ['id'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function photos(){
        return $this->morphMany(Gallery::class, 'imageable');
    }


//    public function categories(): HasMany
//    {
//        return $this->hasMany(Category::class, 'parent_id');
//    }
//
//    public function childrenCategories(): HasMany
//    {
//        return $this->hasMany(Category::class, 'parent_id')->with('categories');
//    }
//
//    public function parentCategory(): BelongsTo
//    {
//        return $this->belongsTo(Category::class, 'parent_id');
//    }


    // protected static function boot() {
    //     parent::boot();

    //     static::creating(function ($category) {
    //         if ($category->slug == '') {
    //             $category->slug = preg_replace('/\s+/u', '-', trim($category->name));
    //         }
    //     });
    //     static::updating(function ($category) {
    //         if ($category->slug == '') {
    //             $category->slug = preg_replace('/\s+/u', '-', trim($category->name));
    //         }
    //     });
    // }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
            set: fn ($value) => $value->store('image', 'public'),
        );
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

    public function child_categories()
    {
        return $this->hasMany('App\Models\ChildCategory');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function jobs(){
        return $this->hasMany(Job::class, 'category_id');
    }

}
