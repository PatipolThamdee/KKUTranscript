<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetGarageController extends Controller
{
    //
    public function index(){
      $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=%E0%B8%AD%E0%B8%B9%E0%B9%88%20%E0%B8%82%E0%B8%AD%E0%B8%99%E0%B9%81%E0%B8%81%E0%B9%88%E0%B8%99&key=AIzaSyD9dUkVD8q-cE9ojFpDlmbok-9l89mwJZs');
      $obj = json_decode($json);
      dd($obj->results);
      echo $json;
      // echo 'ff';
    }
}
