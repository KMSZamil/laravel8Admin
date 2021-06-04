<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;

class VisitorController extends Controller
{
    function index(){

        $VisitorsDate = json_decode(VisitorsModel::all());
        return view('visitor',['VisitorsData'=>$VisitorsDate]);
    }
}
