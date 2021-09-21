<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'residents_id',
        'date_move',
        'reason',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class,'residents_id' ,'id');

    }
}
