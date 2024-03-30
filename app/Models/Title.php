<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';  // กำหนดตารางเป็น users
    protected $primaryKey = 'id'; // กำหนด id เป็น primaryKey


    protected $fillable = [ // กำหนดให้ Laravel รู้ว่าอะไรบ้างสามารถแก้ไขได้
        'name',
        'email',
        'avatar',
        'title',
    ];
}
