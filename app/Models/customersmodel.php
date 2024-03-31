<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customersmodel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'c_id';
    public $incrementing = true;
    public $timestamps = false;
}
