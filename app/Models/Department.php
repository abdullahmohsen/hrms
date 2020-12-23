<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['title'];

    public function positions()
    {
        return $this->hasMany(Position::class);

    }//end of positions

    public function getTitleAttribute($value)
    {
        return ucfirst($value);

    }//end of get title
}
