<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DatePeriod;
use DateInterval;

class UsageChartController extends Controller
{
    public function showPage(Request $request){
      $faculty_input = $request->input('faculty');
      $start_date = $request->input('start');
      $end_date = $request->input('end');
      if(!isset($end_date)){
        $end_date = date('Y-m-d');
        // dd($end_date);
        if(!isset($start_date)){
          $start_date = date('Y-m-d', strtotime('-6 days'));
          // dd($start_date);
        }
      }else{
        if(!isset($start_date)){
          $end_d = strtotime($end_date);

          $start_date = date('Y-m-d', strtotime('-6 days', $end_d));
          // dd($start_date);
        }
      }
      if($start_date > $end_date){
        $start_date = $end_date;
      }
      if(!isset($faculty_input)){
        $faculty_ope = 'LIKE';
        $faculty_input = '%';
        $faculty_txt = 'เลือกคณะ';
        $faculty_type = 1;
      }else{
        $faculty_ope = '=';
        $faculty_txt = $faculty_input;
        $faculty_type = 2;
      }
      $period = new DatePeriod( new DateTime($start_date), new DateInterval('P1D'), new DateTime($end_date));
      $dbData = [];
      // dd($period);
      foreach($period as $date){
        $range[] = (object)['show_date1' => $date->format("Y-m-d"), 'count' => 0];
          // $range[$date->format("Y-m-d")] = 0;
      }
      $range[] = (object) ['show_date1' => $end_date, 'count' => 0];
      // dd($range);
      $result = (object) $range;
      // dd($result);
      // $count_by_week = DB::select('select date(created_at) as show_date1, COUNT(*) as count FROM user_information WHERE created_at >= DATE_ADD(CURDATE(),INTERVAL -7 DAY) GROUP BY DAY(created_at) order by id');
      $count_by_year = DB::select('select year(created_at) as show_date1, COUNT(*) as count FROM user_information GROUP BY YEAR(created_at) order by id');
      $count_by_month = DB::select('select extract(month from created_at) as show_month, extract(year from created_at) as show_year, COUNT(*) as count FROM user_information GROUP BY month(created_at) order by id');
      $count_by_day = DB::select('select DATE(created_at) as show_date1, COUNT(*) as count FROM user_information GROUP BY DAY(created_at) order by id');
      $count_by_week = DB::table('user_information')
                      ->select(DB::raw('DATE(created_at) AS show_date1'), DB::raw('count(DISTINCT user_information.id) as count'))
                      ->join('document', 'document.REFCODE', '=', 'user_information.REFCODE')
                      ->join('student', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
                      ->where('student.FACULTYNAME', $faculty_ope, $faculty_input)
                      ->whereDate('user_information.created_at', '>=', date($start_date).' 00:00:00')
                      ->whereDate('user_information.created_at', '<=', date($end_date).' 00:00:00')
                      ->groupBy('show_date1')
                      // ->orderBy('id')
                      ->get();
                      // dd($count_by_week);
                      foreach($count_by_week as $val){
                        // dd($val);
                        foreach($result as $ran){
                          // $ran->count = 5;
                          // dd($ran);
                          if($val->show_date1 == $ran->show_date1){
                            $ran->count = $val->count;
                            // dd($range);
                            // break;
                          }
                        }

                          // $dbData[$val->show_date1] = $val->count;
                        }
                        // dd($result);
                        // dd($dbData);
                        $count_by_week = $result;
                      // dd($count_by_week);
      $faculty_obj = DB::table('faculties')
                    ->get();
      if($faculty_input == '%'){
        $faculty_input = null;
      }
      return view('chartUsage',['count_by_month'=> $count_by_month,
                                'count_by_day'=>$count_by_day,
                                'count_by_year'=>$count_by_year,
                                'count_by_week'=>$count_by_week,
                                'faculty_txt' => $faculty_txt,
                                'faculty' => $faculty_input,
                                'faculty_obj' => $faculty_obj,
                                'faculty_type' => $faculty_type,
                                'start_date' => $start_date,
                                'end_date' => $end_date]);
    }
}
