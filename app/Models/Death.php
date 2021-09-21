<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'residents_id',
        'date_of_death',
        'reason'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class,'residents_id' ,'id');

    }
}
