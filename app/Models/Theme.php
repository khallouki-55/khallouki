<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTheme';
    protected $fillable = [
        'theme'
    ];
    public $timestamps = false;
}
