<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comers extends Model
{
    use HasFactory;
      protected $fillable = [
        'id',
        'id_number',
        'name_comers',
        'gender',
        'arrival_date',
        'residents_id'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class,'residents_id' ,'id');

    }
}
