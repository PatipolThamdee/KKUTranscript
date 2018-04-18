<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class StudentInfoController extends Controller
{
    public function showPage($code){
      $documents = DB::table('document')
                  ->join('student', 'document.STUDENTCODE', '=', 'student.STUDENTCODE')
                  ->where('student.STUDENTCODE', '=', $code)
                  ->get();

      return view('stdManage',['document'=>$documents]);
    }
}
