<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorRemote extends Model
{
    use HasFactory;

    public function remote()
    {
        return $this->belongsTo(Remote::class);
    }
}
