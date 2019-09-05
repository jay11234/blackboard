<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['name','description'];
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
