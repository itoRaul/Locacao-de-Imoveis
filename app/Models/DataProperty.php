<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'address',
        'number',
        'neighborhood',
        'complement',
        'data_id',
        'state_id',
        'city_id',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'image_7',
        'image_8',
        'image_9',
        'image_10',
    ];

    public function data()
    {
        return $this->belongsTo(Data::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
