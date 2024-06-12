<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expiditeur extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEx';
    protected $fillable = [
        'typeEX'
    ];
    public $timestamps = false;
}
