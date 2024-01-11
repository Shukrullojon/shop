<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammer extends Model
{
    use HasFactory;

    protected $table = 'grammers';

    protected $guarded = [];

    public function media(){
        return $this->hasMany(Media::class,'model_id','id')
            ->where('model',Grammer::class);
    }
}
