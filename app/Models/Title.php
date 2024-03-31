<?php

/**
* @class-name : Title
* @class-description : model of title
* @author : Thidarat Onsanit 65160337
* @create-date : 2024-03-31
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = ['tit_name', 'tit_order'];
}
