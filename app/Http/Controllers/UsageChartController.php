<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsageChartController extends Controller
{
    public function showPage(){

      $count_by_week = DB::select('select date(created_at) as show_date1, COUNT(*) as count FROM user_information WHERE created_at >= DATE_ADD(CURDATE(),INTERVAL -7 DAY) GROUP BY DAY(created_at) order by id');
      $count_by_year = DB::select('select year(created_at) as show_date1, COUNT(*) as count FROM user_information GROUP BY YEAR(created_at) order by id');
      $count_by_month = DB::select('select extract(month from created_at) as show_month, extract(year from created_at) as show_year, COUNT(*) as count FROM user_information GROUP BY month(created_at) order by id');
      $count_by_day = DB::select('select DATE(created_at) as show_date1, COUNT(*) as count FROM user_information GROUP BY DAY(created_at) order by id');

      return view('chartUsage',['count_by_month'=> $count_by_month,'count_by_day'=>$count_by_day,'count_by_year'=>$count_by_year,'count_by_week'=>$count_by_week]);
    }
}
