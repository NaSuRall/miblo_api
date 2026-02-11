<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $fillable = ["service_id", "path", "method", "data"];

    protected $casts = [
        'data' => 'array',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
