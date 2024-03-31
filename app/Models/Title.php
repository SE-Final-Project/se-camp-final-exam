<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = ['tit_name', 'tit_order'];

    /**
     * Get the users for the title.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
