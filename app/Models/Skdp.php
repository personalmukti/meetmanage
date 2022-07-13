<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skdp extends Model
{
    use HasFactory;

    public function meets()
    {
        return $this->hasMany(Meet::class);
    }
}
