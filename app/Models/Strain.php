<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
    public function joints()
    {
        return $this->hasMany(Joint::class);
    }
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'naam',
        'merk',
        'soort',
        'thc',
        'cbd',
        'prijs'
    ];
}


