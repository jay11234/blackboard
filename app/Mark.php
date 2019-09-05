<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable=['mark','paper_id','when'];
    public function paper()
    {
        return $this->belongsTo(Paper::class);

    }
}