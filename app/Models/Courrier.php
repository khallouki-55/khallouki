<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    protected $primaryKey = 'NDSICG';
    protected $fillable = [
        'NumBO',
        'DateBO',
        'typeExpiditeur',
        'expiditeurAD',
        'expiditeurPER',
        'Annex',
        'objet',
        'theme',
        'type',
        'observation',
        'travailEFF'
    ];
    public $timestamps = false;
}
