<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//sss
class M_users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'u_id';
    public $incrementing = true;
    public $timestamps = false;
}
