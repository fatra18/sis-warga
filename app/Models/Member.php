<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'family_cards_id',
        'residents_id',
        'connection',
    ];
    public function family()
    {
        return $this->hasMany(FamilyCard::class,'family_cards_id' ,'id');
    }
    public function resident()
    {
        return $this->belongsTo(Resident::class,'residents_id' ,'id');
    }

}
