<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;


    protected $table = 'cart';

    protected $fillable = ['watch_id', 'user_id', 'city', 'quantity', 'status'];

    public function watch(){
        return $this->belongsTo(Watch::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
