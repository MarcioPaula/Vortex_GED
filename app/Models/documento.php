<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeDocumento',
        'arquivo',
        'status',
        'token',
        'validade'
    ];
}