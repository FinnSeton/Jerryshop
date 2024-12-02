<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joint extends Model
{
    public function strain()
    {
        return $this->belongsTo(Strain::class);
    }
    use HasFactory;

    protected $fillable = [
        'strain_id',
        'gram',
        'prijs'
    ];
}


