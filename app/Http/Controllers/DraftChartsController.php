<?php

namespace App\Http\Controllers;

use App\Models\DraftChartsModel;
use Illuminate\Http\Request;

class DraftChartsController extends Controller
{

    public function index()
    {
        $url = "http://116.68.205.77/rnd/iot_test/main/getData";
        $json = json_decode(file_get_contents($url), true);
        return view('draftcharts.view',['json_data'=>$json]);
    }

}
