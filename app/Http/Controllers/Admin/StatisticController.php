<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function index()
    {
        $yearnow = Carbon::now()->year;
      
        
        $data = [
                   'year'  => $yearnow-6 ,
                   'year1' => $yearnow-5 ,
                   'year2' => $yearnow-4 ,
                   'year3' => $yearnow-3 ,
                   'year4' => $yearnow-2 ,
                   'year5' => $yearnow-1 ,
                   'year6' => $yearnow ,
                ];
                 
        return view('admin.statistics.index' ,compact('data'));
    }

}