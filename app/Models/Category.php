<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'code', 'name_kz', 'name_ru', 'name_en'
    ];

    //bir categorydin ishinde bar kop posttar
    public function watches(){
        return $this->hasMany(Watch::class);
    }


}
