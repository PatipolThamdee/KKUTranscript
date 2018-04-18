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

      $transcript_state = DB::select('select * from document where CERTIFICATE = "transcript" and STUDENTCODE ='.$code);
      $graduate_state = DB::select('select * from document where CERTIFICATE = "graduation" and STUDENTCODE ='.$code);


      return view('stdManage',['document'=>$documents,'transcript_state'=>$transcript_state,'graduate_state'=>$graduate_state]);
    }


    public function transcriptTG(Request $request){

      // $curr_state = DB::select('select * from document where CERTIFICATE = "transcript" and STUDENTCODE ='.$request->input('code'));
      if($request->input('status') == 'yes'){
        DB::table('document')
            ->where('STUDENTCODE','=',$request->input('code'))
            ->where('CERTIFICATE','=','transcript')
            ->update(['reject' => 0]);
      }
      else{
        DB::table('document')
            ->where('STUDENTCODE','=',$request->input('code'))
            ->where('CERTIFICATE','=','transcript')
            ->update(['reject' => 1]);
      }
    }

    public function graduateTG(Request $request){

      // $curr_state = DB::select('select * from document where CERTIFICATE = "transcript" and STUDENTCODE ='.$request->input('code'));
      if($request->input('status') == 'yes'){
        DB::table('document')
            ->where('STUDENTCODE','=',$request->input('code'))
            ->where('CERTIFICATE','=','graduation')
            ->update(['reject' => 0]);
      }
      else{
        DB::table('document')
            ->where('STUDENTCODE','=',$request->input('code'))
            ->where('CERTIFICATE','=','graduation')
            ->update(['reject' => 1]);
      }
    }
}
