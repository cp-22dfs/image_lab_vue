<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalImage extends Model
{
    protected $fillable = ['filename', 'hash'];
}
