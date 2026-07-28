<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uf',
    ];

    protected $table = 'states';

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }

    public function data()
    {
        return $this->hasMany(Data::class, 'state_id', 'id');
    }
}