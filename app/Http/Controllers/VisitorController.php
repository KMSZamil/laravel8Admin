<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;

class VisitorController extends Controller
{
    function index(){
        $VisitorsData = json_decode(VisitorsModel::all());
        return view('visitor',['VisitorsData'=>$VisitorsData]);
    }
}
