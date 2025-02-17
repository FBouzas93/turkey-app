<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Turkey extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'status',
        'weight',
        'birthdate',
        'ability_id'
    ];

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }
}
