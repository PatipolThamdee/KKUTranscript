<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class HomeController extends Controller
{
  //
  public function index(Request $request){
    $faculty_input = $request->input('faculty');
    // dd($faculty_input);
    $start_date = $request->input('start');
    $end_date = $request->input('end');
    $page = $request->input('page');
    $sort_by = $request->input('sort_by');
    $sorting = $request->input('sorting');
    if(!isset($sort_by)){
      $sort_by = 'user_information.created_at';
      $sorting  = 'desc';
    }else{
      if(!isset($sorting)){
        $sorting = 'desc';
      }
    }
    if(!isset($page) || !is_numeric($page)){
      $page = 1;
    }
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
    $data = DB::table('user_information')
    ->join('document', 'document.REFCODE', '=', 'user_information.REFCODE')
    ->join('student', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
    ->where('student.FACULTYNAME', $faculty_ope, $faculty_input)
    ->whereDate('created_at', '>=', date($start_date).' 00:00:00')
    ->whereDate('created_at', '<=', date($end_date).' 00:00:00')
    ->select('user_information.*')
    ->limit(10)
    ->offset(($page-1)*10)
    ->orderBy($sort_by, $sorting)
    ->groupBy('user_information.id')
    ->get();
    // dd($data);
    $allPage = DB::table('user_information')
    ->join('document', 'document.REFCODE', '=', 'user_information.REFCODE')
    ->join('student', 'student.STUDENTCODE', '=', 'document.STUDENTCODE')
    ->where('student.FACULTYNAME', $faculty_ope, $faculty_input)
    ->whereDate('created_at', '>=', date($start_date).' 00:00:00')
    ->whereDate('created_at', '<=', date($end_date).' 00:00:00')
    ->select(DB::raw('count(DISTINCT user_information.id) as count'))
    ->get();
    $max_page = floor($allPage[0]->count/10.0)+1;
    $current_sorting = $sorting;
    if($sorting == 'desc'){
      $sorting = 'asc';
    }else{
      $sorting = 'desc';
    }
    $faculty_obj = DB::table('faculties')
    ->get();
    if($faculty_input == '%'){
      $faculty_input = null;
    }
    return view('home', ['data' => $data,
    'faculty_txt' => $faculty_txt,
    'faculty' => $faculty_input,
    'faculty_obj' => $faculty_obj,
    'faculty_type' => $faculty_type,
    'start_date' => $start_date,
    'end_date' => $end_date,
    'page'=> $page,
    'maxpage'=>$max_page,
    'default_sort' => $sort_by,
    'sorting' => $sorting,
    'current_sorting' => $current_sorting]);
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
    $messages = [
      'required' => 'กรุณากรอก:attribute',
      'email' => 'กรุณากรอก:attributeที่ถูกต้อง',
    ];

    $validator = Validator::make($request->all(), [
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'company' => 'required|string|max:255',
      'motive' => 'required|string|max:255',
      'phone' => 'required|string|max:255',
      'email' => 'required|string|email|max:255',
    ], $messages);
    if ($validator->fails())
    {
      foreach ($validator->messages()->getMessages() as $field_name => $message)
      {
        return response()->json(['status' => 'error', 'message' => $message[0]]); // messages are retrieved (publicly)

      }
      // dd($sds);

    }
    date_default_timezone_set('Asia/Bangkok');
    $ip_obj = $request->input('ip');
    $ip_obj_decode = json_decode($ip_obj);
    if($request->input('id') > 0 && is_numeric($request->input('id'))){
      DB::table('user_information')
      ->where('id', $request->input('id'))
      ->update(['firstname' => $request->input('firstname'),
      'lastname' => $request->input('lastname'),
      'phone_no' => $request->input('phone'),
      'email' => $request->input('email'),
      'company_name' => $request->input('company'),
      'motive' => $request->input('motive'),
      'REFCODE' => $request->input('refcode'),
      'ip' => $ip_obj_decode->query,
      'ISP' => $ip_obj_decode->isp,
      'region_name' => $ip_obj_decode->regionName,
      'country' => $ip_obj_decode->country
    ]);
    }else{
      DB::table('user_information')->insert(
        ['firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'phone_no' => $request->input('phone'),
        'email' => $request->input('email'),
        'company_name' => $request->input('company'),
        'motive' => $request->input('motive'),
        'created_at' => date("Y-m-d H:i:s"),
        'REFCODE' => $request->input('refcode'),
        'ip' => $ip_obj_decode->query,
        'ISP' => $ip_obj_decode->isp,
        'region_name' => $ip_obj_decode->regionName,
        'country' => $ip_obj_decode->country]);
      }


      return response()->json(['status'=>'success']);
    }
    public function userInfoStore2(Request $request){
      date_default_timezone_set('Asia/Bangkok');
      $ip_obj = $request->input('ip');
      $refcode = $request->input('refcode');
      $ip_obj_decode = json_decode($ip_obj);
      $id = DB::table('user_information')->insertGetId(
        ['REFCODE' => $refcode,
        'created_at' => date("Y-m-d H:i:s"),
        'ip' => $ip_obj_decode->query,
        'ISP' => $ip_obj_decode->isp,
        'region_name' => $ip_obj_decode->regionName,
        'country' => $ip_obj_decode->country]
      );
      return response()->json(['status' => 'success', 'id' => $id]);
    }
  }
