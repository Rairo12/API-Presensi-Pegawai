<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    
    use HasFactory;
}
