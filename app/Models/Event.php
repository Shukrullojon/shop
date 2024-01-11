<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $guarded = [];

    public function cnt(){
        return $this->hasOne(EventUser::class,'id','event_id');
    }

    public function media(){
        return $this->hasMany(Media::class,'model_id','id')
            ->where('model',Event::class);
    }
}
