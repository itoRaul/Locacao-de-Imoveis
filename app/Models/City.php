<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'state_id',
    ];

    protected $table = 'cities';

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
