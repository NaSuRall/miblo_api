<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ["user_id", "name"];


    public function roads()
    {
        return $this->hasMany(Road::class);
    }
}
