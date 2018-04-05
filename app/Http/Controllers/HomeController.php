<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function index(Request $request){
      $faculty_input = $request->input('faculty');
      if(!isset($faculty_input)){
        $faculty_ope = 'LIKE';
        $faculty = '%';
        $faculty_txt = 'เลือกคณะ';
        $faculty_type = 1;
      }else{
        $faculty_ope = '=';
        $faculty_txt = $faculty_input;
        $faculty_type = 2;
      }
        $data = DB::table('user_information')
                ->join('document', 'document.REFCODE', '=', 'user_information.REFCODE')
                ->join('student', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
                ->where('student.FACULTYNAME', $faculty_ope, $faculty_input)
                ->select('user_information.*')
                ->groupBy('user_information.id')
                ->get();
                // dd($data);
      $faculty_obj = DB::table('faculties')
                    ->get();
      return view('home', ['data' => $data, 'faculty' => $faculty_txt, 'faculty_obj' => $faculty_obj, 'faculty_type' => $faculty_type]);
    }

    public function documentInfo(Request $request){
      $refcode = $request->input('refcode');
      $doc_prop = DB::table('document')
                ->select('DOCUMENTTYPE', 'CERTIFICATE', 'reject')
                ->where('REFCODE', '=', $refcode)
                ->get();
      if(!sizeof($doc_prop)) return response()->json(['status' => 'error', 'message' => 'ไม่ตรงกับเอกสารใดๆ']);
      elseif($doc_prop[0]->reject == 1) return response()->json(['status' => 'error', 'message' => 'ถูกปฏิเสธการเข้าถึง']);

      // if($doc_prop->DOCUMENTTYPE == 'thai'){
        if($doc_prop[0]->DOCUMENTTYPE == 'thai'){
          $student = DB::table('student')
                    ->join('document', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
                    ->select('student.STUDENTCODE as studentcode',
                              'student.NATIONALID as nationalid',
                              'student.PREFIXNAME as prefixname',
                              'student.STUDENTNAME as studentname',
                              'student.FACULTYNAME as faculty',
                              'student.PROGRAMNAME as programname',
                              'student.DEGREE as degree',
                              'student.GPA as gpa',
                              'student.STARTDATE as startdate',
                              'student.DATEOFGRADUATED as dateofgraduated',
                              'student.DATEOFBIRTH as dateofbirth',
                              'document.REFCODE as refcode',
                              'document.DOCUMENTCODE as documentcode',
                              'document.DOCUMENTTYPE as documenttype',
                              'document.CERTIFICATE as certificate',
                              'document.ISSUEDATE as issuedate',
                              'document.SIGNBY as signby'
                              )
                    ->where('document.REFCODE', '=', $refcode)
                    ->get();
        }
        else{
          $student = DB::table('student')
                    ->join('document', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
                    ->select('student.STUDENTCODE as studentcode',
                              'student.NATIONALID as nationalid',
                              'student.PREFIXNAMEENG as prefixname',
                              'student.STUDENTNAMEENG as studentname',
                              'student.FACULTYNAMEENG as faculty',
                              'student.PROGRAMNAMEENG as programname',
                              'student.DEGREEENG as degree',
                              'student.GPA as gpa',
                              'student.STARTDATE as startdate',
                              'student.DATEOFGRADUATED as dateofgraduated',
                              'student.DATEOFBIRTH as dateofbirth',
                              'document.REFCODE as refcode',
                              'document.DOCUMENTCODE as documentcode',
                              'document.DOCUMENTTYPE as documenttype',
                              'document.CERTIFICATE as certificate',
                              'document.ISSUEDATE as issuedate',
                              'document.SIGNBY as signby'
                              )
                    ->where('document.REFCODE', '=', $refcode)
                    ->get();
                }
      // }
      // if()
      $response_data = ['status' => 'success', 'data' => $student[0]];
      return response()->json($response_data);
    }
    public function moreStudentInfo(Request $request){
      $year_term = array();
      $datas = array();
      $refcode = $request->input('refcode');
      $student_grade = DB::table('study_result')
                      ->join('document', 'document.STUDENTCODE', '=', 'study_result.STUDENTCODE')
                      ->where('document.REFCODE', '=', $refcode)
                      ->select('study_result.*')
                      ->orderBy('ACADEMICYEAR', 'ASC')
                      ->orderBy('TERM', 'ASC')
                      ->get();
      foreach($student_grade as $student_grad){
        $arr['year'] = $student_grad->ACADEMICYEAR;
        $arr['term'] = $student_grad->TERM;
        $year_term[] = $arr;
      }
      $year_term = array_unique($year_term, SORT_REGULAR);
      $year_term = array_combine(range(0, count($year_term)-1), array_values($year_term));
      foreach($year_term as $yt){
        // dd($yt);
        $quer  =  DB::table('study_result')
                  ->join('document', 'document.STUDENTCODE', '=', 'study_result.STUDENTCODE')
                  ->where('document.REFCODE', '=', $refcode)
                  ->where('ACADEMICYEAR', '=', $yt['year'])
                  ->where('TERM', '=', $yt['term'])
                  ->select('study_result.*')
                  ->get();
        $data['year'] = $yt['year'];
        $data['term'] = $yt['term'];
        $data['data'] = (object)$quer;
        $datas[] = (object)$data;
      }
      // dd($datas);
      $response_data = ['status' => 'success', 'data' => $datas];
      return response()->json($response_data);
    }

    public function userInfoStore(Request $request){
      date_default_timezone_set('Asia/Bangkok');
      DB::table('user_information')->insert(
    ['firstname' => $request->input('firstname'),
     'lastname' => $request->input('lastname'),
     'phone_no' => $request->input('phone'),
     'email' => $request->input('email'),
     'company_name' => $request->input('company'),
     'motive' => $request->input('motive'),
    'created_at' => date("Y-m-d h:i:s"),
    'REFCODE' => $request->input('refcode'),
  'ip'=>$request->input('ip')]);
      return response()->json(['status'=>'success']);
    }
    public function userInfoStore2(Request $request){
      date_default_timezone_set('Asia/Bangkok');
      $data = $request->input('id');
      $refcode = $request->input('refcode');
      $data_decode = json_decode($data);
      DB::table('user_information')->insert(
        ['REFCODE' => $refcode,
        'created_at' => date("Y-m-d h:i:s"),
        'ip' => $data_decode->query]
      );
      return response()->json(['status' => 'success']);
    }
}
