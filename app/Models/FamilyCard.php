<?php

namespace App\Models;

use App\Http\Controllers\BornController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'family_card_number',
        'residents_id',
        'village',
        'rt',
        'rw',
        'address',
        'regencies_id',
        'districts_id',
        'provinces_id',
        'religion',
        'marital_status',
        'work',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class,'provinces_id' ,'id');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class,'regencies_id' ,'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'districts_id' ,'id');
    }
    
    public function resident()
    {
        return $this->belongsTo(Resident::class,'residents_id' ,'id','name', 'residents_id');
    }

    public function member()
    {
        return $this->hasMany(Member::class,'family_cards_id','id');
    }
    
    public function born()
    {
        return $this->hasMany(Born::class,'family_cards_id','id');
    }
}
