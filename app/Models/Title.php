<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $Table = 'titles';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['tit_name', 'tit_order'];
}
