<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;

//65160219 นางสาวดวงกมล ลืออริยทรัพย์

class Title extends Model
{
    //protected $fillable = ['tit_name', 'tit_order'];
    use HasFactory;

    protected $table = 'titles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    // function get_all_title(){
    //     return Db::select("SELECT * FROM titles");
    // }
}
