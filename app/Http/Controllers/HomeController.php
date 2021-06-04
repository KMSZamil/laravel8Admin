<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;

class HomeController extends Controller
{
    function dashboard(){

        $UserIp = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $DateTime=date('Y-m-d h:i:sa');
        VisitorsModel::insert(['ip_address'=>$UserIp, 'visit_time'=>$DateTime]);

        return view('dashboard');
    }
}
