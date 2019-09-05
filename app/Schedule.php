<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = ['paper_id', 'day', 'begin', 'end', 'strength', 'preview'];
    public function Paper()
    {
        return $this->belongsTo(Paper::class);
    }
    protected $casts = [
        'begin' => 'date:hh:mm',
        'end' => 'date:hh:mm'
    ];
  
}
