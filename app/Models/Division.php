<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 * @method static withCount(string $string)
 */
class Division extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function districts(){
        return $this->hasMany(District::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class, 'division_id');
    }

}
