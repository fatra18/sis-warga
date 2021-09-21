<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'id',
        'number_id',
        'name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'village',
        'blood_group',
        'address',
        'rt',
        'rw',
        'religion',
        'marital_status',
        'work',
        'status',
        'education',
        'contact'
    ];

    protected $appends = [
        'age'    
    ];
    
    public function family()
    {
        return $this->hasOne(FamilyCard::class,'residents_id','id');
    }

    public function member()
    {
        return $this->hasMany(Member::class,'family_cards_id','id','name');
    }
    
    public function move()
    {
        return $this->hasOne(Move::class,'residents_id','id');
    }
    public function cormer()
    {
        return $this->hasMany(Cormer::class,'residents_id','id');
    }

    public function death()
    {
        return $this->hasMany(Death::class,'residents_id','id');
    }

    public function getAgeAttribute()
    {
        $birthDate = $this->date_of_birth;

        $currentDate = date("d-m-Y");
        
        $age = date_diff(date_create($birthDate), date_create($currentDate));
        
        return  (int)$age->format("%y");
    }

}
