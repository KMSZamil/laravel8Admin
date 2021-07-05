<?php

namespace Database\Seeders;

use App\Models\UserManagerModel;
use App\Models\MenuModel;
use App\Models\MenuUserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserManagerModel::create([
            'user_id' => '22169',
            'password' => Hash::make('22169'),
            'name' => 'Admin',
            'designation' => 'ITA',
            'email' => 'zamil@aci-bd.com',
            'status' => 'Y'
        ]);


    }
}
