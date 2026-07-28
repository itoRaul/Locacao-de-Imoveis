<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'socialname',
        'cpf',
        'rg',
        'email',
        'phone',
        'cep',
        'address',
        'number',
        'neighborhood',
        'complement',
        'marital_status_id',
        'education_level_id',
        'gender_id',
        'nationality',
        'state_id',
        'city_id',
    ];

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function dataProperties()
    {
        return $this->hasMany(DataProperty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
