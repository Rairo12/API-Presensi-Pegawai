<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiModel extends Model
{
    protected $table = 'cuti';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    
    use HasFactory;
}