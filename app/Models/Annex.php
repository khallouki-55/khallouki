<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annex extends Model
{
    use HasFactory;
    protected $primaryKey = 'idannex';
    protected $fillable = [
        'annex'
    ];
    public $timestamps = false;
}
