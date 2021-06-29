<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuUserModel extends Model
{
    protected $table = 'menu_user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded=[];
}
