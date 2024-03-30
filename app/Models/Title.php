<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'titles'; // Specify the correct table name

    protected $fillable = ['tit_name', 'tit_order'];
}
