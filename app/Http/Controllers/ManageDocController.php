<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManageDocController extends Controller
{
    public function index(Request $request){
      return view('manage_doc');
    }
    public function docResults(Request $request){
      $query = $request->input('search');
      $documents = DB::table('document')
                  ->join('student', 'document.STUDENTCODE', '=', 'student.STUDENTCODE')
                  ->where('student.STUDENTCODE', '=', $query)
                  ->orWhere('student.STUDENTNAME', '=', $query)
                  ->orWhere('student.STUDENTNAMEENG', '=', $query)
                  ->get();
      //             dd($documents);
      return response()->json($documents);
    }
    public function rejectDoc($refcode, Request $request){
      DB::table('document')
                ->where('refcode', '=', $refcode)
                ->update(['reject' => 1]);
      return response()->json(['status'=>'success']);
    }
    public function allowDoc($refcode, Request $request){
      DB::table('document')
                ->where('refcode', '=', $refcode)
                ->update(['reject' => 0]);
      return response()->json(['status'=>'success']);
    }
}
