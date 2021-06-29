<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagerModel extends Model
{

    use HasFactory;

    protected $table = 'user_manager';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function menus(){
        return $this->belongsToMany('App\Models\MenuModel','menu_user','user_id','menu_id');
    }
}
