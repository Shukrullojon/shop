<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularies';

    protected $guarded = [];

    public function media(){
        return $this->hasMany(Media::class,'model_id','id')
            ->where('model',Vocabulary::class);
    }

}
