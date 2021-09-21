<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Born extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'family_cards_id',
    ];
    public function family()
    {
        return $this->belongsTo(FamilyCard::class,'family_cards_id' ,'id');

}
}
